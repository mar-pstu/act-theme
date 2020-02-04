<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<div class="steps__item item" role="listitem">

	<?php if ( ! empty( $thumbnail ) ) : ?>
		<img class="thumbnail lazy" src="#" data-src="<?php echo esc_attr( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>">
	<?php endif; ?>

	<div class="wrap">
		
		<?php if ( ! empty( $title ) ) : ?>
			<h3 class="title"><?php echo $title; ?></h3>
		<?php endif; ?>
		
		<?php if ( ! empty( $excerpt ) ) : ?>
			<p class="excerpt"><?php echo $excerpt; ?></p>
		<?php endif; ?>
		
		<?php if ( ! empty( $link ) ) : ?>
			<a class="link" href="<?php echo esc_attr( $link ); ?>"><?php echo $label; ?></a>
		<?php endif; ?>

	</div>

</div>