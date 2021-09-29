<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Загрузка "переводов"
 */
function load_textdomain() {
	load_theme_textdomain( ACT_THEME_TEXTDOMAIN, ACT_THEME_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'act_theme\load_textdomain' );