<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

register_nav_menus( array(
	'main' =>'Menu Principal',
));
function myfirsttheme_register_assets(){
	wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap');
}
add_action('wp_enqueue_scripts', 'myfirsttheme_register_assets');