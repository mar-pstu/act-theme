<?php


namespace act_theme;


use WP_Post;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'teachers_title', __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ) ) );
$excerpt = trim( get_theme_mod( 'teachers_excerpt', '' ) );
$subtitle = trim( get_theme_mod( 'teachers_subtitle', '' ) );
$label = trim( get_theme_mod( 'teachers_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) ) );
$permalink = '';
$socials_title = trim( get_theme_mod( 'teachers_socials', __( 'Мы в социальных сетях', ACT_THEME_TEXTDOMAIN ) ) );
$page_id = get_theme_mod( 'teachers_page_id', '' );
$content = '';
$socials_list = shortcode_socials_list();
$description = trim( get_theme_mod( 'hometeachersdescription', '' ) );

if ( ! empty( $page_id ) ) {
	$permalink = get_permalink( $page_id );
}

switch ( get_theme_mod( 'teachers_type', 'list' ) ) {
	case 'content':
		$page = get_post( $page_id, OBJECT, 'raw' );
		if ( $page instanceof WP_Post ) {
			$parts = get_extended( $page->post_content );
			$content = do_shortcode( $parts[ 'main' ], false );
		}
		break;
	case 'list':
	default:
		$content = shortcode_teachers( array(
			'section' => false,
		) );
		break;
}


include get_theme_file_path( 'views/home/teachers.php' );