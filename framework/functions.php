<?php

if ( ! function_exists( 'psybase_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function psybase_setup() {
	    /**
	     * Load up our required theme files and widgets.
	     *
	     */
	    require( get_template_directory() . "/framework/options/widget_options.php" );
	    require( get_template_directory() . "/framework/options/option_functions.php" );

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on psybase, use a find and replace
		 * to change 'psybase' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'psybase', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'psybase' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'psybase_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'psybase_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function psybase_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'psybase_content_width', 640 );
}
add_action( 'after_setup_theme', 'psybase_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function psybase_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'psybase' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'psybase' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'psybase_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function psybase_scripts() {
	wp_enqueue_style( 'psybase-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css' );

	wp_enqueue_style( 'psybase-superfishcss', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css' );

	wp_enqueue_style( 'psybase-superfishcss', 'https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.9/css/superfish.min.css' );

	wp_enqueue_style( 'psybase-mmenucss', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/7.0.3/jquery.mmenu.all.css' );

	wp_enqueue_style( 'psybase-owlcss', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.3/assets/owl.carousel.min.css' );

	wp_enqueue_style( 'psybase-animatecss', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css' );

	wp_enqueue_style( 'psybase-fontawesomecss', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'psybase-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '20151215', true );

	wp_enqueue_script( 'psybase-semanticjs', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js', array(), '20151215', true );

	wp_enqueue_script( 'psybase-superfishjs', 'https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.9/js/superfish.min.js', array(), '20151215', true );

	wp_enqueue_script( 'psybase-mmenujs', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/7.0.3/jquery.mmenu.all.js', array(), '20151215', true );

	wp_enqueue_script( 'psybase-owljs', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.3/owl.carousel.min.js', array(), '20151215', true );

	wp_enqueue_script( 'psybase-wowjs', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), '20151215', true );

	wp_enqueue_script( 'psybase-customjs', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'psybase_scripts' );

/**
 * Pagination for archive, taxonomy, category, tag and search results pages
 *
 * @global $wp_query http://codex.wordpress.org/Class_Reference/WP_Query
 * @return Prints the HTML for the pagination if a template is $paged
 */
if ( ! function_exists( 'wt_pagination' ) ) :
	function mcw_pagination() {
		global $wp_query;

		$big = 999999999; // This needs to be an unlikely integer

		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5
		) );

		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo '<div class="pagination">';
			echo $paginate_links;
			echo '</div><!--// end .pagination -->';
		}
	}
endif; // ends check for wt_pagination()

/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own psybase_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
if( !function_exists( 'psybase_comment' ) ) :
	function psybase_comment( $comment, $args, $depth ) {


		$GLOBALS['comment'] = $comment;
		global $post;

		switch( $comment->comment_type ) :
			case '' :
				if( $comment->user_id == $post->post_author ){
					$author_text = '<div class="comment_author">Psybasy</div>';
				} else {
					$author_text = '';
				}
				?>
				<li class="b_comments clearfix" id="li-comment-<?php comment_ID(); ?>">
					<article id="comment-<?php comment_ID(); ?>">
						<div class="comRight clearfix">
							<div class="comLeft clearfix">
								<a href="<?php comment_author_url()?>"><?php echo get_avatar( $comment, 80 ); ?></a>
							</div>
							<?php echo $author_text; ?>
							<span class="comment-time">
                                <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                <?php
                                /* translators: 1: date, 2: time */
                                printf( __( '%1$s at %2$s', 'psybase' ), get_comment_date(),  get_comment_time() ); ?></a>
                            </span>
							<div class="comment-text ">
								<?php comment_text(); ?>
							</div>
							<p class="m_button"><a href="#"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'psybase' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?> </a></p>
						</div>
					</article>
				</li>
				<?php
				break;
			case 'pingback'  :
			case 'trackback' :
				?>
				<li class="post pingback">
					<p><?php _e( 'Pingback:', 'psybase' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '[ Edit ]', 'psybase' ), '<span class="edit-link">', '</span>' ); ?></p>
				</li>
				<?php
				break;
		endswitch;
	}
endif;//ends check for psybase_comment().
/**
 * Google fonts
 * https://fonts.google.com
 */
function psybase_google_fonts() {
	wp_enqueue_style( 'psybase-googleFontsHeader', 'https://fonts.googleapis.com/css?family=Oswald:400,700&amp;subset=cyrillic', false );
	wp_enqueue_style( 'psybase-googleMainFonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=cyrillic', false );
}
add_action( 'wp_enqueue_scripts', 'psybase_google_fonts' );
/**
 * Custom breadcrumbs.
 *
 *
 */
function breadcrumbs( $separator = ' &raquo; ', $home = ' Головна ' ) {
	$path = array_filter( explode( '/', parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) ) );
	$base_url = ( $_SERVER['HTTPS'] ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . '/';
	$breadcrumbs = array( "<a href=\"$base_url\"> $home </a> " );

	$last = end( array_keys( $path ) );

	foreach( $path as $x => $crumb ) {
		$title = ucwords( str_replace( array( '.php', '_' ), Array( '', ' ' ), $crumb ) );
		if( $x != $last ) {
			$breadcrumbs[] = '<a href="'.$base_url.$crumb.'">'. $title .'</a>' ;
		} else {
			$breadcrumbs[] = $title;
		}
	}

	return implode( $separator, $breadcrumbs );
}

/**
 * Facebook and Open Graph nameservers
 */

function doctype_opengraph( $output ) {
	return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');
