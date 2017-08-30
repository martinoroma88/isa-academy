<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // We are loading our theme directory style.css by queuing scripts in our functions.php file, 
	// so if you want to load other stylesheets,
	// I would load them with an @import call in your style.css
?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>

</head>

<body 
	<?php body_class(); 
	// This will display a class specific to whatever is being loaded by Wordpress
	// i.e. on a home page, it will return [class="home"]
	// on a single post, it will return [class="single postid-{ID}"]
	// and the list goes on. Look it up if you want more.
	?>
>

<header class="border-top-red">
	<!--Logo, barra di ricerca e icona Facebook-->
	<div id="brand" class="navbar navbar-inverse blue-light-bg hidden-xs hidden-sm">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>-->
	      <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
	      	<img id="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png"></img>
	      </a>
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse">
	    
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="https://www.facebook.com/IsaAcademy/"><img width="30" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon.png"></img></a></li>
	        <li><?php get_search_form(); ?></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</div>
	
	<!-- MENU -->
	<nav id="menu" class="navbar navbar-inverse blue-dark-bg" data-spy="affix" data-offset-top="73">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-list" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <img id="mini-logo" class="hidden-md hidden-lg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png"></img>
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="menu-list">
	      <?php
	        wp_nav_menu( array(
	            'theme_location' => 'primary',
	            'depth' => 2,
	            'container' => false,
	            'menu_class' => 'nav navbar-nav',
	            'fallback_cb' => 'wp_page_menu',
	            //Process nav menu using our custom nav walker
	            'walker' => new wp_bootstrap_navwalker())
	        );
	        ?>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</header><!-- #masthead .site-header -->

