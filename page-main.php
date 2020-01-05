<?php
/**
 * Template Name: Main Page
 * Template post type: post, page.
 * Description: A page Template to display content on the maim page.
 *
 * @package Develop & Design.
 * @file    page-featured.php
 * @author  codegrabber <[makecodework@gmail.com]>
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="main-slider">
            <div class="big-tabs">
                <div class="ui attached tab active" data-tab="first">
                    <div class="tab-item clearfix">
                        <div class="tab-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Psychocenters</h2>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-img">tab-img</div>
                    </div>
                </div>
                <div class="ui attached tab " data-tab="second">
                    <div class="tab-item clearfix">
                        Psychologists
                    </div>
                </div>
                <div class="ui bottom attached tabular menu">
                    <a class="item active" data-tab="first">Психологічні Центри</a>
                    <a class="item" data-tab="second">Психологи</a>
                </div>
            </div>
        </section>
        <section class="main-content">
            <div class="container">
                <div class="row">
                    <div class="ui top attached tabular menu">
                        <div class="item">Tab</div>
                    </div>
                    <div class="ui bottom attached tab segment">
                        <p>www</p>
                        <p>www</p>
                    </div>
                    <div class="col">
                        <?php
                            if ( have_posts() ) :

                                if ( is_home() && ! is_front_page() ) :
                                    ?>
                                    <header>
                                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                    </header>
                                    <?php
                                endif;

                                /* Start the Loop */
                                while ( have_posts() ) :
                                    the_post();

                                    /*
                                        * Include the Post-Type-specific template for the content.
                                        * If you want to override this in a child theme, then include a file
                                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                        */
                                    get_template_part( 'template-parts/content', get_post_type() );
                                endwhile;
                                the_posts_navigation();
                            else :
                                get_template_part( 'template-parts/content', 'none' );
                            endif;
                            ?>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php get_footer(); ?>