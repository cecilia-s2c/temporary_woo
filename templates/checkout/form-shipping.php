<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
echo __FILE__ , PHP_EOL;
?>
<div class="woocommerce-shipping-fields">

	<div id="important-note-1">
		<p><?php _e('Important!', 'woocommerce')?></p>
		<p>
			<?php _e('Before completing your order review your address and make sure it is complete and correct. It should include a house number, street, neighborhood/district, city, state and zip code/ postal code.', 'woocommerce');?>
		</p>
	</div>

	<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>


		<h3 id="ship-to-different-address">
			<label for="ship-to-different-address-checkbox" class="checkbox"><?php _e( 'Ship to a different address?', 'woocommerce' ); ?></label>
			<input id="ship-to-different-address-checkbox" class="input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" />
		</h3>


		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

			<?php foreach ( $checkout->checkout_fields['shipping'] as $key => $field ) : ?>

				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

			<?php endforeach; ?>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

			<h3><?php _e( 'Additional Information', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<?php foreach ( $checkout->checkout_fields['order'] as $key => $field ) : ?>

			<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

		<?php endforeach; ?>

	<?php endif; ?>



	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
	<div id="important-note-2">
		<p><?php _e('Important!', 'woocommerce')?></p>
		<p><?php _e('safe2choose helps provide access to abortion pills by working with distribution centers that use different mailing service companies. Once a distribution center sends a package, safe2choose does not have control over the delivery process.', 'woocommerce'); ?></p>
		<p><?php _e('When the package has arrived at its destination, your local postal service is in charge of distributing it. This process will depend on local law and practices.', 'woocommerce'); ?></p>
	</div>
</div>
