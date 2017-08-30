<?php 
/**
 * 	Template Name: Template-Aree
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
			
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-md-push-3">
						<div id="image">
							<img width="50" src="<?php the_field('immagine'); ?>" alt="">
						</div>
						<h1 id="area_title" class="deco"><?php the_title(); ?></h1>
						<div id="area_body">
							<?php the_content(); ?>
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

			<!-- LOOP SOTTO-PAGINE (Progetti) -->
			<div id="area_progetti" class="blue-light-bg">
				<div class="container">
					<div class="row">
						<?php $current_page_id = $post->ID;
						
						query_posts(array('showposts' => 15, 'post_parent' => $current_page_id, 'post_type' => 'page')); while (have_posts()) { the_post(); ?>

						<div class="col-md-4 col-sm-6 col-xs-12">
							<!-- CARD -->
							<a class="card" href="<?php the_permalink(); ?>">
								<!-- card image -->
								<?php if (has_post_thumbnail( $post->ID ) ): ?>
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<div class="card-image lwave" style="background-image: url('<?php echo $image[0]; ?>')">
										
									</div>
								<?php endif; ?>
								<!-- card body -->
								<div class="card-body shadow">
									<div class="wave">
									
										<div class="card-header">
											<h3 class="red"><?php echo wp_trim_words( get_the_title(), 5, '...' ); ?></h3>
										</div>
										<div class="card-content">
											<?php echo wp_trim_words( get_field('descrizione'), 7, '...' ); ?>
										</div>
										<div class="card-footer">
											<p class="red"><b>LEGGI</b></p>
										</div>
									</div>
								</div>
							</a>
						</div>

						<?php } ?>
					</div>
				</div>
			</div>
			
			


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>