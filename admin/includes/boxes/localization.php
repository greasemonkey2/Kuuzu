<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;

  $cl_box_groups[] = array(
    'heading' => KUUZU::getDef('box_heading_localization'),
    'apps' => array(
      array(
        'code' => FILENAME_CURRENCIES,
        'title' => KUUZU::getDef('box_localization_currencies'),
        'link' => KUUZU::link(FILENAME_CURRENCIES)
      ),
      array(
        'code' => FILENAME_LANGUAGES,
        'title' => KUUZU::getDef('box_localization_languages'),
        'link' => KUUZU::link(FILENAME_LANGUAGES)
      ),
      array(
        'code' => FILENAME_ORDERS_STATUS,
        'title' => KUUZU::getDef('box_localization_orders_status'),
        'link' => KUUZU::link(FILENAME_ORDERS_STATUS)
      )
    )
  );
?>
