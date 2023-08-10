<?php

function site_files() {
  wp_enqueue_script('main_scripts', get_theme_file_uri('/build/main.js'));
  wp_enqueue_style('Website_main_styles', get_theme_file_uri('/build/style.css'));
}

add_action('wp_enqueue_scripts', 'site_files', 999);

function custom_new_menu()
{
	register_nav_menu('headerMainMenu', ('Header Main Menu'));
	register_nav_menu('footerMainMenu', ('Footer Main Menu'));
}
add_action('init', 'custom_new_menu');