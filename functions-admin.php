<?php

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
        <style type="text/css">
            table.woo-report {
                border-collapse: collapse;
            }
            .woo-report th, .woo-report td {
                border: 1px solid grey;
                text-align: left;
                padding: 7px;
            }
        </style>
        <h1>Woo reports</h1>
        <form method="post" action="admin.php?page=woo-reports-admin-page" novalidate="novalidate">
            <?php
            wp_nonce_field('woo_reports_admin');
            if (isset($_POST['submit-woo-reports']) && check_admin_referer('woo_reports_admin')) {
                get_woo_orders_by_date($_POST['start_date'], $_POST['end_date'], $_POST['date_type']);
            }
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="start_date">Start date</label></th>
                    <td><input type="date" name="start_date" value="<?php echo (isset($_POST['start_date'])) ? $_POST['start_date'] : '' ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="end_date">End date</label></th>
                    <td><input type="date" name="end_date" value="<?php echo (isset($_POST['end_date'])) ? $_POST['end_date'] : '' ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="date_type">Status</label></th>
                    <td>
                        <select name="date_type">
                            <option value="date_created">Created</option>
                            <option value="date_modified">Modified</option>
                            <option value="date_completed">Completed</option>
                            <option value="date_paid">Paid</option>
                        </select>
                    </td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="submit-woo-reports" id="submit" class="button button-primary" value="Submit">
            </p>
        </form>
    </div>
    <?php
}

function get_woo_orders() {

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

        $order_id = $order_data['id'];
        $order_date_created = $order_data['date_created']->date('Y-m-d H:i:s');
        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_total = $order_data['total'];
        $order_payment_method = $order_data['payment_method'];

        echo $order_id.'<br>';
        echo $order_date_created.'<br>';
        echo $order_billing_first_name.'<br>';
        echo $order_billing_last_name.'<br>';
        echo $order_total.'<br>';
        echo $order_payment_method.'<br>';


        echo '</p>';
    }
}

function get_woo_orders_by_date( $start_date = '2012-07-18', $end_date = '2017-07-18', $date_type = 'date_created' ) {

    $args = array(
        'limit' => -1,
        'type' => 'shop_order',
        'status' => 'completed',
        'orderby' => 'modified',
        'order' => 'DESC',
        'return' => 'ids',
        $date_type => $start_date.'...'.$end_date,
    );
    $orders = wc_get_orders( $args );

    $total = array();

    $payment_methods = array();

    foreach($orders as $order_id){
        // $order = wc_get_order( $order_id );

        $order = new WC_Order($order_id);

        $order_data = $order->get_data();

        // echo '<pre>';
        // print_r($order->get_meta_data());
        // echo '</pre>';

         foreach ($order->get_meta_data() as $data) {
             if ( $data->key == '_pos_store_title' ) {
                 echo '<pre>';
                 echo $data->value;
                 echo '</pre>';
             }
        }

        foreach ($order->get_items() as $key => $lineItem) {

            $product = wc_get_product($lineItem['product_id']);

            // uncomment the following to see the full data
            //        echo '<pre>';
            //        print_r($lineItem);
            //        echo '</pre>';
            echo '<br>' . 'Product Name : ' . $lineItem['name'] . '<br>';
            echo 'Product ID : ' . $lineItem['product_id'] . '<br>';
            echo 'Sku : ' . $product->get_sku() . '<br>';
            if ($lineItem['variation_id']) {
                echo 'Product Type : Variable Product' . '<br>';
            } else {
                echo 'Product Type : Simple Product' . '<br>';
            }
        }

        $order_total = $order_data['total'];
        $order_payment_method = $order_data['payment_method_title'];

        $order_payment_method_total = $total[$order_payment_method] + $order_total;

        array_push($payment_methods, $order_payment_method);

        $total[$order_payment_method] = $order_payment_method_total;

    }

    $payment_methods_count = array_count_values($payment_methods);

    echo '<table width="100%" class="woo-report">';
    echo '<tr><th>Payment method</th><th>Number of orders</th><th>Total</th></tr>';
    foreach ( $payment_methods_count as $key => $value ) {
        echo '<tr>';
        echo '<td>'.$key.'</td>';
        echo '<td>'.$value.'</td>';
        echo '<td>'.money_format( '%(#10n', $total[$key]).'</td>';
        echo '</tr>';
    }
    echo '</table>';
}



