<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
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
                        <li class="page_item page-item-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>members-online/">Members</a></li>
                        <li class="page_item page-item-200"><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact/Grosset-Wine-Club-Member/">Join / Update</a></li>
                    </ul>
                </div>
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
        <div class="member-login">
            <?php
            if ( is_user_logged_in() ) {
                echo 'Welcome Club Member, you are <strong>signed in</strong>. <a href="https://www.grosset.com.au/members-online/" class="btn btn-default btn-xs" role="button">Online store</a> <a href="https://www.grosset.com.au/my-account/" class="btn btn-default btn-xs" role="button">My account</a> <a href="https://www.grosset.com.au/my-account/customer-logout/" class="btn btn-default btn-xs" role="button">Sign out</a>';
            } else {
                echo 'Grosset Wines Club Members <a href="https://www.grosset.com.au/my-account/" class="btn btn-default btn-xs" role="button">Sign in</a> | <a href="https://www.grosset.com.au/my-account/set-password/">Set password</a> | <a href="https://www.grosset.com.au/club-member/help/">Help</a>';
            }
            ?>
        </div>
