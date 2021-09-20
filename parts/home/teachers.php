<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'teachers_title', __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ) ) );
$excerpt = trim( get_theme_mod( 'teachers_excerpt', '' ) );
$subtitle = trim( get_theme_mod( 'teachers_subtitle', '' ) );
$label = trim( get_theme_mod( 'teachers_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) ) );
$permalink = '';
$socials_title = trim( get_theme_mod( 'teachers_socials', __( 'Мы в социальных сетях', ACT_THEME_TEXTDOMAIN ) ) );
$page_id = get_theme_mod( 'teachers_page_id', '' );
$teachers = shortcode_teachers( array(
	'section' => false,
) );
$socials_list = shortcode_socials_list();
$content = trim( get_theme_mod( 'hometeachersdescription', '' ) );


if ( ! empty( $page_id ) ) {

	$permalink = get_permalink( $page_id );

	if ( empty( $content ) ) {

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

}



include get_theme_file_path( 'views/home/teachers.php' );