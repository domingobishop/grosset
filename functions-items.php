function dw_product_totals() {

global $wpdb;

$post = get_post( $post_id );

$current_product = get_the_ID($post);

$order_items = apply_filters( 'woocommerce_reports_top_earners_order_items', $wpdb->get_results( "

SELECT order_item_meta_2.meta_value as product_id, SUM( order_item_meta.meta_value ) as line_total FROM {$wpdb->prefix}woocommerce_order_items as order_items

LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta ON order_items.order_item_id = order_item_meta.order_item_id

LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta_2 ON order_items.order_item_id = order_item_meta_2.order_item_id

LEFT JOIN {$wpdb->posts} AS posts ON order_items.order_id = posts.ID

WHERE posts.post_type = 'shop_order'

AND posts.post_status IN ( '" . implode( "','", array( 'wc-completed' ) ) . "' )

AND order_items.order_item_type = 'line_item'

AND order_item_meta.meta_key = '_line_total'

AND order_item_meta_2.meta_key = '_product_id'

GROUP BY order_item_meta_2.meta_value

" ));

$current = array($current_product);

foreach($order_items as $item) {

if(in_array($item->product_id, $current)) {

$totalItems = $item->line_total;

}

}

$totalItems = number_format($totalItems, 2, '.', '');

echo 'total items = '. $totalItems;

}