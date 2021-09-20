<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };




/**
 * Подключение скриптов
 *
 * @param string $handle Имя / идентификатор скрипта
 * @param string $src URL на файл скрипта
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param bool $in_footer подключать в шапке или подвале
 */
function act_theme_scripts() {
	wp_enqueue_script( 'act-theme-main', ACT_THEME_URL . 'scripts/main.js', array( 'jquery', 'fancybox' ), filemtime( get_theme_file_path( 'scripts/main.js' ) ), true );
	wp_localize_script( 'act-theme-main', 'ACTTheme', array(
		'toTopBtn' => __( 'Наверх', ACT_THEME_TEXTDOMAIN ),
		'url'      => ACT_THEME_URL,
	) );
	wp_enqueue_script( 'lazyload', ACT_THEME_URL . 'scripts/lazyload.js', array( 'jquery' ), '1.7.6', true );
	wp_register_script( 'slick', ACT_THEME_URL . 'scripts/slick.js', array( 'jquery' ), '1.8.0', true );
	wp_enqueue_script( 'fancybox', ACT_THEME_URL . 'scripts/fancybox.js', array( 'jquery' ), '3.3.5', true );
	wp_add_inline_script( 'fancybox', "jQuery( '.fancybox' ).fancybox();", 'after' );
	if ( file_exists( $init_gallery_script_path = get_theme_file_path( 'scripts/gallery.js' ) ) ) {
		wp_add_inline_script( 'fancybox', file_get_contents( $init_gallery_script_path ), 'after' );
	}
	wp_add_inline_script( 'lazyload', "jQuery( '.lazy' ).lazy();", 'after' );
	wp_enqueue_script( 'superembed', ACT_THEME_URL . 'scripts/superembed.js', array( 'jquery' ), '3.1', true );
}
add_action( 'wp_enqueue_scripts', 'act_theme_scripts' );






/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function act_theme_styles() {
	$slug = ACT_THEME_SLUG;
	wp_enqueue_style( 'act-theme-main', ACT_THEME_URL . 'styles/main.css', array(), filemtime( get_theme_file_path( 'styles/main.css' ) ), 'all' );
	$main_css = act_theme\css_array_to_css( array(
		'.indicators' => array(
			'color'      => get_theme_mod( 'indicators_text_color', '#ffffff' ),
		),
		'.advertising .title, .advertising .excerpt, .advertising .play' => array(
			'color'      => get_theme_mod( 'advertising_text_color', '#ffffff' ),
		),
		'.advertising .play path' => array(
			'fill'       => get_theme_mod( 'advertising_text_color', '#ffffff' ),
		),
		'.jumbotron .title, .jumbotron .description' => array(
			'color'      => get_theme_mod( 'jumbotron_text_color', '#ffffff' ),
		),
	), array( 'container' => false ) );
	wp_add_inline_style( 'act-theme-main', $main_css );
	wp_enqueue_style( 'act-theme-font', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap&subset=cyrillic,cyrillic-ext', array(), '14', 'all' );
	wp_enqueue_style( 'fancybox', ACT_THEME_URL . 'styles/fancybox.css', array(), '3.3.5', 'all' );
	wp_register_style( 'slick', ACT_THEME_URL . 'styles/slick.css', array(), '1.8.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'act_theme_styles', 10, 0 );







function act_theme_ctitical_styles() {
	if ( file_exists( ACT_THEME_DIR . 'styles/critical.css' ) ) {
		echo '<style type="text/css">' . file_get_contents( ACT_THEME_DIR . 'styles/critical.css' ) . '</style>';
	}
}
add_action( 'wp_head', 'act_theme_ctitical_styles', 10, 0 );