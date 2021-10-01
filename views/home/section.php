<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<section class="section <?php echo $section_name; ?>" id="<?php echo $section_name; ?>">
	<div class="container">
		<?php if ( ! empty( $title ) ) : ?><h2 id="<?php echo $section_name; ?>-title"><?php echo $title; ?></h2><?php endif; ?>
		<?php if ( ! empty( $subtitle ) ) : ?><p id="<?php echo $section_name; ?>-subtitle"><?php echo $subtitle; ?></p><?php endif; ?>
		<div id="<?php echo $section_name; ?>-content" class="content">
			<?php echo $content; ?>
		</div>
		<?php if ( ! empty( $permalink ) && ! empty( $label ) ) : ?>
			<p class="text-center">
				<br>
				<br>
				<a id="<?php echo $section_name; ?>-permalink" class="btn btn-lg btn-primary" href="<?php echo esc_attr( $permalink ); ?>">
					<?php echo $label ?>
				</a>
			</p>
		<?php endif; ?>
	</div>
</section>