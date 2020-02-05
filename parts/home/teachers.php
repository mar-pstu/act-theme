<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( ACT_THEME_SLUG . '_teachers_title', __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ) );
$excerpt = get_theme_mod( ACT_THEME_SLUG . '_teachers_excerpt', '' );
$subtitle = get_theme_mod( ACT_THEME_SLUG . '_teachers_subtitle', '' );
$label = get_theme_mod( ACT_THEME_SLUG . '_teachers_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) );
$socials_title = get_theme_mod( ACT_THEME_SLUG . '_teachers_socials', __( 'Мы в социальных сетях', ACT_THEME_TEXTDOMAIN ) );
$page_id = get_translate_id( get_theme_mod( ACT_THEME_SLUG . '_teachers_page_id', '' ), 'page' );
$teachers = shortcode_teachers( array(
	'section' => false,
) );
$socials_list = shortcode_socials_list();


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$excerpt = pll__( $excerpt );
	$subtitle = pll__( $subtitle );
	$label = pll__( $label );
	$socials_title = pll__( $socials_title );
}



if ( ! empty( $page_id ) ) {

	$page = get_post( $page_id, OBJECT, 'raw' );

	if ( $page instanceof \WP_Post ) {

		if ( empty( $title ) ) {
			$title = apply_filters( 'the_title', $page->post_title, $page->ID );
		}

		if ( empty( $subtitle ) ) {
			$subtitle = $page->post_excerpt;
		}

		$parts = get_extended( $page->post_content );
		$content = do_shortcode( $parts[ 'main' ], false );

	}

}



include get_theme_file_path( 'views/home/teachers.php' );