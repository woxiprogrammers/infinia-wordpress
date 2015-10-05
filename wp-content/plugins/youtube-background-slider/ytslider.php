<?php
/* 
Plugin Name: YouTube Background Slider
Plugin URI: http://wptreasure.com
Description: Showcase your YouTube videos on site background with a attractive video slider.
Author: wptreasure
Version: 1.0.2
Author URI: http://wptreasure.com
*/
// -----------------------------------------------------------------

// INCLUDE REQUIRED FILES ------------------------------------------
//------------------------------------------------------------------
include_once('yts-settings.php');
include_once('yts-display.php');
//------------------------------------------------------------------

// ADD STYLE AND SCRIPT INSIDE HEAD SECTION
add_action('admin_init', 'yts_backend_scripts');
add_action('wp_enqueue_scripts', 'yts_frontend_scripts');

function yts_backend_scripts() {
	if(is_admin()){
		wp_enqueue_script('jquery');
		wp_enqueue_style('yts_backend_scripts',plugins_url('css/ytslider-admin.css',__FILE__), false, '1.0.0' );
	}
}

function yts_frontend_scripts() {	
	if(!is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('youtube-slider-swf',plugins_url('js/yts-swf.js',__FILE__));
		wp_enqueue_script('youtube-slider-js',plugins_url('js/youtube.background.slider.js',__FILE__));
		wp_enqueue_style('youtube-slider-css',plugins_url('css/youtube-background-slider.css',__FILE__));
	}
}

// 'ADMIN_MENU' FOR ADDING MENU IN ADMIN SECTION ---------
add_action('admin_menu', 'yts_plugin_admin_menu');
function yts_plugin_admin_menu() {
    add_menu_page('YouTube Background Slider Page', 'Youtube BG Slider','administrator', 'ytslider', 'yts_backend_menu',plugins_url('images/youtube.png',__FILE__));
}

// ADD DEFAULT VALUES FOR THE SLIDER -------------------------------
function yts_defaults(){
	    $default = array(
		'show_playlist'=> 1,
		'auto'         => 1,
		'random'       => 1,
		'repeat_playlist' => 1,
		'yts_video1' => 'https://www.youtube.com/watch?v=s2q8nJKa4XA',
		'yts_video2' => 'https://www.youtube.com/watch?v=n4IYbC_nhsc',
		'yts_video3' => 'http://www.youtube.com/watch?v=y0sl4fIxm4E',
		'yts_video4' => 'http://www.youtube.com/watch?v=ldSEbzpq5CI',
		'yts_video5' => 'http://www.youtube.com/watch?v=r6RVibvKRoY',
		'yts_title1' => 'Video 1 Title',
		'yts_title2' => 'Video 2 Title',
		'yts_title3' => 'Video 3 Title',
		'yts_title4' => 'Video 4 Title',
		'yts_title5' => 'Video 5 Title'
    );
	return $default;
}

// RUNS WHEN PLUGIN IS ACTIVATED AND ADD OPTION IN wp_option TABLE -
//------------------------------------------------------------------
register_activation_hook(__FILE__,'yts_plugin_install');
function yts_plugin_install() {
    add_option('yts_options', yts_defaults());
}	

function yts_plugin_version(){
	if (!function_exists( 'get_plugins' ) )
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}

//ADD META BOXES ---------------------------------------------------
//------------------------------------------------------------------
add_action('admin_init','yts_meta_box');
function yts_meta_box(){
	add_meta_box('yts_page', 'YouTube Background Slider', 'yts_status_meta_box', 'page', 'side','high');
}

function yts_status_meta_box($page) {
	$meta_values = get_post_meta( $page->ID, '_yts_status');
	
	if(!empty($meta_values[0]))
	{
		$status = 'selected=selected';
		$status_d = '';
	}
	else
	{
		$status_d = 'selected=selected';
		$status = '';
	}
	
	echo '<select name="_yts_status"><option value="1" '.$status.'>Enable</option><option value="0" '.$status_d.'>Disable</option></select>';
}

// SAVE META BOXES -------------------------------------------------
//------------------------------------------------------------------

add_action( 'save_post', 'yts_status_meta_box_save' );
function yts_status_meta_box_save()
{
	$post_id = isset($_REQUEST['post_ID'])?$_REQUEST['post_ID']:'';
	// Verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	$nonce = isset($_REQUEST['_wpnonce'])?$_REQUEST['_wpnonce']:'';
	/*if (!wp_verify_nonce($nonce)) {
	return $post_id;
	}*/

	// Verify if this is an auto save routine. If it is our form has not been submitted, so we dont want
	// to do anything
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
	return $post_id;

	// Check permissions to edit pages and/or posts
	if ( isset($_POST['post_type']) && ('page' == $_POST['post_type'] ||  'post' == $_POST['post_type'])) {
		if ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ))
		return $post_id;
	} 

	//we're authenticated: we need to find and save the data
	$status = isset($_POST['_yts_status'])?$_POST['_yts_status']:'';
	// save data in INVISIBLE custom field (note the "_" prefixing the custom fields' name
	update_post_meta($post_id, '_yts_status', $status); 
}
?>