<?php


namespace act_theme;


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
function scripts() {
	$suffix = ( SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'act-theme-main', get_theme_file_uri( "scripts/main{$suffix}.js" ), [ 'jquery', 'fancybox' ], filemtime( get_theme_file_path( "scripts/main{$suffix}.js" ) ), true );
	wp_localize_script( 'act-theme-main', 'ACTTheme', [
		'toTopBtn' => __( 'Наверх', ACT_THEME_TEXTDOMAIN ),
		'url'      => ACT_THEME_URL,
	] );
	wp_enqueue_script( 'lazyload', get_theme_file_uri( "scripts/lazyload{$suffix}.js" ), [ 'jquery' ], '1.7.6', true );
	wp_register_script( 'slick', get_theme_file_uri( "scripts/slick{$suffix}.js" ), [ 'jquery' ], '1.8.0', true );
	wp_enqueue_script( 'fancybox', get_theme_file_uri( "scripts/fancybox{$suffix}.js" ), [ 'jquery' ], '3.3.5', true );
	wp_add_inline_script( 'fancybox', "jQuery( '.fancybox' ).fancybox();", 'after' );
	if ( file_exists( $init_gallery_script_path = get_theme_file_path( "scripts/gallery{$suffix}.js" ) ) ) {
		wp_add_inline_script( 'fancybox', file_get_contents( $init_gallery_script_path ), 'after' );
	}
	wp_add_inline_script( 'lazyload', "jQuery( '.lazy' ).lazy();", 'after' );
	wp_enqueue_script( 'superembed', get_theme_file_uri( "scripts/superembed{$suffix}.js" ), [ 'jquery' ], '3.1', true );
}

add_action( 'wp_enqueue_scripts', 'act_theme\scripts' );


/**
 * Отключение стилей при выводе их в шапке, чтобы подкючить в подвале сайта
 */
function dequeue_style() {
	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wpdiscuz-font-awesome' );
	wp_dequeue_style( 'wpdiscuz-frontend-css' );
	wp_dequeue_style( 'wpdiscuz-user-content-css' );
	wp_dequeue_style( 'exactmetrics-popular-posts-style-css' );
	wp_dequeue_style( 'tablepress-default-css' );
}

add_action( 'wp_print_styles', 'act_theme\dequeue_style' );




/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function styles() {
	$suffix = ( SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_style( 'act-theme-main', get_theme_file_uri( "styles/main{$suffix}.css" ), [], filemtime( get_theme_file_path( "styles/main{$suffix}.css" ) ), 'all' );
	wp_add_inline_style( 'act-theme-main', css_array_to_css( [
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
	], [ 'container' => false ] ) );
	wp_enqueue_style( 'act-theme-font', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap&subset=cyrillic,cyrillic-ext', [], '14', 'all' );
	wp_enqueue_style( 'fancybox', get_theme_file_uri( "styles/fancybox{$suffix}.css" ), [], '3.3.5', 'all' );
	wp_enqueue_style( 'slick', get_theme_file_uri( "styles/slick{$suffix}.css" ), [], '1.8.0', 'all' );
	wp_enqueue_style( 'contact-form-7' );
	wp_enqueue_style( 'wp-block-library' );
	wp_enqueue_style( 'wpdiscuz-font-awesome' );
	wp_enqueue_style( 'wpdiscuz-frontend-css' );
	wp_enqueue_style( 'wpdiscuz-user-content-css' );
	wp_enqueue_style( 'exactmetrics-popular-posts-style-css' );
	wp_enqueue_style( 'tablepress-default-css' );
}

add_action( 'get_footer', 'act_theme\styles', 10, 0 );


/**
 * Подключение стилей инлайн для более быстрой отрисовки страницы
 * */
function ctitical_styles() {
	$suffix = ( SCRIPT_DEBUG ) ? '' : '.min';
	$critical_file_path = get_theme_file_path( "styles/critical{$suffix}.css" );
	if ( file_exists( $critical_file_path ) ) {
		echo '<style type="text/css">' . file_get_contents( $critical_file_path ) . '</style>';
	}
}

add_action( 'wp_head', 'act_theme\ctitical_styles', 10, 0 );