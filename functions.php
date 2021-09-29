<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



define( 'ACT_THEME_URL', get_template_directory_uri() . '/' );
define( 'ACT_THEME_DIR', get_template_directory() . '/' );
define( 'ACT_THEME_TEXTDOMAIN', 'act_theme' );
define( 'ACT_THEME_SLUG', 'act_theme' );




get_template_part( 'includes/enqueue' );
get_template_part( 'includes/template-functions' );
get_template_part( 'includes/shortcodes' );
get_template_part( 'includes/gutenberg' );
get_template_part( 'includes/brand' );
get_template_part( 'includes/menus' );
get_template_part( 'includes/sidebars' );



/**
 * Регистрация переводов строк
 */
if ( function_exists( 'pll_register_string' ) ) {
	include get_theme_file_path( 'includes/register-strings.php' );
}



/**
 * Регистрация настроек кастомайзера
 */
if ( is_customize_preview() ) {
	
}




function act_theme_theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'act_theme_theme_supports' );



/**
 * Загрузка "переводов"
 */
function act_theme_load_textdomain() {
	load_theme_textdomain( ACT_THEME_TEXTDOMAIN, ACT_THEME_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'act_theme_load_textdomain' );





/**
 * Редирект на запись со страницы поиска, если найдена всего одна запись
 */
function act_theme_single_result(){  
	if( ! is_search() ) return;
	global $wp_query;
	if( $wp_query->post_count == 1 ) {  
		wp_redirect( get_permalink( reset( $wp_query->posts )->ID ) );
		die;
	}  
}
add_action( 'template_redirect', 'act_theme_single_result' );



if ( is_customize_preview() ) {
	get_template_part( 'customizer/control', 'tinymce-editor' );
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