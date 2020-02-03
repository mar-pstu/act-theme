<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Особенности кафедры
 * Используется в секции "первого экрана" главной страницы
 **/
function shortcode_features() {
	$result = __return_empty_array();
	$items = get_theme_mod( ACT_THEME_SLUG . '_features', __return_empty_array() );
	if ( is_array( $items ) ) {
		foreach ( $items as &$item ) {
			if ( is_array( $item ) ) {
				$item = array_merge( array(
					'logo'    => ACT_THEME_URL . 'images/business.png',
					'title'   => '',
				), $item );
				if ( ! empty( $item[ 'title' ] ) ) {
					if ( function_exists( 'pll__' ) ) {
						$item[ 'title' ] = pll__( $item[ 'title' ] );
					}
					$result[] = sprintf(
						'<li class="features__item item"><img class="icon lazy" src="#" data-src="%1$s" alt="%2$s"><div class="title">%3$s</div></li>',
						$item[ 'logo' ],
						esc_attr( $item[ 'title' ] ),
						$item[ 'title' ]
					);
				}
			}	
		}
	}
	return ( empty( $result ) ) ? __return_empty_string() : '<ul class="features">' . implode( "\r\n", $result ) . '</ul>';
}

add_shortcode( 'features', 'act_theme\shortcode_features' );


/**
 * Направления работы
 * Используется в секции "первого экрана" главной страницы
 **/
function shortcode_directions( $args ) {
	$args = wp_parse_args( $args, array(
		'section' => true,
	) );
	$result = __return_empty_string();
	$items = get_theme_mod( ACT_THEME_SLUG . '_directions', __return_empty_array() );
	if ( is_array( $items ) ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( ACT_THEME_SLUG . '_directions_number', 4 ); $i++ ) {
			if ( isset( $items[ $i ] ) && is_array( $items[ $i ] ) ) {
				$items[ $i ] = array_merge( array(
					'icon'    => ACT_THEME_URL . 'images/business.png',
					'title'   => '',
					'excerpt' => '',
				), $items[ $i ] );
				if ( ! empty( $items[ $i ][ 'title' ] ) ) {
					if ( function_exists( 'pll__' ) ) {
						$items[ $i ][ 'title' ] = pll__( $items[ $i ][ 'title' ] );
						$items[ $i ][ 'excerpt' ] = pll__( $items[ $i ][ 'excerpt' ] );
					}
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/direction.php' );
				}
			}
		}
		$result = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $result ) ) {
		$result = '<div class="row center-xs stratch-xs">' . $result . '</div>';
		if ( ( bool ) $args[ 'section' ] ) {
			$result = '<section class="section directions" id="directions">' . $result . '</section>';
		}
	}
	return $result;
}

add_shortcode( 'directions', 'act_theme\shortcode_directions' );


/**
 * Специальности
 * Используется в секции "первого экрана" главной страницы
 **/
function shortcode_specialties( $args ) {
	$args = wp_parse_args( $args, array(
		'section' => true,
	) );
	$result = __return_empty_string();
	$items = get_theme_mod( ACT_THEME_SLUG . '_specialties', __return_empty_array() );
	if ( is_array( $items ) ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( ACT_THEME_SLUG . '_specialties_number', 4 ); $i++ ) {
			if ( isset( $items[ $i ] ) && is_array( $items[ $i ] ) ) {
				$items[ $i ] = array_merge( array(
					'thumbnail' => ACT_THEME_URL . 'images/thumbnail.png',
					'title'     => '',
					'link'      => '',
				), $items[ $i ] );
				if ( ! empty( $items[ $i ][ 'title' ] ) && ! empty( $items[ $i ][ 'link' ] ) ) {
					if ( function_exists( 'pll__' ) ) {
						$items[ $i ][ 'title' ] = pll__( $items[ $i ][ 'title' ] );
						$items[ $i ][ 'link' ] = pll__( $items[ $i ][ 'link' ] );
					}
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/specialty.php' );
				}
			}
		}
		$result = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $result ) ) {
		$result = '<div class="row center-xs">' . $result . '</div>';
		if ( ( bool ) $args[ 'section' ] ) {
			$result = '<section class="section specialties" id="directions">' . $result . '</section>';
		}
	}
	return $result;
}

add_shortcode( 'specialties', 'act_theme\shortcode_specialties' );


/**
 * Преподаватели
 * Используется на главной странице
 **/
function shortcode_teachers( $args ) {
	$args = wp_parse_args( $args, array(
		'section' => true,
	) );
	$result = __return_empty_string();
	$items = get_theme_mod( ACT_THEME_SLUG . '_teachers', __return_empty_array() );
	if ( is_array( $items ) ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( ACT_THEME_SLUG . '_teachers_number', 4 ); $i++ ) {
			if ( isset( $items[ $i ] ) && is_array( $items[ $i ] ) ) {
				$items[ $i ] = array_merge( array(
					'foto'    => ACT_THEME_URL . 'images/teacher.png',
					'name'    => '',
					'excerpt' => '',
				), $items[ $i ] );
				if ( ! empty( $items[ $i ][ 'title' ] ) && ! empty( $items[ $i ][ 'link' ] ) ) {
					if ( function_exists( 'pll__' ) ) {
						$items[ $i ][ 'name' ] = pll__( $items[ $i ][ 'name' ] );
						$items[ $i ][ 'excerpt' ] = pll__( $items[ $i ][ 'excerpt' ] );
					}
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/teacher.php' );
				}
			}
		}
		$result = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $result ) ) {
		wp_enqueue_script( 'slick' );
		wp_enqueue_style( 'slick' );
		$result = '<div class="row center-xs">' . $result . '</div>';
		if ( ( bool ) $args[ 'section' ] ) {
			$result = '<section class="section specialties" id="directions">' . $result . '</section>';
		}
	}
	return $result;
}

add_shortcode( 'teachers', 'act_theme\shortcode_teachers' );