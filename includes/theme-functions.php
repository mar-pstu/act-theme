<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



function get_languages_list( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'container_class' => 'languages',
	) );
	$result = __return_empty_array();
	if ( ( function_exists( 'pll_the_languages' ) ) && ( function_exists( 'pll_current_language' ) ) ) {
		$current = pll_current_language( 'slug' );
		$other = pll_the_languages( array(
			'dropdown'           => 0,
			'show_names'         => '',
			'display_names_as'   => 'slug',
			'show_flags'         => 0,
			'hide_if_empty'      => 0,
			'force_home'         => 0,
			'echo'               => 0,
			'hide_if_no_translation' => 0,
			'hide_current'       => 0,
			'post_id'            => ( is_singular() ) ? get_the_ID() : NULL,
			'raw'                => 1,
		) );
		if ( ( $other ) && ( ! empty( $other ) ) ) {
			foreach ( $other as $lang ) $result[] = sprintf(
				( $lang[ 'slug' ] == $current ) ? '<li class="current">%2$s</li>' : '<li><a href="%1$s">%2$s</a></li>',
				$lang[ 'url' ],
				$lang[ 'name' ]
			);
		}
	}
	return ( empty( $result ) ) ? __return_empty_string() :  sprintf( '<ul class="%1$s">%2$s</ul>', $args[ 'container_class' ], implode( "\r\n", $result ) );
}



/**
 * Проверяет данные поля чекбокс
 * @return   bool
 * */
function sanitize_checkbox( $checked = false ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}



function the_breadcrumb() {
	ob_start();
	if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb();
	} else {
			if ( ! is_front_page() ) {
				echo '<a href="';
				echo home_url();
				echo '">'.__( 'Главная', ACT_THEME_TEXTDOMAIN);
				echo "</a> » ";
				if ( is_category() || is_single() ) {
						the_category(' ');
						if ( is_single() ) {
								echo " » ";
								the_title();
						}
				} elseif ( is_page() ) {
						echo the_title();
				}
			}
			else {
				echo __( 'Домашняя страница', ACT_THEME_TEXTDOMAIN);
			}
	}
	$result = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $result ) ) {
		echo '<div id="breadcrumbs" class="breadcrumbs">';
		echo $result;
		echo '</div>';
	}
}





function get_translate_id( $id, $type = 'post' ) {
	$result = 0;
	$translate = 0;
	if ( $id && ! empty( $id ) ) {
		if ( defined( 'POLYLANG_FILE' ) ) {
			switch ( $type ) {
				case 'category':
					$translate = ( function_exists( 'pll_get_term' ) ) ? pll_get_term( $id, pll_current_language( 'slug' ) ) : $translate;
					break;
				case 'post':
				case 'page':
				default:
					$translate = ( function_exists( 'pll_get_post' ) ) ? pll_get_post( $id, pll_current_language( 'slug' ) ) : $translate;
					break;
			} // switch
			$result = ( $translate ) ? $translate : '';
		} else {
			$result = $id;
		}
	}
	return $result;
}







function the_pager() {
	ob_start();
	foreach ( array(
		'previous'  => array(
			'entry'     => get_previous_post(),
			'label'     => __( 'Смотреть предыдущий пост', ACT_THEME_TEXTDOMAIN),
		),
		'next'      => array(
			'entry'     => get_next_post(),
			'label'     => __( 'Смотреть следующий пост', ACT_THEME_TEXTDOMAIN),
		),
	) as $key => $value ) {
		if ( $value[ 'entry' ] && ! is_wp_error( $value[ 'entry' ] ) ) {
			$title = apply_filters( 'the_title', $value[ 'entry' ]->post_title, $value[ 'entry' ]->ID );
			$label = $value[ 'label' ];
			$permalink = get_permalink( $value[ 'entry' ]->ID );
			include get_theme_file_path( 'views/items/adjacent-post.php' );
		}
	}
	$content = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $content ) ) {
			echo '<nav class="pager clearfix">' . $content . '</nav>';
	}
}


/**
 * Конвертер ассоциативного массива в css правила
 **/
function css_array_to_css( $rules, $args = array() ) {
	$args = array_merge( array(
		'indent'     => 0,
		'container'  => false,
	), $args );
	$css = __return_empty_string();
	$prefix = str_repeat( '  ', $args[ 'indent' ] );
	foreach ($rules as $key => $value ) {
		if ( is_array( $value ) ) {
			$selector = $key;
			$properties = $value;
			$css .= $prefix . "$selector {\n";
			$css .= $prefix . css_array_to_css( $properties, array(
				'indent'     => $args[ 'indent' ] + 1,
				'container'  => false,
			) );
			$css .= $prefix . "}\n";
		} else {
			$property = $key;
			$css .= $prefix . "$property: $value;\n";
		}
	}
	return ( $args[ 'container' ] ) ? "\n<style>\n" . $css . "\n</style>\n" : $css;
}


/**
 * Получает IP юзверя
 **/
function get_the_user_ip() {
	if ( ! empty( $_SERVER[ 'HTTP_CLIENT_IP' ] ) ) {
		$ip = $_SERVER[ 'HTTP_CLIENT_IP' ];
	} elseif ( ! empty( $_SERVER[ 'HTTP_X_FORWARDED_FOR' ] ) ) {
		$ip = $_SERVER[ 'HTTP_X_FORWARDED_FOR' ];
	} else {
		$ip = $_SERVER[ 'REMOTE_ADDR' ];
	}
	return apply_filters( 'edd_get_ip', $ip );
}


