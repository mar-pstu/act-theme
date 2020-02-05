<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<table cellspacing="0" style="border: 1px solid #bbbbbb; width: 100%;">

	<tbody>

		<tr>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px; width: 30%;"><?php _e( 'IP пользователя', ACT_THEME_TEXTDOMAIN ); ?></td>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px;"><?php echo $user_ip; ?></td>
		</tr>

		<tr>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px; width: 30%;"><?php _e( 'Имя пользователя', ACT_THEME_TEXTDOMAIN ); ?></td>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px;"><?php echo $author; ?></td>
		</tr>

		<tr>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px; width: 30%;"><?php _e( 'Email пользователя', ACT_THEME_TEXTDOMAIN ); ?></td>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px;"><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo $email; ?></a></td>
		</tr>

		<tr>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px; width: 30%;"><?php _e( 'Сообщение', ACT_THEME_TEXTDOMAIN ); ?></td>
			<td style="border: 1px solid #bbbbbb; padding: 2px 5px;"><?php echo $message; ?></td>
		</tr>

	</tbody>

</table>