<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;
  use KUU\ZU\Registry;

  class securityCheck_default_currency {
    var $type = 'error';

    protected $lang;

    function __construct() {
      $this->lang = Registry::get('Language');

      $this->lang->loadDefinitions('modules/security_check/default_currency');
    }

    function pass() {
      return defined('DEFAULT_CURRENCY');
    }

    function getMessage() {
      return KUUZU::getDef('error_no_default_currency_defined');
    }
  }
?>
