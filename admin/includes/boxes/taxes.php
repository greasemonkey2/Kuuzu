<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;

  $cl_box_groups[] = array(
    'heading' => KUUZU::getDef('box_heading_location_and_taxes'),
    'apps' => array(
      array(
        'code' => FILENAME_COUNTRIES,
        'title' => KUUZU::getDef('box_taxes_countries'),
        'link' => KUUZU::link(FILENAME_COUNTRIES)
      ),
      array(
        'code' => FILENAME_ZONES,
        'title' => KUUZU::getDef('box_taxes_zones'),
        'link' => KUUZU::link(FILENAME_ZONES)
      ),
      array(
        'code' => FILENAME_GEO_ZONES,
        'title' => KUUZU::getDef('box_taxes_geo_zones'),
        'link' => KUUZU::link(FILENAME_GEO_ZONES)
      ),
      array(
        'code' => FILENAME_TAX_CLASSES,
        'title' => KUUZU::getDef('box_taxes_tax_classes'),
        'link' => KUUZU::link(FILENAME_TAX_CLASSES)
      ),
      array(
        'code' => FILENAME_TAX_RATES,
        'title' => KUUZU::getDef('box_taxes_tax_rates'),
        'link' => KUUZU::link(FILENAME_TAX_RATES)
      )
    )
  );
?>
