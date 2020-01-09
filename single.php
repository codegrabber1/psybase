<?php
/**
* The template for displaying all single posts
*
* @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package psybase
*/

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <div class="row">
                <div class="col-12">
		            <?php $cat = get_the_category(); ?>
                    <div class="ui breadcrumb">
                        <a class="section" href="<?php echo home_url();?>"><?php _e('Home', 'psybase')?> </a>
                        <i class="right chevron icon divider"></i>
                        <a class="section" href="<?php echo get_category_link( $cat[0]->cat_ID );?>"><?=$cat[0]->name;?></a>
                        <i class="right arrow icon divider"></i>
                        <div class="active section"><?php echo the_title();?></div>
                    </div>
                </div><!-- /Breadcrumbs -->
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-8">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', get_post_type() );
                        the_post_navigation();
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    endwhile; // End of the loop.
                    ?>
                </div> <!-- #content -->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                    <?php get_sidebar(); ?>
                </div> <!-- #sidebar -->
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>