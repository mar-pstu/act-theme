<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



?>

			</main>
			<footer class="wrapper__item wrapper__item--footer footer">
				<div class="container">
					<div class="row middle-xs">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<p class="copyright">
								<a href="<?php echo home_url( '/' ); ?>"><?php echo date( 'Y' ); ?> &copy; <?php bloginfo( 'name' ); ?></a>
							</p>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<p class="developer">
								<a href="https://cct.pstu.edu"><?php _e( 'ЦКТ ПГТУ', ACT_THEME_TEXTDOMAIN ); ?></a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>