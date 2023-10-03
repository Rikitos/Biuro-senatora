<?php

function justidea_files() {
  wp_enqueue_script('jquery');
	wp_enqueue_script('lottie', ('https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'), null, null, true);
	wp_enqueue_script('font-awesome', ('https://kit.fontawesome.com/574fabade3.js'));
	wp_enqueue_style('adobe-fonts', ('https://use.typekit.net/bto6gzh.css'));
	wp_enqueue_style('proxima-nova', ('https://use.typekit.net/ytm8xjs.css'));
	wp_enqueue_style('main', get_theme_file_uri('/assets/css/main.css'));
	wp_enqueue_style('custom', get_theme_file_uri('/assets/css/custom.css'));
	wp_enqueue_script('app', get_theme_file_uri('/assets/js/app.js'));
	wp_enqueue_script('custom', get_theme_file_uri('/assets/js/custom.js'), null, null, true);
}
add_action('wp_enqueue_scripts', 'justidea_files');


function justidea_features()
{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	add_image_size('half-screen', 1000, 9999, false );
	add_image_size('quarter-screen', 500, 9999, false );
}
add_action('after_setup_theme', 'justidea_features');

function my_login_stylesheet() {
	wp_enqueue_style( 'custom-login', get_theme_file_uri('assets/css/style-login.css'));
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


function custom_loginlogo_url() {
	return 'https://justidea.agency';
	
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );

/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute
 * 
 * source: https://www.awesomeacf.com/responsive-images-wordpress-acf/
 */

function acf_responsive_image($image_id, $image_size, $max_width) {
	// check the image ID is not blank
	if($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

		// generate the markup for the responsive image
		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';
	}
}

/*************** MENU ***************/
add_action('init', 'register_menu');
function register_menu() {
  register_nav_menus(array(
    'main-nav' => 'Menu Główne',
  ));
}


/*************** ACF ***************/
if (function_exists('acf_add_options_page')) {
  $parent = acf_add_options_page(array(
    'page_title'   => 'Dane firmy',
    'menu_title'  => 'Dane firmy',
    'menu_slug'   => 'company_info',
    'capability'  => 'edit_posts',
    'redirect'    => true
  ));
}

remove_action('wp_head', 'wp_generator');

function my_secure_generator( $generator, $type ) {  
  return '';
}
add_filter( 'the_generator', 'my_secure_generator', 10, 2 );

// function my_remove_src_version( $src ) {
//   global $wp_version;
//   $version_str = '?ver='.$wp_version;
//   $offset = strlen( $src ) - strlen( $version_str );
//   if ( $offset >= 0 && strpos($src, $version_str, $offset) !== FALSE )
//     return substr( $src, 0, $offset );
//     return $src;
//   }
// add_filter( 'script_loader_src', 'my_remove_src_version' );
// add_filter( 'style_loader_src', 'my_remove_src_version' );

// Disable gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);

// Remove extra P and BR from Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');



// <?php

// function site_files() {
//   wp_enqueue_script('main_scripts', get_theme_file_uri('/build/main.js'));
//   wp_enqueue_style('Website_main_styles', get_theme_file_uri('/build/style.css'));
// }

// add_action('wp_enqueue_scripts', 'site_files', 999);

// function custom_new_menu()
// {
// 	register_nav_menu('headerMainMenu', ('Header Main Menu'));
// 	register_nav_menu('footerMainMenu', ('Footer Main Menu'));
// }
// add_action('init', 'custom_new_menu');