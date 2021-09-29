<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
	add_post_type_support( 'page', 'excerpt' );
}

add_action( 'after_setup_theme', 'act_theme\theme_supports' );