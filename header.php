<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'parts/head' ); ?>
	<body <?php body_class(); ?> data-nav="inactive">
		<?php get_template_part( 'parts/mobilenav' ); ?>
		<div class="wrapper" id="wrapper">
			<header class="wrapper__item wrapper__item--header header" id="header">
				<div class="container">
					<a class="custom-logo-link" href="<?php echo home_url( '/' ); ?>">
						<?php
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							if ( $custom_logo_id ) {
								printf(
									'<img class="custom-logo" src="%1$s" alt="%2$s">',
									wp_get_attachment_image_src( $custom_logo_id, 'thumbnail', false ),
									get_bloginfo( 'name', 'display' )
								);
							} else {
								bloginfo( 'name' );
							}
						?>
					</a>
					<?php
						if ( has_nav_menu( 'main' ) )  wp_nav_menu( array(
							'theme_location'  => 'main',
							'menu'            => 'main',
							'container'       => 'nav',
							'container_class' => 'nav',
							'container_id'    => '',
							'menu_class'      => 'nav__list list',
							'menu_id'         => '',
							'echo'            => true,
							'depth'           => 1,
						) );
						echo get_languages_list();
					?>
					<button class="burger-button" role="button">
						<span class="label"><?php _e( 'Меню', ACT_THEME_TEXTDOMAIN ); ?></span>
						<svg class="icon" x="0px" y="0px" viewBox="0 0 459 459" style="enable-background:new 0 0 459 459;" xml:space="preserve">
							<path d="M0,382.5h459v-51H0V382.5z M0,255h459v-51H0V255z M0,76.5v51h459v-51H0z" data-original="#000000" data-old_color="#ffffff" fill="#ffffff"></path>
						</svg>
					</button>
				</div>
			</header>
			<main class="wrapper__item wrapper__item--main main" id="main">