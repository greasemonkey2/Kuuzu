<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;

  $cl_box_groups[] = array(
    'heading' => KUUZU::getDef('box_heading_reports'),
    'apps' => array(
      array(
        'code' => FILENAME_STATS_PRODUCTS_VIEWED,
        'title' => KUUZU::getDef('box_reports_products_viewed'),
        'link' => KUUZU::link(FILENAME_STATS_PRODUCTS_VIEWED)
      ),
      array(
        'code' => FILENAME_STATS_PRODUCTS_PURCHASED,
        'title' => KUUZU::getDef('box_reports_products_purchased'),
        'link' => KUUZU::link(FILENAME_STATS_PRODUCTS_PURCHASED)
      ),
      array(
        'code' => FILENAME_STATS_CUSTOMERS,
        'title' => KUUZU::getDef('box_reports_orders_total'),
        'link' => KUUZU::link(FILENAME_STATS_CUSTOMERS)
      )
    )
  );
?>
