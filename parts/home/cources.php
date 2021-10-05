<?php


namespace act_theme;


use WP_Post;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$section_name = 'cources';
$title = trim( get_theme_mod( 'cources_title', __( 'Курсы', ACT_THEME_TEXTDOMAIN ) ) );
$subtitle = trim( get_theme_mod( 'cources_subtitle', '' ) );
$content = '';
$permalink = '';
$label = trim( get_theme_mod( 'cources_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) ) );
$page_id = get_theme_mod( 'cources_page_id', '' );

if ( $page_id ) {
	$permalink = get_permalink( $page_id, false );
}

switch ( get_theme_mod( 'cources_type', 'list' ) ) {
	case 'content':
		$page = empty( $page_id ) ? false : get_post( $page_id, OBJECT );
		if ( $page instanceof WP_Post ) {
			$parts = get_extended( $page->post_content );
			$content = do_shortcode( $parts[ 'main' ], false );
		}
		break;
	case 'list':
	default:
		$content = shortcode_cources( array(
			'section' => false,
		) );
		break;
}


include get_theme_file_path( 'views/home/section.php' );