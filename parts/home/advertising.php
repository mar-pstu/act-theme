<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( ACT_THEME_SLUG . '_advertising_title', get_bloginfo( 'name' ) );
$excerpt = get_theme_mod( ACT_THEME_SLUG . '_advertising_excerpt', get_bloginfo( 'description' ) );
$label = get_theme_mod( ACT_THEME_SLUG . '_advertising_label', __( 'Нажмите, чтобы воспроизвести видео', ACT_THEME_TEXTDOMAIN ) );
$video = get_theme_mod( ACT_THEME_SLUG . '_advertising_video', __return_empty_string() );
$bgi =  get_theme_mod( ACT_THEME_SLUG . '_advertising_bgi', ACT_THEME_URL . 'images/advertising.jpg' );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$excerpt = pll__( $excerpt );
	$label = pll__( $label );
	$video = pll__( $video );
}


include get_theme_file_path( 'views/home/advertising.php' );
