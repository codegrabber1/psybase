<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package psybase
 */

?>
    <article class="ui one cards" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blue card">
        <header class="entry-header">

			<?php
                if ( is_singular() ) :
                    the_title( '<h1 class="entry-title ui top attached header">', '</h1>' );
                else :
                    the_title( '<h2 class="entry-title ui top attached header"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;
            ?>
            <?php
			if ( 'post' === get_post_type() ) :
				?>
                <div class="entry-meta ui horizontal list">
                    <div class="item">
                        <img class="ui mini circular image" src="http://lorempixel.com/600/600/cats">
                        <div class="content">
                            <div class="ui sub header"<?php psybase_posted_by();?></div>
	                        <?php psybase_posted_on();?>
                        </div>
                    </div>

                </div><!-- .entry-meta -->
			<?php endif; ?>
        </header><!-- .entry-header -->

		<?php psybase_post_thumbnail(); ?>

        <div class="entry-content ">

			<?php
                the_content( sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'psybase' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'psybase' ),
				'after'  => '</div>',
			) );
			?>

        </div><!-- .entry-content -->

            <footer class="entry-footer ui bottom attached header clearfix">
                <?php psybase_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
