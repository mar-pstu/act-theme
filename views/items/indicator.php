<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<div class="col-xs-6 col-sm-3">

	<div class="indicators__item item" role="listitem">

		<?php if ( ! empty( $logo ) ) : ?>
			<img class="logo lazy" src="#" data-src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( $label ); ?>">
		<?php endif; ?>

		<?php if ( ! empty( $value ) ) : ?>
			<div class="value"><?php echo $value; ?></div>
		<?php endif; ?>

		<?php if ( ! empty( $label ) ) : ?>
			<div class="label"><?php echo $label; ?></div>
		<?php endif; ?>

	</div>

</div>