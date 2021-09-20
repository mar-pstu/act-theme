<?php


get_header();


foreach ( array(
	'jumbotron',
    'about',
    'directions',
    'advertising',
    'specialties',
    'teachers',
    'indicators',
    'steps',
    'cources',
    'graduates',
    'advantages',
    'questions',
) as $key ) {
    if ( get_theme_mod( $key . '_flag', false ) ) {
        get_template_part( "parts/home/$key" );
    }
}


if ( is_active_sidebar( 'basement' ) ) {
    get_sidebar( 'basement' );
}


get_footer();