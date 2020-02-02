<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<div class="col-xs-12 col-sm-4">
	<a class="specialties__entry entry" href="<?php echo $permalink; ?>" role="listitem">
		<img class="wp-post-thumbnail lazy" src="#" data-src="<?php echo esc_attr( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>">
		<div class="title"><?php echo $title; ?></div>
	</a>
</div>