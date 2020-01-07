<?php
/**
 * The Theme Options page
 *
 * This page is implemented using the Settings API
 * http://codex.wordpress.org/Settings_API
 *
 * @package  codegrabber
 * @file     widget_options.php
 * @author   codegrabber [Oleg Poruchenko]
 * @link    [makecodework@gmail.com]
 */
/**
 * Properly enqueue styles and scripts for our theme options page.
 *
 * This function is attached to the admin_enqueue_scripts action hook.
 *
 */

add_action( 'admin_init', 'mcw_register_admin_scripts' );

function mcw_register_admin_scripts(){

	wp_enqueue_style( 'mcw_theme_options_css', get_template_directory_uri() . '/framework/options/css/mcw_options.css' );
	wp_enqueue_style('thickbox');
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script('mcw_select_js', get_template_directory_uri() . '/framework/options/js/jquery.customSelect.min.js', array( 'jquery' ));
}

/**
 * Set default options.
 */
function mcw_init_options(){
	$options = get_options( 'mcw_options' );
	if ( false === $options ) {
		$options = mcw_default_options();
	}
	update_option( 'mcw_options', $options );
}
add_action( 'after_setup_theme', 'mcw_init_options', 9 );

/**
 * Register the theme options setting
 */
function mcw_register_settings() {
	register_setting( 'mcw_options', 'mcw_options', 'mcw_validate_options' );
}
add_action( 'admin_init', 'mcw_register_settings' );

/**
 * Register the options page
 */
function mcw_theme_add_page() {
	$mcw_options_page = add_theme_page( __( 'Theme options', 'makecodework' ), __( 'Theme options', 'makecodework' ), 'edit_theme_options', 'mcw_options', 'mcw_theme_options_page' );
	add_action( 'admin_print_styles-' . $mcw_options_page, 'mcw_theme_options_scripts' );
}
add_action( 'admin_menu', 'mcw_theme_add_page' );

/**
 * Include scripts to the options page only
 */
function mcw_theme_options_scripts(){
	if ( ! did_action( 'mcw_enqueue_media' ) ){
		wp_enqueue_media();
	}
	wp_enqueue_script('mcw_upload', get_template_directory_uri() .'/framework/options/js/upload.js', array('jquery'));
}

/**
 * Output the options page
 */
function mcw_theme_options_page() {
?>
	<div id="mcw_admin">
		<header class="header">
			<div class="main">
				<div class="left">
					<h2><?php echo _e('Theme settings', 'makecodework'); ?></h2>
				</div>
				<div class="theme_info">Theme_info</div>
			</div>
		</header> <!-- /header -->
		<div class="options-wrap">
			<div class="tabs">
				<ul>
					<li class="general first"><a href="#general"><i class="icon-cogs"></i><?php echo _e('General', 'codegrabber'); ?></a></li>
					<li class="posts"><a href="#posts"><i class="icon-cogs"></i><?php echo _e('Blog', 'codegrabber'); ?></a></li>
					<li class="booking"><a href="#booking"><i class="icon-cogs"></i><?php echo _e('Booking', 'codegrabber'); ?></a></li>
					<li class="contact"><a href="#contact"><i class="icon-cogs"></i><?php echo _e('Contact', 'codegrabber'); ?></a></li>
					<li class="reset"><a href="#reset"><i class="icon-refresh"></i><?php echo _e( 'Reset', 'codegrabber' );?></a></li>
				</ul>
			</div>
			<div class="options_form">

			</div>
		</div>
	</div>
hello
<?php
}