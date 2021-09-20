<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$page_id = get_theme_mod( 'about_page_id', '' );


if ( ! empty( $page_id ) ) {

	$page = get_post( $page_id, OBJECT, 'raw' );

	if ( $page instanceof \WP_Post ) {

		$title = trim( get_theme_mod( 'about_title', __( 'О нас', ACT_THEME_TEXTDOMAIN ) ) );
		$label = trim( get_theme_mod( 'about_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) ) );
		$thumbnail_src = get_theme_mod( 'about_thumbnail', '' );
		$permalink = get_permalink( $page->ID );

		$parts = get_extended( $page->post_content );
		$content = do_shortcode( $parts[ 'main' ], false );

		include get_theme_file_path( 'views/home/about.php' );

	}

}