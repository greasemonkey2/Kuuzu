<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;
  use KUU\ZU\Registry;

  class securityCheck_download_directory {
    var $type = 'warning';

    protected $lang;

    function __construct() {
      $this->lang = Registry::get('Language');

      $this->lang->loadDefinitions('modules/security_check/download_directory');
    }

    function pass() {
      if (DOWNLOAD_ENABLED != 'true') {
        return true;
      }

      return is_dir(KUUZU::getConfig('dir_root', 'Shop') . 'download/');
    }

    function getMessage() {
      return KUUZU::getDef('warning_download_directory_non_existent', [
        'download_path' => KUUZU::getConfig('dir_root', 'Shop') . 'download/'
      ]);
    }
  }
?>
