<?php 


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$logo_id = attachment_url_to_postid( removing_image_size_from_url( $logo ) );


?>


<li class="features__item item">
	<img class="logo lazy" src="#" data-src="<?php echo $logo_id ? wp_get_attachment_image_url( $logo_id, 'thumbnail', false ) : esc_attr( $logo ); ?>" alt="<?php echo esc_attr( $title ); ?>">
    <div class="title"><?php echo $title; ?></div>
</li>