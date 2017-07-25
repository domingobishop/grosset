<?php

include 'functions-admin.php';

// Password Protected Page Message

function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "<h2>Welcome</h2>" ) . '
	<p>Welcome to Grosset Wines Club exclusive on-line ordering for members.<br />
	Orders of 6 bottles or more are <strong>freight free</strong>.<br />
	Deliveries to Australian addresses only.<br />
	Delivery within 7 days to most destinations; weather pending (in periods of prolonged heat we will delay shipping until a significant break in the weather).<br />
	Post box delivery available. 2 cartons of 6 will be packed as 1 carton of 12, unless otherwise specified.</p>
	<p><strong>For assistance please contact us on 1800 088 223 toll free or Int +61 (0)8 88492175.</strong></p>
	<p>This shop is password protected. To view it please enter your password below:</p>
    <label for="' . $label . '">' . __( "Password:&nbsp;" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" />&nbsp;<input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </form>
	<p><a href="http://www.grosset.com.au/contact/Grosset-Wine-Club-Member/">Not a member? Join here</a></p>
	<p><strong>You must be 18 years or older to enter the online shop. By clicking ‘Submit’ you are verifying this.</strong></p>
	<p><strong>Cellar Door opens on the first Saturday of the first weekend in September each year, and is open for Spring</strong> (tastings and sales – 10am to 5pm – Wednesday to Sunday during this period).<br />
	Outside of these times contact the winery on 1800 088 223 or (08) 8849 2175 with any enquiries.</p>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );

// Display 24 products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );

add_filter('woocommerce_get_catalog_ordering_args', 'am_woocommerce_catalog_orderby');
function am_woocommerce_catalog_orderby( $args ) {
    $args['orderby'] = 'meta_value';
    $args['order'] = 'asc';
    $args['meta_key'] = '_sku';
}

/**
 *Reduce the strength requirement on the woocommerce password.
 *
 * Strength Settings
 * 3 = Strong (default)
 * 2 = Medium
 * 1 = Weak
 * 0 = Very Weak / Anything
 */
function reduce_woocommerce_min_strength_requirement( $strength ) {
    return 1;
}
add_filter( 'woocommerce_min_password_strength', 'reduce_woocommerce_min_strength_requirement' );

add_action( 'woocommerce_pos_head', 'pos_new_css' );

function pos_new_css() {
    echo '<style id="pos-new-css">
			.list-row .img, .cart-totals .cart-discount, .receipt-totals .cart-discount {display:none;}
		  </style>';
}
