<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine 
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>

	<div class="container">
		
		<div class="row">
			<div class="col-xs-12">
				<h1 id="blog-title" class="deco">EVENTI</h1>
			</div>
		</div>
		
		<div id="events" class="row">

			<?php if ( have_posts() ) : 
			// Do we have any posts in the databse that match our query?
			// In the case of the home page, this will call for the most recent posts 
			?>

				<?php while ( have_posts() ) : the_post(); 
				// If we have some posts to show, start a loop that will display each one the same way
				?>
					
					<div class="col-md-4 col-sm-6 col-xs-12">
						
						
						<!-- CARD -->
						<a class="card" href="<?php the_permalink(); ?>">
							
							<!-- card image -->
							<?php if (has_post_thumbnail( $post->ID ) ) { ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
								<div class="card-image lwave" style="background-image: url('<?php echo $image[0]; ?>')">
									<div class="layer"></div>
									<p class="white text-right"><b><?php the_field('data'); ?> <i class="glyphicon glyphicon-calendar"></i><br>
									<?php the_field('luogo'); ?> <i class="glyphicon glyphicon-map-marker"></i>
									</b></p>
								</div>
							<?php } else { ?>
								<div class="card-image lwave" style="background-image: url('http://www.accademiaisa.it/wp-content/uploads/2017/02/placeholder3.png')">
									<div class="layer"></div>
									<p class="white text-right"><b><?php the_field('data'); ?> <i class="glyphicon glyphicon-calendar"></i><br>
									<?php the_field('luogo'); ?> <i class="glyphicon glyphicon-map-marker"></i>
									</b></p>
								</div>
							<?php }  ?>
							
							<!-- card body -->
							<div class="card-body shadow">
								<div class="wave">
								
									<!-- card header -->
									<div class="card-header">
										<h3 class="red">
											<?php echo wp_trim_words( get_the_title(), 6, '...' ); ?>
										</h3>
									</div>
									
									<!-- PROGETTO DI RIFERIMENTO -->
									<?php
									$postss = get_field('progetto_di_riferimento');
									if( $postss ): ?>
											
									    <?php foreach( $postss as $post): // variable must be called $post (IMPORTANT) ?>
						
									        <?php setup_postdata($post); ?>
	
											<p class="gray"><?php the_title(); ?></p>
					
									    <?php endforeach; ?>
									    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>
									
									<!-- card content -->
									<div class="card-content">
										<?php echo wp_trim_words( get_field('descrizione'), 10, '...' ); ?>
									</div>
									
									<!-- fake btn -->
									<div class="card-footer">
										<p class="red"><b>LEGGI</b></p>
									</div>
								</div>
							</div>
						</a>
					</div>
					
				<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
				
				<!-- pagintation -->
				<div id="pagination" class="clearfix">
					<div class="past-page"><?php previous_posts_link( 'newer' ); // Display a link to  newer posts, if there are any, with the text 'newer' ?></div>
					<div class="next-page"><?php next_posts_link( 'older' ); // Display a link to  older posts, if there are any, with the text 'older' ?></div>
				</div><!-- pagination -->


			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error container">
					<div class="row">
						<div class="col-xs-12">
							<h2>Nessun risultato.</h2>
						</div>
					</div>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
	
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>