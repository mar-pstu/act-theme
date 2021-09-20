<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( have_posts() ) {

	while ( have_posts() ) {
		
		the_post();

		echo '<article id="post-' . get_the_ID() . '" class="' . implode( ' ', get_post_class( '', get_the_ID() ) ) . '">';
		the_title( '<h1 class="mt-2 mb-2">', '</h1>', true );
		the_breadcrumb();
		echo '<div class="content">';
		the_content();
		echo '</div>';
		the_pager();
		if ( comments_open( get_the_ID() ) ) {
			comments_template();
		}
		echo '</article>';

	}

}