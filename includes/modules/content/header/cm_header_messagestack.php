<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;
  use KUU\ZU\Registry;

  class cm_header_messagestack {
    var $code;
    var $group;
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function __construct() {
      $this->code = get_class($this);
      $this->group = basename(dirname(__FILE__));

      $this->title = KUUZU::getDef('module_content_header_messagestack_title');
      $this->description = KUUZU::getDef('module_content_header_messagestack_description');

      if ( defined('MODULE_CONTENT_HEADER_MESSAGESTACK_STATUS') ) {
        $this->sort_order = MODULE_CONTENT_HEADER_MESSAGESTACK_SORT_ORDER;
        $this->enabled = (MODULE_CONTENT_HEADER_MESSAGESTACK_STATUS == 'True');
      }
    }

    function execute() {
      global $kuuTemplate, $messageStack;

      if ($messageStack->size('header') > 0) {

        ob_start();
        include('includes/modules/content/' . $this->group . '/templates/messagestack.php');
        $template = ob_get_clean();

        $kuuTemplate->addContent($template, $this->group);

      }
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_CONTENT_HEADER_MESSAGESTACK_STATUS');
    }

    function install() {
      $KUUZU_Db = Registry::get('Db');

      $KUUZU_Db->save('configuration', [
        'configuration_title' => 'Enable Message Stack Notifications Module',
        'configuration_key' => 'MODULE_CONTENT_HEADER_MESSAGESTACK_STATUS',
        'configuration_value' => 'True',
        'configuration_description' => 'Should the Message Stack Notifications be shown in the header when needed?',
        'configuration_group_id' => '6',
        'sort_order' => '1',
        'set_function' => 'tep_cfg_select_option(array(\'True\', \'False\'), ',
        'date_added' => 'now()'
      ]);

      $KUUZU_Db->save('configuration', [
        'configuration_title' => 'Sort Order',
        'configuration_key' => 'MODULE_CONTENT_HEADER_MESSAGESTACK_SORT_ORDER',
        'configuration_value' => '0',
        'configuration_description' => 'Sort order of display. Lowest is displayed first.',
        'configuration_group_id' => '6',
        'sort_order' => '0',
        'date_added' => 'now()'
      ]);
    }

    function remove() {
      return Registry::get('Db')->exec('delete from :table_configuration where configuration_key in ("' . implode('", "', $this->keys()) . '")');
    }

    function keys() {
      return array('MODULE_CONTENT_HEADER_MESSAGESTACK_STATUS', 'MODULE_CONTENT_HEADER_MESSAGESTACK_SORT_ORDER');
    }
  }

