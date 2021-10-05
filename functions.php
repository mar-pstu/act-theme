<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'ACT_THEME_URL', get_template_directory_uri() . '/' );
define( 'ACT_THEME_DIR', get_template_directory() . '/' );
define( 'ACT_THEME_TEXTDOMAIN', 'act_theme' );
define( 'ACT_THEME_SLUG', 'act_theme' );


get_template_part( 'includes/theme-supports' );
get_template_part( 'includes/textdomain' );
get_template_part( 'includes/theme-functions' );
get_template_part( 'includes/brand' );
get_template_part( 'includes/menus' );
get_template_part( 'includes/sidebars' );
get_template_part( 'includes/gutenberg' );


if ( ! is_admin() ) {
	get_template_part( 'includes/enqueue-public' );
	get_template_part( 'includes/shortcodes' );
	get_template_part( 'includes/search-result' );
}


if ( in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	get_template_part( 'pll/register-strings' );
	! is_customize_preview() get_template_part( 'pll/translation-mods' );
}


if ( is_customize_preview() ) {
	get_template_part( 'customizer/control', 'tinymce-editor' );
	get_template_part( 'customizer/control', 'list' );
	get_template_part( 'customizer/panels' );
	get_template_part( 'customizer/home', 'jumbotron' );
	get_template_part( 'customizer/home', 'about' );
	get_template_part( 'customizer/home', 'directions' );
	get_template_part( 'customizer/home', 'advertising' );
	get_template_part( 'customizer/home', 'specialties' );
	get_template_part( 'customizer/home', 'teachers' );
	get_template_part( 'customizer/home', 'indicators' );
	get_template_part( 'customizer/home', 'steps' );
	get_template_part( 'customizer/home', 'cources' );
	get_template_part( 'customizer/home', 'graduates' );
	get_template_part( 'customizer/home', 'advantages' );
	get_template_part( 'customizer/home', 'questions' );
	get_template_part( 'customizer/list', 'directions' );
	get_template_part( 'customizer/list', 'specialties' );
	get_template_part( 'customizer/list', 'teachers' );
	get_template_part( 'customizer/list', 'socials' );
	get_template_part( 'customizer/list', 'indicators' );
	get_template_part( 'customizer/list', 'steps' );
	get_template_part( 'customizer/list', 'cources' );
	get_template_part( 'customizer/list', 'graduates' );
	get_template_part( 'customizer/list', 'advantages' );
	get_template_part( 'customizer/pages', '404' );
}