<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<section class="section <?php echo $section_name; ?>" id="<?php echo $section_name; ?>">
	<div class="container">
		<?php if ( ! empty( $title ) ) : ?><h2><?php echo $title; ?></h2><?php endif; ?>
		<?php if ( ! empty( $subtitle ) ) : ?><p><?php echo $subtitle; ?></p><?php endif; ?>
		<?php $content; ?>
	</div>
</section>