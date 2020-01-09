<?php
/**
 * Template Name: Blog
 * Description: The template for displaying content in the archive and search results template.
 *
 * @package  Psybase
 * @file     content-excerpt.php
 * @author   [makecodework@gmail.com]
 * @link 	 https://makecodework.com
 */

get_header();
?>

<article class="clearfix" <?php post_class()?> data-animation="fadeInLeft">
	<?php if ( has_post_thumbnail() ) {	?>
		<div class="thumb excerpt-thumb overlay">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
		</div>
	<?php } ?>
	<div class="excerpt-wrap">
		<div class="entry-meta">
			<span class="author">
				<?php _e( 'Created', 'psybase' );?>
				<?php psybase_posted_by();  ?>
			</span>
			<span class="sep"> - </span>
			<span class="date">
				<?php echo get_the_date(); ?>,<i class="fa fa-clock-o"></i><?php echo get_the_time(); ?>
			</span>
            <p>
                <?php _e( 'The author have posted ', 'psybase' );?>
                <?php the_author_posts();?>
                <?php _e( 'posts ', 'psybase' );?>
            </p>
		</div>
		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
	</div>
</article><!-- /post-<?php the_ID(); ?> -->
