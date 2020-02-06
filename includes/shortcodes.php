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
	$slides = __return_empty_string();
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
				if ( ! empty( $items[ $i ][ 'name' ] ) ) {
					if ( function_exists( 'pll__' ) ) {
						$items[ $i ][ 'name' ] = pll__( $items[ $i ][ 'name' ] );
						$items[ $i ][ 'excerpt' ] = pll__( $items[ $i ][ 'excerpt' ] );
					}
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/teacher.php' );
				}
			}
		}
		$slides = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $slides ) ) {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'slick' );
		wp_enqueue_style( 'slick' );
		ob_start();
		?>
			<div id="teachers-list">
				<?php echo $slides; ?>
			</div>
			<div class="slider-controls" id="teachers-controls">
				<button class="slider-arrow arrow-prev" id="teachers-prev">
					<span class="sr-only"><?php _e( 'Предыдущий слайд', ACT_THEME_TEXTDOMAIN ); ?></span>
				</button>
				<button class="slider-arrow arrow-next" id="teachers-next">
					<span class="sr-only"><?php _e( 'Следующий слайд', ACT_THEME_TEXTDOMAIN ); ?></span>
				</button>
			</div>
			<script>
				( function () {
					jQuery().ready( function () {
						jQuery( '#teachers-list' ).slick( {
							dots: true,
							arrows: true,
							prevArrow: '#teachers-prev',
							nextArrow: '#teachers-next',
							fade: false,
							dotsClass: 'slider-dots',
							appendDots: '#teachers-controls',
							autoplay: true,
							autoplaySpeed: 5000,
							speed: 1000,
							lazyLoad: 'ondemand',
							slidesToShow: 4,
							slidesToScroll: 4,
							responsive: [
								{
									breakpoint: 1400,
									settings: {
										slidesToShow: 3,
										slidesToScroll: 3,
									}
								},
								{
									breakpoint: 1200,
									settings: {
										slidesToShow: 2,
										slidesToScroll: 2,
									}
								},
								{
									breakpoint: 768,
									settings: {
										slidesToShow: 1,
										slidesToScroll: 1,
									}
								}
							]
						} );
					} );
				} )();
			</script>
		<?php
		$result = ob_get_contents();
		ob_end_clean();
		if ( ( bool ) $args[ 'section' ] ) {
			$result = '<section class="section teachers">' . $result . '</section>';
		}
	}
	return $result;
}

add_shortcode( 'teachers', 'act_theme\shortcode_teachers' );


/**
 * Ссылки на социальные сети
 * выводит список ссылок на социальные сети
 **/
function shortcode_socials_list() {
	$result = __return_empty_array();
	$items = get_theme_mod( ACT_THEME_SLUG . '_socials', __return_empty_array() );
	if ( is_array( $items ) && ! empty( $items ) ) {
		foreach ( array(
			'facebook'  => __( 'Мы на Facebook', ACT_THEME_TEXTDOMAIN ),
			'linkedin'  => __( 'Мы в LinkedIn', ACT_THEME_TEXTDOMAIN ),
			'instagram' => __( 'Мы в Instagram', ACT_THEME_TEXTDOMAIN ),
			'youtube'   => __( 'Мы на YouTube', ACT_THEME_TEXTDOMAIN ),
		) as $key => $label ) {
			if ( isset( $items[ $key ] ) && ! empty( $items[ $key ] ) ) {
				if ( function_exists( 'pll__' ) ) {
					$items[ $key ] = pll__( $items[ $key ] );
				}
				$result[] = sprintf(
					'<li><a class="%1$s" href="%2$s"><span class="label">%3$s</span></a></li>',
					$key,
					esc_attr( $items[ $key ] ),
					$label
				);
			}
		}
	}
	return ( empty( $result ) ) ? __return_empty_string() : '<ul class="socials">' . implode( "\r\n", $result ) . '</ul>';
}

add_shortcode( 'socials_list', 'act_theme\shortcode_socials_list' );


/**
 * Список показателей работы
 * используется на главной странице
 **/
function shortcode_indicators( $args ) {
	$args = wp_parse_args( $args, array(
		'section' => true,
	) );
	$result = __return_empty_string();
	$items = get_theme_mod( ACT_THEME_SLUG . '_indicators', __return_empty_array() );
	if ( is_array( $items ) ) {
		ob_start();
		for ( $i = 0; $i < 4; $i++ ) { 
			if ( isset( $items[ $i ] ) && is_array( $items[ $i ] ) ) {
				$items[ $i ] = array_merge( array(
					'logo'    => ACT_THEME_URL . 'images/business.png',
					'label'   => '',
					'value'   => '',
				), $items[ $i ] );
				if ( ! empty( $items[ $i ][ 'label' ] ) || ! empty( $items[ $i ][ 'value' ] ) ) {
					if ( function_exists( 'pll__' ) ) {
						$items[ $i ][ 'label' ] = pll__( $items[ $i ][ 'label' ] );
					}
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/indicator.php' );
				}
			}
		}
		$result = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $result ) ) {
		$result = '<div class="row center-xs">' . $result . '</div>';
		if ( ( bool ) $args[ 'section' ] ) {
			$result = '<section class="section indicators">' . $result . '</section>';
		}
	}
	return $result;
}