/**
 * Функция формирует "стандартный" список темы
 * 
 * @param string $name имя секции и имя настройки в БД
 * @param string $template_name имя файла шаблона отдельного пункта
 * @param int $number количество пунктов для вывода по умолчанию
 * @param array $fields массив полей
 * @param array $args параметры шорткода
 * @return string возвращает html-код
 **/
function render_default_list_of_items( $name, $template_name, $number, $fields, $args = array(), $before = '<div class="row center-xs stratch-xs" role="list">', $after = '</div>' ) {
	$args = wp_parse_args( $args, array(
		'section' => true,
	) );
	$result = '';
	$items = get_theme_mod( $name, [] );
	if ( is_array( $items ) ) {
		ob_start();
		for ( $i = 0; $i < get_theme_mod( $name . '_number', $number ); $i++ ) {
			if ( isset( $items[ $i ] ) && is_array( $items[ $i ] ) ) {
				$validate_flag = __return_true();
				foreach ( $fields as $field ) {
					if ( ! isset( $items[ $i ][ $field[ 'name' ] ] ) ) {
						$items[ $i ][ $field[ 'name' ] ] = $field[ 'default' ];
					}
					if ( empty( $items[ $i ][ $field[ 'name' ] ] ) ) {
						if ( $field[ 'required' ] ) {
							$validate_flag = __return_false();
							break;
						} else {
							$items[ $i ][ $field[ 'name' ] ] = $field[ 'default' ];
						}
					}
				}
				if ( $validate_flag ) {
					if ( function_exists( 'pll__' ) ) {
						foreach ( wp_list_filter( $fields, array( 'translate' => true ), 'AND' ) as $field ) {
							$items[ $i ][ $field[ 'name' ] ] = pll__( $items[ $i ][ $field[ 'name' ] ] );
						}
					}
					extract( $items[ $i ] );
					include get_theme_file_path( 'views/items/' . $template_name . '.php' );
				}
			}
		}
		$result = ob_get_contents();
		ob_end_clean();
	}
	if ( ! empty( $result ) ) {
		$result = $before . $result . $after;
		if ( ( bool ) $args[ 'section' ] ) {
			$result = '<section class="section ' . $name . '" id="' . $name . '">' . $result . '</section>';
		}
	}
	return $result;
}


/**
 * Проверяет является ли переданная строка валидным URL
 * @param  string  $url исходная строка
 * @return boolean      результат проверки
 */
function is_url( $url = '' ) {
	$result = false;
	if ( is_string( $url ) ) {
		$path = parse_url( $url, PHP_URL_PATH );
		$encoded_path = array_map( 'urlencode', explode( '/', $path ) );
		$url = str_replace( $path, implode( '/', $encoded_path ), $url );
		$result = filter_var( $url, FILTER_VALIDATE_URL) ? true : false;
	}
	return $result;
}


/**
 *  Определяет есть ли дочернее меню у переданного пункта
 */
function is_nav_has_sub_menu( $item_id, $items ) {
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent == $item_id ) {
			return true;
		}
	}
	return false;
}


/**
 * Удаление размера изображения из url вложения
 * @param    string   $url   url изображения, который нужно очистить
 * @return   string          очищенный url
 * */
function removing_image_size_from_url( $url = '' ) {
	return preg_replace( '~-[0-9]+x[0-9]+(?=\..{2,6})~', '', $url );
}


/**
 * Функция для очистки массива параметров
 * @param  array $default           расзерённые парметры и стандартные значения
 * @param  array $args              неочищенные параметры
 * @param  array $sanitize_callback одномерный массив с именами функция, с помощью поторых нужно очистить параметры
 * @param  array $required          обязательные параметры
 * @param  array $not_empty         параметры которые не могут быть пустыми
 * @return array                    возвращает ощиченный массив разрешённых параметров
 * */
function parse_only_allowed_args( $default, $args, $sanitize_callback = [], $required = [], $not_empty = [] ) {
	$args = ( array ) $args;
	$result = [];
	$count = 0;
	while ( ( $value = current( $default ) ) !== false ) {
		$key = key( $default );
		if ( array_key_exists( $key, $args ) ) {
			$result[ $key ] = $args[ $key ];
			if ( isset( $sanitize_callback[ $count ] ) && ! empty( $sanitize_callback[ $count ] ) ) {
				$result[ $key ] = $sanitize_callback[ $count ]( $result[ $key ] );
			}
		} elseif ( in_array( $key, $required ) ) {
			return null;
		} else {
			$result[ $key ] = $value;
		}
		if ( empty( $result[ $key ] ) && in_array( $key, $not_empty ) ) {
			return null;
		}
		$count = $count + 1;
		next( $default );
	}
	return $result;
}


/**
 * Очищает массив с данные вложения
 * @param  array      исходные данные вложения (id, url)
 * @return array      очищенный результат
 */
function sanitize_attachment_data( $data = [] ) {
	return ( is_array( $data ) ) ? parse_only_allowed_args( [ 'id' => '', 'url' => '' ], $data, [ 'absint', 'esc_url_raw' ], [ 'id', 'url' ] ) : [];
}


/**
 * Возвращает и очищает текстовую настройку для использования в превью Customizer API
 * */
function customizer_get_text_theme_mod( $setting_name ) {
	$result = nl2br( trim( esc_html( get_theme_mod( $setting_name ) ) ) );
	return ( empty( $result ) ) ? false : $result;
}

/**
 * Возвращает и очищает html настройку для использования в превью Customizer API
 * */
function customizer_get_editor_theme_mod( $setting_name ) {
	$result = nl2br( trim( force_balance_tags( wp_kses_post( get_theme_mod( $setting_name ) ) ) ) );
	return ( empty( $result ) ) ? false : $result;
}