<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Направления работы
 * Используется в секции "первого экрана" главной страницы
 **/
function shortcode_directions( $args = array() ) {
	return render_default_list_of_items( 'directions', 'direction', 4, array(
		array(
			'name'      => 'icon',                                 // имя поля
			'default'   => ACT_THEME_URL . 'images/business.png',  // значение поля по умолчанию
			'translate' => false,                                  // требуется ли перевод
			'required'  => false,                                  // обязательное поле или нет
		),
		array( 'name' => 'title', 'default' => '', 'translate' => true, 'required' => true ),
		array( 'name' => 'excerpt', 'default' => '', 'translate' => true, 'required'  => false ),
	), $args );
}

add_shortcode( 'directions', 'act_theme\shortcode_directions' );



/**
 * Специальности
 * Используется в секции "первого экрана" главной страницы
 **/
function shortcode_specialties( $args ) {
	return render_default_list_of_items( 'specialties', 'specialty', 3, array(
		array( 'name' => 'thumbnail', 'default' => ACT_THEME_URL . 'images/thumbnail.png', 'translate' => false, 'required' => false ),
		array( 'name' => 'title', 'default' => '', 'translate' => true, 'required' => true ),
		array( 'name' => 'link', 'default' => '', 'translate' => true, 'required' => true ),
	), $args );
}

add_shortcode( 'specialties', 'act_theme\shortcode_specialties' );



/**
 * Список показателей работы
 * используется на главной странице
 **/
function shortcode_indicators( $args ) {
	return render_default_list_of_items( 'indicators', 'indicator', 4, array(
		array( 'name' => 'logo', 'default' => ACT_THEME_URL . 'images/business.png', 'translate' => false, 'required' => false ),
		array( 'name' => 'label', 'default' => '', 'translate' => true, 'required' => true ),
		array( 'name' => 'value', 'default' => '', 'translate' => false, 'required' => true ),
	), $args );
}

add_shortcode( 'indicators', 'act_theme\shortcode_indicators' );


/**
 * Образовательные курсы
 * используется на главной странице
 **/
function shortcode_cources( $args ) {
	return render_default_list_of_items( 'cources', 'cource', 3, array(
		array( 'name' => 'thumbnail', 'default' => ACT_THEME_URL . 'images/thumbnail.png', 'translate' => false, 'required' => false ),
		array( 'name' => 'title', 'default' => '', 'translate' => true, 'required' => true ),
		array( 'name' => 'excerpt', 'default' => '', 'translate' => true, 'required' => false ),
		array( 'name' => 'link', 'default' => '', 'translate' => true, 'required' => true ),
	), $args );
}

add_shortcode( 'cources', 'act_theme\shortcode_cources' );



/**
 * Шаги к поступлению
 * используется на главной странице
 **/
function shortcode_steps( $args ) {
	return render_default_list_of_items( 'steps', 'step', 3, array(
		array( 'name' => 'thumbnail', 'default' => ACT_THEME_URL . 'images/thumbnail.png', 'translate' => false, 'required' => false ),
		array( 'name' => 'title', 'default' => '', 'translate' => true, 'required' => true ),
		array( 'name' => 'excerpt', 'default' => '', 'translate' => true, 'required' => true ),
		array( 'name' => 'link', 'default' => '', 'translate' => true, 'required'  => false ),
		array( 'name' => 'label', 'default' => __( 'Подробней', ACT_THEME_TEXTDOMAIN ), 'translate' => true, 'required' => false ),
	), $args, '<div>' );
}

add_shortcode( 'steps', 'act_theme\shortcode_steps' );


/**
 * Преимущества обучения на кафедре
 * используется на главной странице
 **/
function shortcode_advantages( $args = array() ) {
	return render_default_list_of_items( 'advantages', 'advantage', 3, array(
		array( 'name' => 'icon', 'default' => ACT_THEME_URL . 'images/thumbnail.png', 'translate' => false, 'required' => false ),
		array( 'name' => 'title', 'default' => '',	'translate' => true, 'required' => true ),
		array( 'name' => 'excerpt', 'default' => '', 'translate' => true, 'required' => false ),
	), $args );
}

add_shortcode( 'advantages', 'act_theme\shortcode_advantages' );



/**
 * Особенности кафедры
 * Используется в секции "первого экрана" главной страницы
 **/
function shortcode_features( $args = array() ) {
	return render_default_list_of_items( 'features', 'feature', 3, array(
		array( 'name' => 'logo', 'default' => ACT_THEME_URL . 'images/business.png', 'translate' => false, 'required' => false ),
		array( 'name' => 'title', 'default' => '',	'translate' => true, 'required' => true ),
	), $args, '<ul class="features">', '</ul>' );
}

add_shortcode( 'features', 'act_theme\shortcode_features' );


/**
 * Преподаватели
 * Используется на главной странице
 **/
function shortcode_teachers( $args ) {
	$args = wp_parse_args( $args, array(
		'section' => true,
	) );
	$slides = '';
	$result = '';
	$items = get_theme_mod( 'teachers', [] );
	// echo "<pre>"; var_dump( $items ); echo "</pre>";
	if ( is_array( $items ) ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( 'teachers_number', 4 ); $i++ ) {
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
	$result = [];
	$items = get_theme_mod( 'socials', __return_empty_array() );
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

add_shortcode( 'graduates', 'act_theme\shortcode_graduates' );