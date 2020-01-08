<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package psybase
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site clearfix">
    <header id="masthead" class="site-header">
        <nav class="clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-6 order-6 col-sm-6 order-sm-2 col-md-3 order-md-0 py-2">
                        <div id="logo" class="logo_img">
                            <h2><a href=""><?php bloginfo("name")?></a></h2>
                        </div>
                    </div>
                    <div class="col-3 order-3 col-sm-3 order-sm-1 col-md-6 order-md-0 py-3 enter-block">
                        <div class="mobile-mnu d-md-none d-lg-none clearfix">
                            <a class="toggle-mnu d-lg-none" href="#">
                                <span></span>
                            </a>
                        </div>
		                <?php
		                wp_nav_menu( array(
			                'theme_location' => 'menu-1',
			                'menu_id'        => 'primary-menu',
			                'menu_class'     => 'sf-menu',
			                'container'      => 'ul',
			                'fallback_cb'    => '__return_empty_string',
			                'depth'          => 0
		                ) );
		                ?>
                    </div>
                    <div class="col-3 order-6 col-sm-3 order-sm-3 col-md-3 order-md-0 py-3 enter-block">
                        <ul>
                        <li>
                            <a href="#" title=": Sign In :" ><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </li>
                        <li><a href="#" title=": Create your account :"><i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
                        <li class="ui dropdown pointing" id="lang">
                            <div class="default text"><i class="ua flag"></i></div>
                            <ul class="menu drMenu">
                                <li class="item" data-value="ua"><i class="ua flag"></i></li>
                                <li class="item" data-value="uk"><i class="uk flag"></i></li>
                            </ul>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content clearfix">
