<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * 
 * */
function add_register_strings() {
	$strings = apply_filters( 'template_pll_register_strings', [
		'jumbotron_title' => false,
		'jumbotron_description' => true,
		'jumbotron_label' => false,
		'jumbotron_permalink' => false,
		'about_title' => false,
		'about_label' => false,
		'directions_title' => false,
		'directions_subtitle' => true,
		'directions_label' => false,
		'advertising_title' => false,
		'advertising_excerpt' => true,
		'advertising_label' => false,
		'advertising_video' => false,
		'specialties_title' => false,
		'specialties_subtitle' => true,
		'specialties_label' => false,
		'teachers_title' => false,
		'teachers_excerpt' => true,
		'teachers_subtitle' => false,
		'hometeachersdescription' => true,
		'teachers_label' => false,
		'teachers_socials' => false,
		'steps_title' => false,
		'steps_subtitle' => true,
		'steps_label' => false,
		'cources_title' => false,
		'cources_subtitle' => true,
		'cources_label' => false,
		'graduates_title' => false,
		'graduates_subtitle' => true,
		'graduates_label' => false,
		'advantages_title' => false,
		'advantages_subtitle' => true,
		'advantages_label' => false,
		'questions_title' => false,
		'questions_subtitle' => true,
		'questions_shortcode' => false,
		'questions_label' => false,
		'error404_title' => false,
		'error404_description' => true,
	] );
	foreach ( $strings as $name => $multiline ) {
		$string = get_theme_mod( $name );
		if ( ! empty( $string ) ) {
			pll_register_string( $name, $string, ACT_THEME_TEXTDOMAIN, $multiline );
		}
	}
}

add_action( 'init', 'act_theme\add_register_strings', 10, 0 );