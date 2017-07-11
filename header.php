<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->


    
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
				
        			<div id="navbar" class="navbar navbar-fixed-top">
				
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<button class="menu-toggle"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/Grosset-Logo.png" height="20px">&nbsp;&nbsp;&nbsp;&nbsp;<?php _e( 'Menu', 'twentythirteen' ); ?></button>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>

					<div class="nav-menu">
					<ul>
					<li class="glogo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/Grosset-Logo.png"></a></li>
					<li class="page_item page-item-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>wines/">Wines</a></li>
					<li class="page_item page-item-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>vineyards/">Vineyards</a></li>
					<li class="page_item page-item-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/">About</a></li>
					<li class="page_item page-item-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>news/">News</a></li>
					<li class="page_item page-item-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact/">Contact</a></li>
					<li class="page_item page-item-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>order/">Members</a></li>
					<li class="page_item page-item-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact/become-a-member/">Join</a></li>
					</ul>
					</div>
					<!-- <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?> -->
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->

			<div class="header-img" style="background: url(<?php bloginfo('stylesheet_directory'); ?>/img/bg<?php if ( is_page_template() ) { echo(rand(1,5)); } ?>.jpg) no-repeat center center #eee;background-size: cover;">
			<div class="container">
				<div class="row">
					<div class="col-md-12 glogo-trans">
					
                    			</div>
				</div>
			</div>
			</div>

			<!-- <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</a> -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">