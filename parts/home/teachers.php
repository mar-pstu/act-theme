<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( ACT_THEME_SLUG . '_teachers_title', __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ) );
$subtitle = get_theme_mod( ACT_THEME_SLUG . '_teachers_subtitle', '' );
$description = get_theme_mod( ACT_THEME_SLUG . '_teachers_description', '' );
$label = get_theme_mod( ACT_THEME_SLUG . '_teachers_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) );
$socials_title = get_theme_mod( ACT_THEME_SLUG . '_teachers_socials', __( 'Мы в социальных сетях', ACT_THEME_TEXTDOMAIN ) );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$subtitle = pll__( $subtitle );
	$description = pll__( $description );
	$label = pll__( $label );
	$socials_title = pll__( $socials_title );
}