add_shortcode( 'indicators', 'act_theme\shortcode_indicators' );


/**
 * Шаги к поступлению
 * используется на главной странице
 **/
function shortcode_steps( $args ) {
	$args = wp_parse_args( $args, array(
		'section' => true,
	) );
	$result = __return_empty_string();
	$items = get_theme_mod( ACT_THEME_SLUG . '_steps', __return_empty_array() );
	if ( is_array( $items ) ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( ACT_THEME_SLUG . '_steps_number', 3 ); $i++ ) { 
			if ( isset( $items[ $i ] ) && is_array( $items[ $i ] ) ) {
				$items[ $i ] = array_merge( array(
					'thumbnail' => ACT_THEME_URL . 'images/thumbnail.png',
					'title'     => '',
					'excerpt'   => '',
					'link'      => '',
					'label'     => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
				), $items[ $i ] );
				if ( function_exists( 'pll__' ) ) {
					$items[ $i ][ 'title' ] = pll__( $items[ $i ][ 'title' ] );
					$items[ $i ][ 'excerpt' ] = pll__( $items[ $i ][ 'excerpt' ] );
					$items[ $i ][ 'link' ] = pll__( $items[ $i ][ 'link' ] );
				}
				if ( ! empty( $items[ $i ][ 'title' ] ) && ! empty( $items[ $i ][ 'excerpt' ] ) ) {
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/step.php' );
				}
			}
		}
		$result = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $result ) ) {
		$result = '<div class="list">' . $result . '</div>';
		if ( ( bool ) $args[ 'section' ] ) {
			$result = '<section class="section steps">' . $result . '</section>';
		}
	}
	return $result;
}

add_shortcode( 'steps', 'act_theme\shortcode_steps' );


/**
 * Образовательные курсы
 * используется на главной странице
 **/
function shortcode_cources( $args ) {
	$args = wp_parse_args( $args, array(
		'section' => true,
	) );
	$result = __return_empty_string();
	$items = get_theme_mod( ACT_THEME_SLUG . '_cources', __return_empty_array() );
	if ( is_array( $items ) ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( ACT_THEME_SLUG . '_cources_number', 3 ); $i++ ) { 
			if ( isset( $items[ $i ] ) && is_array( $items[ $i ] ) ) {
				$items[ $i ] = array_merge( array(
					'thumbnail' => ACT_THEME_URL . 'images/thumbnail.png',
					'title'     => '',
					'excerpt'   => '',
					'link'      => '',
				), $items[ $i ] );
				if ( function_exists( 'pll__' ) ) {
					$items[ $i ][ 'title' ] = pll__( $items[ $i ][ 'title' ] );
					$items[ $i ][ 'excerpt' ] = pll__( $items[ $i ][ 'excerpt' ] );
					$items[ $i ][ 'link' ] = pll__( $items[ $i ][ 'link' ] );
				}
				if ( ! empty( $items[ $i ][ 'title' ] ) && ! empty( $items[ $i ][ 'link' ] ) ) {
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/cource.php' );
				}
			}
		}
		$result = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $result ) ) {
		$result = '<div class="row center-xs stratch-xs" role="list">' . $result . '</div>';
		if ( ( bool ) $args[ 'section' ] ) {
			$result = '<section class="section cources">' . $result . '</section>';
		}
	}
	return $result;
}

add_shortcode( 'cources', 'act_theme\shortcode_cources' );



/**
 * Контактная форма
 * используется на главной странице
 **/
function shortcode_contacts_form() {
	$author = ( isset( $_REQUEST[ 'author' ] ) ) ? sanitize_text_field( trim( $_REQUEST[ 'author' ] ) ) : __return_empty_string();
	$email = ( isset( $_REQUEST[ 'email' ] ) ) ? sanitize_email( trim( $_REQUEST[ 'email' ] ) ) : __return_empty_string();
	$message = ( isset( $_REQUEST[ 'message' ] ) ) ? sanitize_textarea_field( trim( $_REQUEST[ 'message' ] ) ) : __return_empty_string();
	$answer = __return_empty_string();
	if ( isset( $_REQUEST[ 'action' ] ) && 'contacts_form' == $_REQUEST[ 'action' ] ) {
		if ( isset( $_REQUEST[ 'login' ] ) && empty( $_REQUEST[ 'login' ] ) ) {
			$user_ip = get_the_user_ip();
			if ( ! wp_blacklist_check( $author, $email, '', $message, $user_ip, '' ) ) {
				$headers = sprintf(
					'From: %1$s <%2$s>%3$sContent-type: text/html%3$scharset=utf-8%3$s',
					$email,
					( is_email( $email ) ) ? $email : __( 'Аноним', ACT_THEME_TEXTDOMAIN ),
					"\r\n"
				);
				$subject = sprintf(
					'%1$s %2$s',
					__( 'Сообщение с сайта', ACT_THEME_TEXTDOMAIN ),
					get_bloginfo( 'name' )
				);
				ob_start();
				include get_theme_file_path( 'views/contact-message.php' );
				$letter = ob_get_contents();
				ob_end_clean();
				if ( wp_mail( get_bloginfo( 'admin_email', 'raw' ), $subject, $letter, $headers, array() ) ) {
					$author = __return_empty_string();
					$email = __return_empty_string();
					$message = __return_empty_string();
					$answer = __( 'Сообщение отправлено', ACT_THEME_TEXTDOMAIN );
				} else {
					$answer = __( 'Сообщение не отправлено, попробуйте позже', ACT_THEME_TEXTDOMAIN );
				}
			} else {
				$answer = __( 'Вы в "черном списке", сообщение отклонено. Обратитесь к администратору сайта.', ACT_THEME_TEXTDOMAIN );
			}
		} else {
			$answer = __( 'Сообщение похоже на спам и отклонено.', ACT_THEME_TEXTDOMAIN );
		}
	}
	ob_start();
	include get_theme_file_path( 'views/contact-form.php' );
	$result = ob_get_contents();
	ob_end_clean();
	return $result;
}

