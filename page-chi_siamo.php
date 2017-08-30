<?php 
/**
 * 	Template Name: Template-chi_Siamo
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>

	<?php if ( have_posts() ) : 
		// Do we have any posts/pages in the databse that match our query?
		?>

			<?php while ( have_posts() ) : the_post(); 
			// If we have a page to show, start a loop that will display it
			?>
			
			<div class="container text-justify" id="chi">
				<div class="row">
					<div class="blog-post col-md-6 col-md-push-3 col-sm-8 col-sm-push-2 col-xs-12">
						<h1 class="deco"><?php the_title(); ?></h1>
						
						<?php the_content(); ?>

						<!-- pro gallery -->
						<div id="pro-gallery">
							<?php
							$images = get_field('gallery');
							if( $images ): ?>
							<h2 class="red deco">GALLERY</h2>
							    <div id="pro-images" class="chocolat-parent row" data-chocolat-title="Gallery">
							        <?php foreach( $images as $image ): ?>

						                <a class="chocolat-image col-md-3 col-sm-4 col-xs-6" href="<?php echo $image['url']; ?>" title="<?php echo $image['caption']; ?>">
									        <img class="shadow" src="<?php echo $image['sizes']['thumbnail']; ?>" />
									    </a>
							        <?php endforeach; ?>
							    </div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			
				
				
			<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

		<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
			<article class="post error">
				<h1 class="404">Nothing has been posted like that yet</h1>
			</article>

	<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

	<script>
		var chiCounter = 0;
		jQuery('.blog-post p').each(function(i){          // For each paragraph
		    	if ( (jQuery(this).find('img').length) &&     // If there's an image
		         	(!jQuery.trim(jQuery(this).text()).length))   // and there's no text
		    	{
		    		if (chiCounter%2 == 0) {
		    			jQuery(this).addClass('imgOnlyOne');  
		    		} else {
		        	      jQuery(this).addClass('imgOnlyTwo');
		    		}
		        	chiCounter += 1;
		    	}
		});
	</script>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>