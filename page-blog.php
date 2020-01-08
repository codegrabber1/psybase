<?php
/**
 * Template Name: Blog
 * Description: A Page Template to display blog archives with the sidebar.
 *
 * @package  Psybase
 * @file     page-blog.php
 * @author   [makecodework@gmail.com]
 * @link     https://makecodework.com
 */

get_header();
?>

<div class="container">
    <div class="row">

		<?php
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		$args = array (
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'paged'               => $paged
		);

		$wp_query = new WP_Query( $args );

		if ( $wp_query -> have_posts() ) : ?>

			<?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
                <div class="col-3 postlist clearfix">
					<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
                </div>
			<?php endwhile; ?>

		<?php endif;
		?>
        <!-- /content -->
        <!--                <div class="col-4">-->
        <!--					--><?php //get_sidebar(); ?>
        <!--                </div>-->

    </div>
</div>

<?php get_footer(); ?>

