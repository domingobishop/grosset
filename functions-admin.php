<?php

add_action('admin_menu', 'woo_reports_menu');

add_action('admin_menu', 'woo_reports_menu');
function woo_reports_menu() {
    add_menu_page( 'Woo report settings', 'Woo reports', 'administrator', 'woo-reports-admin-page', 'woo_reports_admin_page', 'dashicons-cloud', 21  );
}
function woo_reports_admin_page() {
    if (!current_user_can('administrator'))  {
        wp_die( __('You do not have sufficient pilchards to access this page.')    );
    }
    ?>
    <div class="wrap">
        <h1>Woo reports</h1>
        <form method="post" action="admin.php?page=woo-reports-admin-page" novalidate="novalidate">
            <?php
            wp_nonce_field('woo_reports_admin');
            if (isset($_POST['submit-woo-reports']) && check_admin_referer('woo_reports_admin')) {
                get_woo_orders();
            }
            ?>
            <p class="submit">
                <input type="submit" name="submit-woo-reports" id="submit" class="button button-primary" value="Submit">
            </p>
        </form>
    </div>
    <?php
}

function get_woo_orders() {

    /*$customer_orders = get_posts( array(
        'numberposts'    => -1,
        'post_type' => 'shop_order',
        'post_status'    => array_keys( wc_get_order_statuses() )
    ) );

    // Going through each current customer orders
    foreach ( $customer_orders as $customer_order ) {

        // Getting Order ID, title and status
        $order_id = $customer_order->ID;
        $order_title = $customer_order->post_title;
        $order_status = $customer_order->post_status;

        // Displaying Order ID, title and status
        echo '<p>Order ID : ' . $order_id . '<br>';
        echo 'Order title: ' . $order_title . '<br>';
        echo 'Order status: ' . $order_status . '<br>';

        // Getting an instance of the order object
        $order = wc_get_order( $order_id );

        // Going through each current customer order items
        foreach($order->get_items() as $item_id => $item_values){
            // Getting the product ID
            $product_id = $item_values['product_id'];
            // displaying the product ID
            echo '<p>Product ID: '.$product_id.'</p>';
        }
    }*/

    echo '-------<br>';
    $args = array(
        'type' => 'shop_order',
        'status' => 'completed',
        'orderby' => 'modified',
        'order' => 'DESC',
        'return' => 'ids',
    );
    $orders = wc_get_orders( $args );

    foreach($orders as $order_id){
        $order = wc_get_order( $order_id );

        $order_data = $order->get_data();

        echo '<p>';

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_total = $order_data['total'];
        $order_payment_method = $order_data['payment_method'];

        echo $order_billing_first_name.'<br>';
        echo $order_billing_last_name.'<br>';
        echo $order_total.'<br>';
        echo $order_payment_method.'<br>';


        echo '</p>';
    }
}

