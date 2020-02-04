<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$section_name = 'steps';
$title = get_theme_mod( ACT_THEME_SLUG . '_steps_title', __( 'Шаги к поступлению', ACT_THEME_TEXTDOMAIN ) );
$subtitle = get_theme_mod( ACT_THEME_SLUG . '_steps_subtitle', '' );
$content = __return_empty_string();
$permalink = __return_empty_string();
$label = get_theme_mod( ACT_THEME_SLUG . '_steps_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) );
$page_id = get_translate_id( get_theme_mod( ACT_THEME_SLUG . '_steps_page_id', '' ), 'page' );
$page = ( empty( $page_id ) ) ? __return_false() : get_post( $page_id, OBJECT );


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$subtitle = pll__( $subtitle );
	$label = pll__( $label );
}


if ( $page instanceof \WP_Post ) {
	$permalink = get_permalink( $page, false );
	if ( empty( $title ) ) {
		$title = apply_filters( 'the_title', $page->post_title, $page->ID );
	}
	if ( empty( $subtitle ) ) {
		$subtitle = $page->post_excerpt;
	}
}


switch ( get_theme_mod( ACT_THEME_SLUG . '_steps_type', 'list' ) ) {
	case 'content':
		if ( $page instanceof \WP_Post ) {
			$parts = get_extended( $page->post_content );
			$content = do_shortcode( $parts[ 'main' ], false );
		}
		break;
	case 'list':
	default:
		$content = shortcode_steps( array(
			'section' => false,
		) );
		break;
}


include get_theme_file_path( 'views/home/section.php' );