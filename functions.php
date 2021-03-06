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
	include get_theme_file_path( 'includes/customizer.php' );
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
 * Регистрация меню
 */
function act_theme_register_nav_menus() {
	register_nav_menus( array(
		'main'      => __( 'Главное меню', ACT_THEME_TEXTDOMAIN ),
	) );
}
add_action( 'after_setup_theme', 'act_theme_register_nav_menus' );




/**
 * Регистрация "сайдбаров"
 */
function act_theme_register_sidebars() {
	register_sidebar( array(
		'name'             => __( 'Колонка', ACT_THEME_TEXTDOMAIN ),
		'id'               => 'column',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );
}
add_action( 'widgets_init', 'act_theme_register_sidebars' );





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