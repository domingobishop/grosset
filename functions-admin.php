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
                get_woo_orders_by_date($_POST['start_date'], $_POST['end_date']);
            }
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="start_date">Start date</label></th>
                    <td><input type="date" name="start_date" value="<?php echo (isset($_POST['start_date'])) ? $_POST['start_date'] : '' ?>" /> Format DD/MM/YYYY</td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="end_date">End date</label></th>
                    <td><input type="date" name="end_date" value="<?php echo (isset($_POST['end_date'])) ? $_POST['end_date'] : '' ?>" /> Format DD/MM/YYYY</td>
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

function extract_products_from_orders( $orders ) {

    $report = array();

    foreach($orders as $order_id) {

        $order = new WC_Order($order_id);

        $order_data = $order->get_data();

        if ($order->get_meta('_pos_store_title')) {
            $store = $order->get_meta('_pos_store_title');
            if ( $store == '' ) {
                $store = 'Online';
            }
        } else {
            $store = 'Online';
        }

        $order_date_completed = $order_data['date_completed']->date('Y-m-d');

        foreach ($order->get_items() as $key => $lineItem) {

            $product = wc_get_product($lineItem['product_id']);

            $report[$store.' '.$order_date_completed][$order_id.$lineItem['product_id']]['product_name'] = $lineItem['name'];
            $report[$store.' '.$order_date_completed][$order_id.$lineItem['product_id']]['product_sku'] = $product->get_sku();
            $report[$store.' '.$order_date_completed][$order_id.$lineItem['product_id']]['quantity'] = $lineItem['quantity'];
            $report[$store.' '.$order_date_completed][$order_id.$lineItem['product_id']]['total'] = $lineItem['total'];
        }

    }

    return $report;
}

function display_report( $report ) {

    foreach ( $report as $store_date => $products ) {

        echo '<h3>'.$store_date.'</h3>';

        echo '<table width="100%" class="woo-report">';
        echo '<tr><th width="33.3%">SKU</th><th width="33.3%">Quantity</th><th width="33.3%">Total inc tax</th></tr>';

        $total = 0;
        $quantity = 0;

        usort($products, function($a, $b) {
            return strcmp($a['product_sku'], $b['product_sku']);
        });

        foreach ( $products as $key => $value ) {

            $grand_total = round($value['total']*1.1,2);

            echo '<tr>';
            echo '<td>'.$value['product_sku'].'</td>';
            echo '<td>'.$value['quantity'].'</td>';
            echo '<td>'.$grand_total.'</td>';
            echo '</tr>';

            $total = $total + $grand_total;
            $quantity = $quantity + $value['quantity'];

            // echo '<pre>';
            // print_r($value);
            // echo '</pre>';

        }

        echo '<tr>';
        echo '<td><strong>Total inc tax</strong></td>';
        echo '<td><strong>'.$quantity.'</strong></td>';
        echo '<td><strong>'.$total.'</strong></td>';
        echo '</tr>';
        echo '</table>';
    }
}

function get_woo_orders_by_date( $start_date = '2017-07-17', $end_date = '2017-07-18' ) {

    $start_date = strtotime($start_date.' 00:00:00' );
    $end_date = strtotime($end_date.' 23:59:59' );

    if ( $start_date > $end_date ) {
        echo '<div><h3>Error: start date cannot be set after the end date</h3></div>';
    }

    $args = array(
        'limit' => -1,
        'type' => 'shop_order',
        'status' => 'completed',
        'orderby' => 'modified',
        'order' => 'DESC',
        'return' => 'ids',
        'date_completed' => $start_date.'...'.$end_date,
    );
    $orders = wc_get_orders( $args );

    $report = extract_products_from_orders( $orders );

    display_report( $report );
}
