<?php 
/**
 * 	Template Name: Template-Contatti
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>

<div class="container" id="contact-info">

	<div class="row" >
		<div class="col-md-3 col-md-push-2 col-sm-12">
			<h1 class="deco">Contatti</h1>
			<p>Via Giuseppe Meda, 7<br>
			Milano - 20136<br>
			Italia<br>-<br>
			<strong>T.</strong> 339 7762355<br>
			<strong>E.</strong> info@accademiaisa.it</p>
			
		</div>
		<div class="col-md-5 col-md-push-2 col-sm-12">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2799.187303895277!2d9.177322415556834!3d45.44588157910074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786c409be5b10b9%3A0xd80fbb3e412a945d!2sVia+Giuseppe+Meda%2C+7%2C+20136+Milano!5e0!3m2!1sit!2sit!4v1470579766226" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-push-2 col sm 12">
			<?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-md-push-2 col-sm-12">
			<h3 class="red deco">DONAZIONI</h3>
			<p>Per contribuire all’attività dell’Accademia ISA <br>
				IBAN IT 67 C 01030 01655 000001302017</p>
		</div>
	</div>
	
</div>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>