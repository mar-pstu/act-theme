<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<form id="contacts_form" action="#contacts_form">

	<?php if ( ! empty( $answer ) ) : ?>
		<p><?php echo $answer; ?></p>
	<?php endif; ?>

	<input type="hidden" name="action" value="contacts_form">

	<input type="text" value="<?php echo esc_attr( $author ); ?>" name="author" placeholder="<?php esc_attr_e( 'Ваше имя', ACT_THEME_TEXTDOMAIN ); ?>" required="required">

	<input type="hidden" name="login" value="" placeholder="<?php esc_attr_e( 'Логин', ACT_THEME_TEXTDOMAIN ); ?>">

	<input type="email" value="<?php echo esc_attr( $email ); ?>" name="email" placeholder="<?php esc_attr_e( 'Ваш email', ACT_THEME_TEXTDOMAIN ); ?>" required="required">

	<textarea name="message" placeholder="<?php esc_attr_e( 'Сообщение', ACT_THEME_TEXTDOMAIN ); ?>" required="required"><?php echo esc_attr( $message ); ?></textarea>

	<button type="submit"><?php _e( 'Отправить', ACT_THEME_TEXTDOMAIN ); ?></button>

</form>