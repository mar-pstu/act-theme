<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( ACT_THEME_SLUG . '_jumbotron_title', get_bloginfo( 'name' ) );
$description = get_theme_mod( ACT_THEME_SLUG . '_jumbotron_description', get_bloginfo( 'description' ) );
$label = get_theme_mod( ACT_THEME_SLUG . '_jumbotron_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) );
$permalink = get_theme_mod( ACT_THEME_SLUG . '_jumbotron_permalink', __return_empty_string() );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$description = pll__( $description );
	$label = pll__( $label );
	$permalink = pll__( $permalink );
}


include get_theme_file_path( 'views/home/jumbotron.php' );