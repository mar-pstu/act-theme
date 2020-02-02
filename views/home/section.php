<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<section class="section <?php echo $section_name; ?>" id="<?php echo $section_name; ?>">
	<div class="container">
		<?php if ( ! empty( $title ) ) : ?><h2><?php echo $title; ?></h2><?php endif; ?>
		<?php if ( ! empty( $subtitle ) ) : ?><p><?php echo $subtitle; ?></p><?php endif; ?>
		<?php echo $content; ?>
		<?php if ( ! empty( $permalink ) ) : ?>
			<p class="text-center">
				<a class="btn btn-lg btn-primary"> href="<?php echo esc_attr( $permalink ); ?>">
					<?php echo $label ?>
				</a>
			</p>
		<?php endif; ?>
	</div>
</section>