<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$bgi = get_theme_mod( ACT_THEME_SLUG . '_indicators_bgi', ACT_THEME_URL . 'images/indicators.jpg' );
$content = shortcode_indicators( array( 'section' => false ) );


if ( ! empty( $content ) ) {
	include get_theme_file_path( 'views/home/indicators.php' );
}