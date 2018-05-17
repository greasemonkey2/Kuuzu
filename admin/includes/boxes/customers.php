<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;

  $cl_box_groups[] = array(
    'heading' => KUUZU::getDef('box_heading_customers'),
    'apps' => array(
      array(
        'code' => FILENAME_CUSTOMERS,
        'title' => KUUZU::getDef('box_customers_customers'),
        'link' => KUUZU::link(FILENAME_CUSTOMERS)
      )
    )
  );
?>
