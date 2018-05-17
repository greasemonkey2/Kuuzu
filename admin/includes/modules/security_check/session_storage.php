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

  class securityCheck_session_storage {
    var $type = 'warning';

    protected $lang;

    function __construct() {
      $this->lang = Registry::get('Language');

      $this->lang->loadDefinitions('modules/security_check/session_storage');
    }

    function pass() {
      return ((KUUZU::getConfig('store_sessions') != '') || FileSystem::isWritable(session_save_path()));
    }

    function getMessage() {
      if (KUUZU::getConfig('store_sessions') == '') {
        if (!is_dir(session_save_path())) {
          return KUUZU::getDef('warning_session_directory_non_existent', [
            'session_path' => session_save_path()
          ]);
        } elseif (!FileSystem::isWritable(session_save_path())) {
          return KUUZU::getDef('warning_session_directory_not_writeable', [
            'session_path' => session_save_path()
          ]);
        }
      }
    }
  }
?>
