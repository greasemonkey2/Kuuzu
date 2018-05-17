<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;

  foreach ( $cl_box_groups as &$group ) {
    if ( $group['heading'] == KUUZU::getDef('box_heading_modules') ) {
      $group['apps'][] = array('code' => 'modules_hooks.php',
                               'title' => KUUZU::getDef('modules_admin_menu_modules_hooks'),
                               'link' => KUUZU::link('modules_hooks.php'));

      break;
    }
  }
?>
