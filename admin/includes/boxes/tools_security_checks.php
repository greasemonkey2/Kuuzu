<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;

  foreach ( $cl_box_groups as &$group ) {
    if ( $group['heading'] == KUUZU::getDef('box_heading_tools') ) {
      $group['apps'][] = array('code' => 'security_checks.php',
                               'title' => KUUZU::getDef('modules_admin_menu_tools_security_checks'),
                               'link' => KUUZU::link('security_checks.php'));

      break;
    }
  }
?>
