<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация "сайдбаров"
 */
function register_sidebars() {
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
	register_sidebar( array(
		'name'             => __( 'Сайдбар подвала', ACT_THEME_TEXTDOMAIN ),
		'id'               => 'basement',
		'description'      => __( 'Отображается только на главной странице', ACT_THEME_TEXTDOMAIN ),
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );
	register_sidebar( array(
		'name'             => __( 'Меню', ACT_THEME_TEXTDOMAIN ),
		'id'               => 'mobile',
		'description'      => __( 'Отображается в мобильном меню', ACT_THEME_TEXTDOMAIN ),
		'class'            => '',
		'before_widget'    => '<div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );
}

add_action( 'widgets_init', 'act_theme\register_sidebars' );