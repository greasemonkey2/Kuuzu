<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;
  use KUU\ZU\Registry;

  class securityCheckExtended_admin_http_authentication {
    var $type = 'warning';

    protected $lang;

    function __construct() {
      $this->lang = Registry::get('Language');

      $this->lang->loadDefinitions('modules/security_check/extended/admin_http_authentication');

      $this->title = KUUZU::getDef('module_security_check_extended_admin_http_authentication_title');
    }

    function pass() {

      return isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']);
    }

    function getMessage() {
      return KUUZU::getDef('module_security_check_extended_admin_http_authentication_error');
    }
  }
?>
