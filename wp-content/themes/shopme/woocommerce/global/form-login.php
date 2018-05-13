<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}
?>

<form class="woocomerce-form woocommerce-form-login login" method="post" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>

	<div class="col-2">

		<?php do_action( 'woocommerce_login_form_start' ); ?>

		<?php if ( $message ) echo wpautop( wptexturize( $message ) ); ?>

		<p class="form-row-wide form-row-first">
			<label for="username"><?php esc_html_e( 'Username or email', 'shopme' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="username" id="username" />
		</p>
		<p class="form-row-wide form-row-last">
			<label for="password"><?php esc_html_e( 'Password', 'shopme' ); ?> <span class="required">*</span></label>
			<input class="input-text" type="password" name="password" id="password" />

			<span class="lost_password">
				<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'shopme' ); ?></a>
			</span>
		</p>

		<div class="clear"></div>

		<?php do_action( 'woocommerce_login_form' ); ?>

		<p class="form-row">
			<input name="rememberme" type="checkbox" id="rememberme" value="forever" />
			<label for="rememberme" class="inline"><?php esc_html_e( 'Remember me', 'shopme' ); ?></label>
		</p>

		<p class="form-row">
			<?php wp_nonce_field( 'woocommerce-login' ); ?>
			<input type="submit" class="button button_blue middle_btn" name="login" value="<?php esc_html_e( 'Login', 'shopme' ); ?>" />
			<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
		</p>

		<div class="clear"></div>

		<?php do_action( 'woocommerce_login_form_end' ); ?>

	</div><!--/ .col-2-->

</form>