<?php

class RatioEdgeWoocommerceDropdownCart extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'edgtf_woocommerce_dropdown_cart', // Base ID
			'Edge Woocommerce Dropdown Cart', // Name
			array( 'description' => esc_html__( 'Edge Woocommerce Dropdown Cart', 'ratio' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		?>
		<div class="edgtf-shopping-cart-outer">
			<div class="edgtf-shopping-cart-inner">
				<div class="edgtf-shopping-cart-header">
					<a class="edgtf-header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
						<i class="icon_bag_alt"></i>
						<span class="edgtf-cart-amount"><?php echo esc_html(WC()->cart->cart_contents_count); ?></span>
					</a>
					<div class="edgtf-shopping-cart-dropdown">
						<ul>
							<?php if ( ! WC()->cart->is_empty() ) : ?>
								<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
									$_product = $cart_item['data'];
									
									// Only display if allowed
									if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
										continue;
									}
									?>
									<li>
										<div class="edgtf-item-image-holder">
											<a href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
												<?php echo wp_kses( $_product->get_image(), array(
													'img' => array(
														'src'    => true,
														'width'  => true,
														'height' => true,
														'class'  => true,
														'alt'    => true,
														'title'  => true,
														'id'     => true
													)
												) ); ?>
											</a>
										</div>
										<div class="edgtf-item-info-holder">
											<div class="edgtf-item-left">
												<a href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
													<?php echo apply_filters( 'woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
												</a>
												<span class="edgtf-quantity"><?php echo esc_html( $cart_item['quantity'] ); ?></span>
												<span>x</span>
												<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
											</div>
										</div>
									</li>
								<?php endforeach; ?>
								</ul>
								<div class="edgtf-cart-bottom">
									<div class="edgtf-subtotal-holder clearfix">
										<span class="edgtf-total"><?php esc_html_e( 'Total', 'ratio' ); ?>:</span>
										<span class="edgtf-total-amount"><?php wc_cart_totals_subtotal_html(); ?></span>
									</div>
									<div class="edgtf-btns-holder clearfix">
										<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="edgtf-btn-small view-cart">
											<?php esc_html_e( 'View Cart', 'ratio' ); ?>
										</a>
										<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="edgtf-btn-small checkout">
											<?php esc_html_e( 'Checkout', 'ratio' ); ?>
										</a>
									</div>
								</div>
							<?php else : ?>
								<li class="edgtf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'ratio' ); ?></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

}

add_filter( 'woocommerce_add_to_cart_fragments', 'ratio_edge_woocommerce_header_add_to_cart_fragment' );
function ratio_edge_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<div class="edgtf-shopping-cart-header">
		<a class="edgtf-header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
			<i class="icon_bag_alt"></i>
			<span class="edgtf-cart-amount"><?php echo esc_html(WC()->cart->cart_contents_count); ?></span>
		</a>
		<div class="edgtf-shopping-cart-dropdown">
			<ul>
				<?php if ( ! WC()->cart->is_empty() ) : ?>
					<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
						$_product = $cart_item['data'];
						
						// Only display if allowed
						if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
							continue;
						}
						?>
						<li>
							<div class="edgtf-item-image-holder">
								<?php echo wp_kses( $_product->get_image(), array(
									'img' => array(
										'src'    => true,
										'width'  => true,
										'height' => true,
										'class'  => true,
										'alt'    => true,
										'title'  => true,
										'id'     => true
									)
								) ); ?>
							</div>
							<div class="edgtf-item-info-holder">
								<div class="edgtf-item-left">
									<a href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
										<?php echo apply_filters( 'woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
									</a>
									<span class="edgtf-quantity"><?php echo esc_html( $cart_item['quantity'] ); ?></span>
									<span>x</span>
									<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
					<div class="edgtf-cart-bottom">
						<div class="edgtf-subtotal-holder clearfix">
							<span class="edgtf-total"><?php esc_html_e( 'Total', 'ratio' ); ?>:</span>
							<span class="edgtf-total-amount"><?php wc_cart_totals_subtotal_html(); ?></span>
						</div>
						<div class="edgtf-btns-holder clearfix">
							<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="edgtf-btn-small view-cart">
								<?php esc_html_e( 'View Cart', 'ratio' ); ?>
							</a>
							<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="edgtf-btn-small checkout">
								<?php esc_html_e( 'Checkout', 'ratio' ); ?>
							</a>
						</div>
					</div>
				<?php else : ?>
					<li class="edgtf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'ratio' ); ?></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
	<?php
	$fragments['div.edgtf-shopping-cart-header'] = ob_get_clean();

	return $fragments;
}

?>