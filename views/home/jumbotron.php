<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="jumbotron" id="jumbotron">
	<?php if ( ! empty( $title ) ) : ?>
		<h1 class="title">
			<?php echo $title; ?>
		</h1>
	<?php endif; ?>
	<?php if ( ! empty( $description ) ) : ?>
		<p class="description">
			<?php echo $title; ?>
		</p>
	<?php endif; ?>
	<?php if ( ! empty( $permalink ) ) : ?>
		<a class="permalink" href="<?php echo esc_attr( $permalink ); ?>">
			<?php echo $label; ?>
		</a>
	<?php endif; ?>
	<?php echo do_shortcode( '[features]', false ); ?>
</section>