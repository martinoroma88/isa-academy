<?php
/**
 * 	Template Name: Template-Progetti
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


	<div id="pro" class="container">

		<div class="row">
			<!-- BODY -->
			<div class="col-md-7 col-sm-12">
				
				<!-- pro title -->
				<h1 id="pro-title" class="red deco"><?php the_title(); ?></h1>
				<p class="lead"><?php the_field('descrizione'); ?></p>

				<!-- pro image -->
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<div id="pro-image" style="background-image: url('<?php echo $image[0]; ?>');"></div>
				<?php endif; ?>

				<!-- pro content -->
				<div id="pro-content">
					<?php the_content(); ?>
				</div>


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

			
			<!-- pdf -->
			<!-- pdf download -->
				<?php

					// check if the repeater field has rows of data
					if( have_rows('pdf_gallery') ):
						?>
						<h2 class="red deco">DOCUMENTI</h2>
					<?php
					 	// loop through the rows of data
					    while ( have_rows('pdf_gallery') ) : the_row();

					        // display a sub field value
					    ?>
					    <a href="<?php  the_sub_field('file_pdf');?>" target="_blank">
						<div class="col-md-4 col-sm-4 copertinapdf">
						<img src="<?php  the_sub_field('copertina_pdf');?>" height="300px">
						<br>
						<?php the_sub_field('titolo_pdf'); ?></a>
						</div>
					
							
					    <?php
			

					    endwhile;

					else :

					    // no rows found

					endif;

					?>
				</div>
			<!-- ASIDE -->
			<aside class="col-md-4 col-md-push-1 col-sm-12">
				
			<!-- BACK -->
			<?php $permalink = get_permalink($post->post_parent); ?>
			<ol class="breadcrumb">
			  <li><a href="<?php echo $permalink; ?>"><i class="glyphicon glyphicon-menu-left"></i> <?php echo get_the_title($post->post_parent);?></a></li>
			</ol>

			<!-- MATERIALI -->
			<!-- pro download -->
				<?php
				// check if the flexible content field has rows of data
				if( have_rows('download_allegati') ): ?>
				<h3 class="red deco">MATERIALI</h3>

				 <?php  // loop through the rows of data
				    while ( have_rows('download_allegati') ) : the_row();

				        get_row_layout('allegato'); ?>
						<a style="display: block;" target="_blank" href="<?php the_sub_field('file'); ?>">
							<i class="glyphicon glyphicon-download"> </i> <?php the_sub_field('nome_allegato'); ?>
						</a>
				<?php
				    endwhile;
				    ?>
				<?php
				else :
				    // no layouts found
				 endif;
				?>

			<!-- PARTNER -->
			<?php
			// check if the flexible content field has rows of data
			if( have_rows('partners') ): ?>

				<h3 class="red deco">PARTNER</h3>

			 <?php  // loop through the rows of data
			    while ( have_rows('partners') ) : the_row();

			        get_row_layout('partner'); ?>

					<a class="partner-card row" style="display:block;" target="_blank" href="<?php the_sub_field('sito_partner'); ?>">
						<div class="col-xs-5">
							<img src="<?php the_sub_field('logo_partner'); ?>"></img>
						</div>
						<div class="col-xs-7">
							<p><?php the_sub_field('nome_partner'); ?></p>
						</div>
					</a>

			<?php
			    endwhile;

			else :

			    // no layouts found

			endif;
			?>
				<!-- PROMOTORI -->
			<?php
			// check if the flexible content field has rows of data
			if( have_rows('promotore') ): ?>

				<h3 class="red deco">PROMOTORE</h3>

			 <?php  // loop through the rows of data
			    while ( have_rows('promotore') ) : the_row();

			        get_row_layout('promotore'); ?>

					<a class="partner-card row" style="display:block;" target="_blank" href="<?php the_sub_field('sito_promotore'); ?>">
						<div class="col-xs-5">
							<img src="<?php the_sub_field('logo_promotore'); ?>"></img>
						</div>
						<div class="col-xs-7">
							<p><?php the_sub_field('nome_promotore'); ?></p>
						</div>
					</a>

			<?php
			    endwhile;

			else :

			    // no layouts found

			endif;
			?>

			<!-- LINK -->
			<?php
			// check if the flexible content field has rows of data
			if( have_rows('link') ): ?>

				<h3 class="red deco">LINK</h3>

			 <?php  // loop through the rows of data
			    while ( have_rows('link') ) : the_row(); ?>

					<a class="partner-card row" style="display:block;" target="_blank" href="<?php the_sub_field('collegamento'); ?>">
						<div class="col-xs-5">
							<img src="<?php the_sub_field('immagine'); ?>"></img>
						</div>
						<div class="col-xs-7">
							<p><?php the_sub_field('nome_link'); ?></p>
						</div>
					</a>

			<?php
			    endwhile;

			else :

			    // no layouts found

			endif;
			?>

			<!-- EVENTI CORRELATI -->
			<?php

			$posts = get_field('eventi_correlati');

			if( $posts ): ?>

				<h3 class="red deco">EVENTI</h3>
			    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

			        <?php setup_postdata($posts); ?>


			        <a class="ev-rel-card wave" href="<?php the_permalink(); ?>">
				        <!-- ev rel image -->
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<div class="ev-rel-image cover" style="background-image: url('<?php echo $image[0]; ?>')"></div>
						<?php endif; ?>
						<div class="ev-rel-body">
							<div>
								<p class="ev-rel-data gray"><?php the_field('data'); ?></p>
								<p class="ev-rel-title"><b><?php the_title(); ?></b></p>
							</div>
						</div>
			        </a>


			    <?php endforeach; ?>
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>

			<!-- PROGETTI CORRELATI -->
			<?php

			$posts = get_field('progetti_correlati');

			if( $posts ): ?>

				<h3 class="red deco">PROGETTI CORRELATI</h3>
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
								<p class="ev-rel-data gray"><?php echo get_the_title($post->post_parent);?></p>
								<p class="ev-rel-title"><b><?php the_title(); ?></b></p>
							</div>
						</div>
			        </a>


			    <?php endforeach; ?>
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>

			</aside>
		</div>
	</div>


	<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

	<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

			<article class="post error">
				<h1 class="404">Nothing has been posted like that yet</h1>
			</article>

	<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>



<?php get_footer(); // This fxn gets the footer.php file and renders it ?>