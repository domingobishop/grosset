<?php

include 'functions-admin.php';
include 'function-options.php';

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

// Display 24 products per page. Goes in functions.php
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

add_filter( 'woocommerce_get_order_item_totals', 'reordering_order_item_totals', 10, 3 );
function reordering_order_item_totals( $total_rows, $order, $tax_display ){
    
    if ( $total_rows['discount'] ) {
        $total_rows['discount']['label'] = '&nbsp;';
    }

    return $total_rows;
}

// export order additional function
// Summary by Products , see conditions below! 
// Format - CSV
// Button - Export w/o Progressbar 
class Woe_Summary_Products {
	function __construct() {
		$this->summary_products = array();
		$this->products_data = array();
		
		add_action("woe_settings_above_buttons", array($this,"draw_summary_products") );
		add_action("woe_order_export_started", array($this,'record_order_products') );
		add_filter("woe_csv_custom_output_func", array($this,'skip_order_line')  );
		add_action("woe_csv_print_footer", array($this,'print_summary_products') );
	}

	function draw_summary_products($settings){
		$selected = !empty($settings[ 'summary_by_products' ]) ? 'checked': '';
		$selected_2 = !empty($settings[ 'skip_orders' ]) ? 'checked': '';
		echo '<br><br>
		<input type=hidden name="settings[summary_by_products]" value="0">
		<input type=checkbox name="settings[summary_by_products]" value="1" '. $selected .'>
		<span class="wc-oe-header">Summary Report by products for CSV (Export w/o progressbar)</span>
		<input type=hidden name="settings[skip_orders]" value="0">
		<input type=checkbox name="settings[skip_orders]" value="1" '. $selected_2 .'>
		Don\'t output orders 
		<br><br>';
	}

	function record_order_products($order_id) {
		if( empty(WC_Order_Export_Engine::$current_job_settings['summary_by_products']) )
			return $order_id;
		
		$order  = new WC_Order($order_id);
		foreach($order->get_items( ) as $item) {
			$name = $item['name'];
			if(!isset($this->summary_products[$name]))
				$this->summary_products[$name] = 0;
			$this->summary_products[$name] += $item['qty'];
			
			//gather common product details 
			if( !isset($this->products_data[$name])) {
				$product   = $order->get_product_from_item( $item );
				$this->products_data[$name]['sku'] = $product ? $product->get_sku() : '';
			}	
		}
                return $order_id;
	}
	
	function skip_order_line($custom_export) {
		if( !empty(WC_Order_Export_Engine::$current_job_settings['skip_orders']) )
			return true;
		return $custom_export;	
	}
	
	function print_summary_products($f) {
		if( empty(WC_Order_Export_Engine::$current_job_settings['summary_by_products']) )
			return ;
		
		//empty line to split orders and summary
		if( empty(WC_Order_Export_Engine::$current_job_settings['skip_orders']) ) {
			fputcsv( $f,  array());
		}	
			
		ksort($this->summary_products);// by name 
		
		$data = array("SKU","Product", "Quantity");
		fputcsv( $f, $data);
			
		foreach($this->summary_products as $name=>$qty) {
			$sku = $this->products_data[$name]['sku'];
			$data = array($sku,$name,$qty);
			fputcsv( $f, $data);
		}
	}
}
new Woe_Summary_Products ();

?>