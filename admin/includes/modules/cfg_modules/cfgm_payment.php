<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;

  class cfgm_payment {
    var $code = 'payment';
    var $directory;
    var $language_directory;
    var $site = 'Shop';
    var $key = 'MODULE_PAYMENT_INSTALLED';
    var $title;
    var $template_integration = false;

    function __construct() {
      $this->directory = KUUZU::getConfig('dir_root', $this->site) . 'includes/modules/payment/';
      $this->language_directory = KUUZU::getConfig('dir_root', $this->site) . 'includes/languages/';
      $this->title = KUUZU::getDef('module_cfg_module_payment_title');
    }
  }
?>
