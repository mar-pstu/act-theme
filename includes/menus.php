<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };



/**
 * Регистрация меню
 */
function register_menus() {
	register_nav_menus( array(
		'main'      => __( 'Главное меню', ACT_THEME_TEXTDOMAIN ),
		'mobile'    => __( 'Мобильное меню', ACT_THEME_TEXTDOMAIN ),
	) );
}
add_action( 'after_setup_theme', 'act_theme\register_menus' );



/**
 * Добавляет класс к родительским пунктам меню
 */
function add_class_to_parent_menu_item( $items ) {
	foreach( $items as $item ) {
		if ( is_nav_has_sub_menu( $item->ID, $items ) ) {
			$item->classes[] = 'has-sub-menu';
		}
	}
	return $items;
}

add_filter( 'wp_nav_menu_objects', 'act_theme\add_class_to_parent_menu_item' );