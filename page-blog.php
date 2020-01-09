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
        <?php
//			$last_post = $wp_query->post_count -1;
			while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
			    if( $wp_query->current_post <= 1  ):
			?>
                <div class="col-6 postlist clearfix">
					<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
                </div>
             <?php else: ?>
                <div class="col-3 postlist clearfix">
                    <?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
                </div>
			<?php endif; endwhile; ?>

		<?php endif;
		?>


    </div>
	<?php mcw_pagination(); ?>
</div>

<?php get_footer(); ?>

