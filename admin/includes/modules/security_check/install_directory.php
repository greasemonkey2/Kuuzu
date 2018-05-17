<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;
  use KUU\ZU\Registry;

  class securityCheck_install_directory {
    var $type = 'warning';

    protected $lang;

    function __construct() {
      $this->lang = Registry::get('Language');

      $this->lang->loadDefinitions('modules/security_check/install_directory');
    }

    function pass() {
      return !is_dir(KUUZU::getConfig('dir_root', 'Shop') . 'install');
    }

    function getMessage() {
      return KUUZU::getDef('warning_install_directory_exists', [
        'install_path' => KUUZU::getConfig('dir_root', 'Shop') . 'install'
      ]);
    }
  }
?>
