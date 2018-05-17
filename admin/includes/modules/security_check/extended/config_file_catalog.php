<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\FileSystem;
  use KUU\ZU\KUUZU;
  use KUU\ZU\Registry;

  class securityCheck_config_file_catalog {
    var $type = 'warning';

    protected $lang;

    function __construct() {
      $this->lang = Registry::get('Language');

      $this->lang->loadDefinitions('modules/security_check/config_file_catalog');
    }

    function pass() {
      return !FileSystem::isWritable(KUUZU::getConfig('dir_root', 'Shop') . 'includes/configure.php');
    }

    function getMessage() {
      return KUUZU::getDef('warning_config_file_writeable', [
        'configure_file_path' => KUUZU::getConfig('dir_root', 'Shop') . 'includes/configure.php'
      ]);
    }
  }
?>
