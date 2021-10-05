<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * перевод всех настроек
 * */
function add_translation_string_mods() {
	$mods = apply_filters( 'template_pll_theme_mod_translate', [
		'jumbotron_title' => 'pll__',
		'jumbotron_description' => 'pll__',
		'jumbotron_label' => 'pll__',
		'jumbotron_permalink' => 'pll__',
		'about_page_id' => 'pll_get_post',
		'about_title' => 'pll__',
		'about_label' => 'pll__',
		'directions_title' => 'pll__',
		'directions_subtitle' => 'pll__',
		'directions_page_id' => 'pll_get_post',
		'directions_label' => 'pll__',
		'advertising_title' => 'pll__',
		'advertising_excerpt' => 'pll__',
		'advertising_label' => 'pll__',
		'advertising_video' => 'pll__',
		'specialties_title' => 'pll__',
		'specialties_subtitle' => 'pll__',
		'specialties_page_id' => 'pll_get_post',
		'specialties_label' => 'pll__',
		'teachers_title' => 'pll__',
		'teachers_excerpt' => 'pll__',
		'teachers_subtitle' => 'pll__',
		'hometeachersdescription' => 'pll__',
		'teachers_page_id' => 'pll_get_post',
		'teachers_label' => 'pll__',
		'teachers_socials' => 'pll__',
		'steps_title' => 'pll__',
		'steps_subtitle' => 'pll__',
		'steps_page_id' => 'pll_get_post',
		'steps_label' => 'pll__',
		'cources_title' => 'pll__',
		'cources_subtitle' => 'pll__',
		'cources_page_id' => 'pll_get_post',
		'cources_label' => 'pll__',
		'graduates_title' => 'pll__',
		'graduates_subtitle' => 'pll__',
		'graduates_page_id' => 'pll_get_post',
		'graduates_label' => 'pll__',
		'advantages_title' => 'pll__',
		'advantages_subtitle' => 'pll__',
		'advantages_page_id' => 'pll_get_post',
		'advantages_label' => 'pll__',
		'questions_title' => 'pll__',
		'questions_subtitle' => 'pll__',
		'questions_shortcode' => 'pll__',
		'questions_page_id' => 'pll_get_post',
		'questions_label' => 'pll__',
		'error404_title' => 'pll__',
		'error404_description' => 'pll__',
	] );
	foreach ( $mods as $name => $func ) {
		add_filter( 'theme_mod_' . $name, $func, 10, 1 );
	}
}

add_action( 'init', 'act_theme\add_translation_string_mods', 10, 0 );