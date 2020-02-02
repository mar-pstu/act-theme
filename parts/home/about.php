<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$page_id = get_translate_id( get_theme_mod( ACT_THEME_SLUG . '_about_page_id', '' ), 'page' );


if ( ! empty( $page_id ) ) {

	$page = get_post( $page_id, OBJECT, 'raw' );

	if ( $page instanceof \WP_Post ) {

		$title = get_theme_mod( ACT_THEME_SLUG . '_about_title', __( 'О нас', ACT_THEME_TEXTDOMAIN ) );
		$label = get_theme_mod( ACT_THEME_SLUG . '_about_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) );
		$thumbnail_src = get_theme_mod( ACT_THEME_SLUG . '_about_thumbnail', '' );
		$permalink = get_permalink( $page->ID );

		if ( function_exists( 'pll__' ) ) {
			$title = pll__( $title );
			$label = pll__( $label );
		}

		$parts = get_extended( $page->post_content );
		$content = do_shortcode( $parts[ 'main' ], false );

		if ( empty( $title ) ) {
			$title = apply_filters( 'the_title', $page->post_title, $page->ID );
		}

		include get_theme_file_path( 'views/home/about.php' );

	}

}