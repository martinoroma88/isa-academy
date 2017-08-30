<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>

<style type="text/css">

.acf-map {
	width: 100%;
	height: 400px;
	border: none;
	margin: 50px 0;
}

/* fixes potential theme css conflict */
.acf-map img {
	position: center;
   max-width: inherit !important;
}

</style>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBg7JakMFZ9desjEHnoPJHpm2GEtmYN-E&callback=initMap"></script>



<!-- ev image -->
<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div id="ev-image" class="cover container-fluid" style="background-image: url('<?php echo $image[0]; ?>');"></div>
<?php endif; ?>

<div class="container">
	<div class="row">

	<?php if ( have_posts() ) : 
	// Do we have any posts in the databse that match our query?
	?>

		<?php while ( have_posts() ) : the_post(); 
		// If we have a post to show, start a loop that will display it
		?>
			<!-- BODY -->
			<div id="ev-body" class="col-md-7 col-sm-12">
				
				<!-- PROGETTO DI RIFERIMENTO -->
				<?php
	
				$posts = get_field('progetto_di_riferimento');
	
				if( $posts ): ?>
						
					<ol class="breadcrumb">
				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
	
				        <?php setup_postdata($post); ?>
				        <?php $permalink = get_permalink($post->post_parent); ?>
				        
						<li><a href="<?php echo $permalink; ?>"><?php echo get_the_title($post->post_parent);?></a></li>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<a class="pull-right" href="<?php echo get_bloginfo('url'); ?>/convegni">Eventi <i class="glyphicon glyphicon-th-list"></i></a>

				    <?php endforeach; ?>
				    </ol>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				
				<h1 id="ev-title" class="red"><?php the_title(); // Display the title of the post ?></h1>
				<p class="lead"><?php the_field('descrizione'); ?></p>
				<div>
					<?php the_content(); 
						// This call the main content of the post, the stuff in the main text box while composing.
						// This will wrap everything in p tags
					?>
				</div>
				
				<?php 

				$location = get_field('mappa');
				
				if( !empty($location) ):
				?>
				<div class="acf-map shadow">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
				</div>
				<?php endif; ?>
						<!-- pro gallery -->
				<div id="pro-gallery">
					<?php
					$images = get_field('galleria');

					if( $images ): ?>
					<h2 class="red deco">GALLERY</h2>

					    <div id="pro-images" class="chocolat-parent row" data-chocolat-title="galleria">
					        <?php foreach( $images as $image ): ?>

				                <a class="chocolat-image col-md-3 col-sm-4 col-xs-6" href="<?php echo $image['url']; ?>" title="<?php echo $image['caption']; ?>">
							        <img class="shadow" src="<?php echo $image['sizes']['thumbnail']; ?>" />
							    </a>

					        <?php endforeach; ?>
					    </div>
					<?php endif; ?>
				</div>
					<div id="monarch"> </div>
			</div>

			
			<!-- ASIDE -->
			<aside class="col-md-4 col-md-push-1 col-sm-12">
				
				<!-- INFO -->
				<div id="ev-info" class="deco red">
					<p class="lead blue-light"><?php the_field('data'); ?><br>
					<?php the_field('orario'); ?><br>
					<?php the_field('luogo'); ?></p>
				</div>
				
				
				<!-- ev download -->
				<?php
				// check if the flexible content field has rows of data
				if( have_rows('download_allegati') ): ?>
				<div style="margin-top: 20px; margin-bottom:20px;">

				 <?php  // loop through the rows of data
				    while ( have_rows('download_allegati') ) : the_row();

				        get_row_layout('allegato'); ?>
						<a style="display: block;" target="_blank" href="<?php the_sub_field('file'); ?>">
							<i class="glyphicon glyphicon-download"> </i> <?php the_sub_field('nome_allegato'); ?>
						</a>
				<?php
				    endwhile;
				    ?>
				    </div>
				<?php
				else :
				    // no layouts found
				 endif;
				?>
				
				
				<!-- EVENTI CORRELATI -->
				<?php 
	
				$posts = get_field('eventi_correlati');
				
				if( $posts ): ?>
				
					<h3 class="red deco blue-light">EVENTI CORRELATI</h3>
				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				    
				        <?php setup_postdata($post); ?>
				        
				        
				        <a class="ev-rel-card wave" href="<?php the_permalink(); ?>">
					        <!-- ev rel image -->
							<?php if (has_post_thumbnail( $post->ID ) ): ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<div class="ev-rel-image cover" style="background-image: url('<?php echo $image[0]; ?>')"></div>
							<?php endif; ?>
							<div class="ev-rel-body">
								<div>
									<p class="ev-rel-data gray"><?php echo the_field('data');?></p>
									<p class="ev-rel-title"><b><?php the_title(); ?></b></p>
								</div>
							</div>
				        </a>
				        	
				        
				    <?php endforeach; ?>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				
				
				<?php echo do_shortcode( '[contact-form-7 id="143" title="Info evento"]' ); ?>
				
				<script>
					var contesto = "<?php the_title(); ?>"
					var hiddenForm = document.getElementById('contesto')
					hiddenForm.value = contesto
				</script>
				
			</aside>
			
			
			</article>

		<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
		
		<?php
			// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
			// if ( comments_open() || '0' != get_comments_number() )
			//	comments_template( '', true );
		?>


	<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
		
		<article class="post error">
			<h1 class="404">Nothing has been posted like that yet</h1>
		</article>

	<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>
	</div>
</div>




<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		scrollwheel:  false,
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

//SPOSTAMENTO MONARCH SOTTO GALLERY
if($('.et_social_inline')){
var x = $('.et_social_inline' ).detach();
$('#monarch').prepend(x);
}


})(jQuery);
</script>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
