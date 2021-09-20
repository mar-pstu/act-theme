<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'jumbotron_title', get_bloginfo( 'name' ) );
$description = get_theme_mod( 'jumbotron_description', get_bloginfo( 'description' ) );
$label = get_theme_mod( 'jumbotron_label', __( 'Подробней', ACT_THEME_TEXTDOMAIN ) );
$permalink = get_theme_mod( 'jumbotron_permalink', '' );
$bgi_src = get_theme_mod( 'jumbotronbgisrc', '' );
$bgi_id = 0;

if ( is_url( $bgi_src ) ) {
	$bgi_id = attachment_url_to_postid( removing_image_size_from_url( $bgi_src ) );
}

include get_theme_file_path( 'views/home/jumbotron.php' );