add_shortcode( 'contacts_form', 'act_theme\shortcode_contacts_form' );


function shortcode_advantages( $args ) {
	$args = wp_parse_args( $args, array(
		'section' => true,
	) );
	$result = __return_empty_string();
	$items = get_theme_mod( ACT_THEME_SLUG . '_advantages', __return_empty_array() );
	if ( is_array( $items ) ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( ACT_THEME_SLUG . '_advantages_number', 3 ); $i++ ) { 
			if ( isset( $items[ $i ] ) && is_array( $items[ $i ] ) ) {
				$items[ $i ] = array_merge( array(
					'icon'      => ACT_THEME_URL . 'images/thumbnail.png',
					'title'     => '',
					'excerpt'   => '',
				), $items[ $i ] );
				if ( function_exists( 'pll__' ) ) {
					$items[ $i ][ 'title' ] = pll__( $items[ $i ][ 'title' ] );
					$items[ $i ][ 'excerpt' ] = pll__( $items[ $i ][ 'excerpt' ] );
				}
				if ( ! empty( $items[ $i ][ 'title' ] ) ) {
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/advantage.php' );
				}
			}
		}
		$result = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $result ) ) {
		$result = '<div class="row center-xs" role="list">' . $result . '</div>';
		if ( ( bool ) $args[ 'section' ] ) {
			$result = '<section class="section advantages">' . $result . '</section>';
		}
	}
	return $result;
}




/**
 * Преподаватели
 * Используется на главной странице
 **/
function shortcode_graduates( $args ) {
	$args = wp_parse_args( $args, array(
		'section' => true,
	) );
	$slides = __return_empty_string();
	$result = __return_empty_string();
	$items = get_theme_mod( ACT_THEME_SLUG . '_graduates', __return_empty_array() );
	if ( is_array( $items ) ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( ACT_THEME_SLUG . '_graduates_number', 3 ); $i++ ) {
			if ( isset( $items[ $i ] ) && is_array( $items[ $i ] ) ) {
				$items[ $i ] = array_merge( array(
					'foto'      => ACT_THEME_URL . 'images/user.png',
					'name'      => '',
					'specialty' => '',
					'excerpt'   => '',
				), $items[ $i ] );
				if ( ! empty( $items[ $i ][ 'name' ] ) && ! empty( $items[ $i ][ 'foto' ] ) ) {
					if ( function_exists( 'pll__' ) ) {
						$items[ $i ][ 'name' ] = pll__( $items[ $i ][ 'name' ] );
						$items[ $i ][ 'specialty' ] = pll__( $items[ $i ][ 'specialty' ] );
						$items[ $i ][ 'excerpt' ] = pll__( $items[ $i ][ 'excerpt' ] );
					}
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/graduate.php' );
				}
			}
		}
		$slides = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $slides ) ) {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'slick' );
		wp_enqueue_style( 'slick' );
		ob_start();
		?>
			<div class="slider" id="graduates-list">
				<?php echo $slides; ?>
			</div>
			<div class="slider-controls" id="graduates-controls"></div>
			<script>
				( function () {
					jQuery().ready( function () {
						jQuery( '#graduates-list' ).slick( {
							dots: true,
							arrows: false,
							fade: true,
							dotsClass: 'slider-dots',
							appendDots: '#graduates-controls',
							autoplay: true,
							autoplaySpeed: 5000,
							speed: 1000,
							lazyLoad: 'ondemand',
							slidesToShow: 1,
							slidesToScroll: 1,
						} );
					} );
				} )();
			</script>
		<?php
		$result = ob_get_contents();
		ob_end_clean();
		if ( ( bool ) $args[ 'section' ] ) {
			$result = '<section class="section graduates">' . $result . '</section>';
		}
	}
	return $result;
}

add_shortcode( 'teachers', 'act_theme\shortcode_graduates' );