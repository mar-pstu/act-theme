<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<?php get_template_part( 'parts/head' ); ?>

	<body <?php body_class(); ?>>

		<div class="wrap">

			<?php if ( ! empty( $title = get_theme_mod( 'error404_title', __( 'Ошибка 404', ACT_THEME_TEXTDOMAIN ) ) ) ) : ?>
				<h1><?php echo $title; ?></h1>
			<?php endif; ?>

			<?php if ( ! empty( $description = get_theme_mod( 'error404_description', __( 'Ошибка 404', ACT_THEME_TEXTDOMAIN ) ) ) ) : ?>
				<p><?php echo $description; ?></p>
			<?php endif; ?>

			<p><a class="btn btn-warning" href="<?php echo home_url( '/' ); ?>"><?php _e( 'На главную', ACT_THEME_TEXTDOMAIN ); ?></a></p>

		</div>

		<?php wp_footer(); ?>

	</body>
</html>