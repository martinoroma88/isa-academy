<?php 
/**
 * 	Template Name: Sidebar/Home Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
 
	<!-- OWL CAROUSEL -->
	
	<div id="owl" class="owl-carousel">
		<div class="item" style='background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/slider/classe.jpg)'>
			<div class="owl_layer"></div>
			<p>Educare e formare<br> verso nuovi orizzonti</p>
		</div>

		<div class="item" style='background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/slider/culto.jpg)'>
			<div class="owl_layer"></div>
			<p>Ebraismo, Cristianesimo, Islam:<br> un valore europeo</p>
		</div>
		
		<div class="item" style='background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/slider/scale.jpg)'>
			<div class="owl_layer"></div>
			<p>Costruiamo un futuro <br> per i giovani</p>
		</div>
		
		<div class="item" style='background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/slider/cupola.jpg)'>
			<div class="owl_layer"></div>
			<p>Culto e cultura <br> contro il radicalismo</p>
		</div>	
		
	</div>

	<div id="splash-text" >

		<div class="container">

			<div class="row">
				
				<div class="col-xs-12">
					
					

				<?php if ( have_posts() ) : 
						// Do we have any posts/pages in the databse that match our query?
						?>

							<?php while ( have_posts() ) : the_post(); 
							// If we have a page to show, start a loop that will display it
							?>

							<?php the_content(); ?>
								
							<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

						<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
								
							<article class="post error">
							</article>

					<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

				</div>

			</div>

		</div>

	</div>

	<div id="in_evidenza" class="container">
		<div class="row">
			
			<div class="col-md-3 col-sm-4 col-xs-12">
		
				<a href="<?php the_field('proposte_formative'); ?>" class="wave padding-10">

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/books.png" alt="">

					<h3 class="red"><?php the_field('title_proposte_formative'); ?> </h3>

					<p>PROPOSTE FORMATIVE</p>
					
				</a>

			</div>

			<div class="col-md-3 col-sm-4 col-xs-12">
		
				<a href="<?php the_field('corsi_annuali'); ?>" class="wave padding-10">

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/blackboard.png" alt="">

					<h3 class="red"><?php the_field('title_corsi_annuali'); ?> </h3>

					<p>CORSI ANNUALI</p>
					
				</a>
				
			</div>

			<div class="col-md-3 col-sm-4 col-xs-12">
		
				<a href="<?php the_field('progetti_speciali'); ?>" class="wave padding-10">

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/target.png" alt="">

					<h3 class="red"><?php the_field('title_progetti_speciali'); ?> </h3>

					<p>PROGETTI SPECIALI</p>
					
				</a>
				
			</div>

			<div class="col-md-3 col-sm-4 col-xs-12">
		
				<a href="<?php the_field('euromed'); ?>" class="wave padding-10">

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sail.png" alt="">

					<h3 class="red"><?php the_field('title_euromed'); ?> </h3>

					<p>EUROMED</p>
					
				</a>
				
			</div>
			
		</div>
	</div>
	
	<div id="eventi-recenti" class="blue-light-bg">
		<div class="container">
			<p id="eventi-label" class="deco">EVENTI RECENTI</p>
			
			<?php 
			
			// query
			$the_query = new WP_Query(array(
				'posts_per_page'	=> 3,
				'meta_key'			=> 'data',
				'orderby'			=> 'meta_value_num',
				'order'				=> 'DESC'
			));
			?>
			<?php while ($the_query -> have_posts()) : $the_query -> the_post(); 
			
		
			?>
				
			<div class="row evento">
				
				<div class="col-md-4 evento-info col-sm-12">
					<p id="evento-data" class="lead white"><?php the_field('data'); ?></p>
					<p id="evento-luogo" class="lead white"><?php the_field('luogo'); ?></p>
				</div>
				
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<div class="evento-image col-md-3 col-sm-12" style="background-image: url('<?php echo $image[0]; ?>'); background-position:center; background-size:cover; background-repeat:no-repeat;">
						
					</div>
				<?php endif; ?>
					
				<div class="col-md-5 evento-body col-sm-12">
					<h2 class="deco"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<?php
						$text = get_field("descrizione_evento");
						$trimmed = wp_trim_words( $text, $num_words = 19, $more = "..." );
					?>
					<p><?php echo $trimmed; ?></p>
					<a href="<?php the_permalink() ?>" class="btn btn-success wave">LEGGI</a>
				</div>
			</div>
			
			<?php 
				endwhile;
				wp_reset_postdata();
			?>
		
		</div>
	</div>			


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>