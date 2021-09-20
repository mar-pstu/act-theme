<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'advertising_title', get_bloginfo( 'name' ) ) );
$excerpt = trim( get_theme_mod( 'advertising_excerpt', get_bloginfo( 'description' ) ) );
$label = trim( get_theme_mod( 'advertising_label', __( 'Нажмите, чтобы воспроизвести видео', ACT_THEME_TEXTDOMAIN ) ) );
$video = get_theme_mod( 'advertising_video', '' );
$bgi =  get_theme_mod( 'advertising_bgi', ACT_THEME_URL . 'images/advertising.jpg' );


include get_theme_file_path( 'views/home/advertising.php' );
