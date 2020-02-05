<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$section_name = 'advantages';
$title = get_theme_mod( ACT_THEME_SLUG . '_advantages_title', __( 'Пому именно наша кафедра', ACT_THEME_TEXTDOMAIN ) );
$subtitle = get_theme_mod( ACT_THEME_SLUG . '_advantages_subtitle', __return_empty_string() );
$content = __return_empty_string();
$permalink = __return_empty_string();
$label = get_theme_mod( ACT_THEME_SLUG . '_advantages_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) );
$page_id = get_translate_id( get_theme_mod( ACT_THEME_SLUG . '_advantages_page_id', '' ), 'page' );
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


switch ( get_theme_mod( ACT_THEME_SLUG . '_advantages_type', 'list' ) ) {
	case 'content':
		if ( $page instanceof \WP_Post ) {
			$parts = get_extended( $page->post_content );
			$content = do_shortcode( $parts[ 'main' ], false );
		}
		break;
	case 'list':
	default:
		$content = shortcode_advantages( array(
			'section' => false,
		) );
		break;
}


include get_theme_file_path( 'views/home/section.php' );