<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="jumbotron" id="jumbotron">

	<div class="bg"><?php if ( isset( $bgi_id ) && absint( $bgi_id ) && $bgi_id ) : echo wp_get_attachment_image( $bgi_id, wp_is_mobile() ? 'large' : 'full', false, '' ); endif; ?></div>

	<?php if ( ! empty( $title ) ) : ?>
		<h1 id="jumbotron-title" class="title">
			<?php echo $title; ?>
		</h1>
	<?php endif; ?>

	<?php if ( ! empty( $description ) ) : ?>
		<p id="jumbotron-description" class="description">
			<?php echo $description; ?>
		</p>
	<?php endif; ?>

	<?php if ( ! empty( $permalink ) ) : ?>
		<a  id="jumbotron-permalink" class="permalink" href="<?php echo esc_attr( $permalink ); ?>">
			<?php echo $label; ?>
		</a>
	<?php endif; ?>

	<?php echo shortcode_features(); ?>

</section>