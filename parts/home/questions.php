<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$section_name = 'questions';
$title = get_theme_mod( ACT_THEME_SLUG . '_questions_title', __( 'Остались вопросы?', ACT_THEME_TEXTDOMAIN ) );
$subtitle = get_theme_mod( ACT_THEME_SLUG . '_questions_subtitle', __( 'Напишите нам, мы с Вами обязательно свяжемся.', ACT_THEME_TEXTDOMAIN ) );
$label = get_theme_mod( ACT_THEME_SLUG . '_questions_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) );
$permalink = __return_empty_string();
$page_id = get_translate_id( get_theme_mod( ACT_THEME_SLUG . '_questions_page_id', '' ), 'page' );
$shortcode = get_theme_mod( ACT_THEME_SLUG . '_questions_shortcode', '[contacts_form]' );
$content = __return_empty_string();


if ( function_exists( 'pll__' ) ) {
	$title = pll__( $title );
	$subtitle = pll__( $subtitle );
	$label = pll__( $label );
}


if ( ! empty( $page_id ) ) {

	$page = get_post( $page_id, OBJECT, 'raw' );

	if ( $page instanceof \WP_Post ) {

		$permalink = get_permalink( $page->ID, false );

		if ( empty( $title ) ) {
			$title = apply_filters( 'the_title', $page->post_title, $page->ID );
		}

		if ( empty( $subtitle ) ) {
			$subtitle = $page->post_excerpt;
		}

	}

}


switch ( get_theme_mod( ACT_THEME_SLUG . '_questions_type', 'shortcode' ) ) {

	case 'content':
		if ( $page instanceof \WP_Post ) {
			$parts = get_extended( $page->post_content );
			$content = do_shortcode( $parts[ 'main' ], false );
		}
		break;
	
	case 'shortcode':
	default:
		$content = ( empty( $shortcode ) ) ? shortcode_contacts_form() : do_shortcode( $shortcode, false );
		break;

}


include get_theme_file_path( 'views/home/section.php' );