<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



?>

<section class="about" id="about">
	<div class="container">
		<div class="row middle-md center-xs">
			<div class="col-xs-12 col-sm col-md col-lg">
				<div class="overlay">
					<h2 class="title"><?php echo $title; ?></h2>
					<div class="content">
						<?php echo $content; ?>
					</div>
					<a class="permalink" href="#"><?php echo $label; ?></a>
				</div>
			</div>
			<?php if ( ! empty( $thumbnail_src ) ) : ?>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6 first-xs">
					<img class="thumbnail lazy" src="#" data-src="<?php echo esc_Attr( $thumbnail_src ); ?>" alt="<?php echo esc_attr( $thumbnail_alt ); ?>">
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>