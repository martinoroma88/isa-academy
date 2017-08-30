<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

</main><!-- / end page container, begun in the header -->

<footer>
	<div class="container">
	    <div class="row">
	        <div class="col-md-7 col-sm-12">
	            <?php echo do_shortcode( '[mc4wp_form id="159"]' ); ?>
	        </div>
	       
	       <div class="col-md-3 col-md-push-1 col-sm-12">
	           <p><b>ISA Interreligious Studies Academy</b><br>
	           Accademia di Studi Interreligiosi ISA<br>
	           C.F. / P.IVA 05928950962</p>
	       </div>
	       
	    </div>

	</div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->

<?php wp_footer(); 
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>

<script type="text/javascript">
    // This is ok.
    Waves.init();
    Waves.attach('.wave');
    Waves.attach('.lwave', ['waves-light']);
    Waves.attach('.menu-item a');
    Waves.attach('.chocolat-image');
    
    /* CHOCOLAT SLIDER IF EXIST */
    if(jQuery('.chocolat-parent')) {
    	 jQuery('.chocolat-parent').Chocolat()
    	 
    	 jQuery('.chocolat-image').click(function() {
    	 	setTimeout(function() {
    	 		jQuery('.chocolat-right').html('<i class="glyphicon glyphicon-chevron-right"></i>')
    	 		jQuery('.chocolat-left').html('<i class="glyphicon glyphicon-chevron-left"></i>')
    	 		jQuery('.chocolat-close').html('<i class="glyphicon glyphicon-remove></i>')
    	 	}, 2000)
    	 })
    }
    
    if(jQuery('.owl-carousel')) {
    	jQuery('.owl-carousel').owlCarousel({
            loop:true,
            nav:true,
            items: 1,
            navText: ["<i class='glyphicon glyphicon-menu-left'></i>","<i class='glyphicon glyphicon-menu-right'></i>"]
        })
    }
</script>  

</body>
</html>
