<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;

  class cfgm_header_tags {
    var $code = 'header_tags';
    var $directory;
    var $language_directory;
    var $site = 'Shop';
    var $key = 'MODULE_HEADER_TAGS_INSTALLED';
    var $title;
    var $template_integration = true;

    function __construct() {
      $this->directory = KUUZU::getConfig('dir_root', $this->site) . 'includes/modules/header_tags/';
      $this->language_directory = KUUZU::getConfig('dir_root', $this->site) . 'includes/languages/';
      $this->title = KUUZU::getDef('module_cfg_module_header_tags_title');
    }
  }
?>
