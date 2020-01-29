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
    if ( get_theme_mod( ACT_THEME_SLUG . "_{$key}_flag", false ) )
        get_template_part( "parts/home/$key" );
}


get_footer();