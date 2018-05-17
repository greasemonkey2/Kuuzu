<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

namespace KUU\ZU;

use KUU\ZU\KUUZU;

class Session
{
    public static function load($name = null)
    {
        $class_name = 'KUU\\ZU\\Session\\' . KUUZU::getConfig('store_sessions');

        if (!class_exists($class_name)) {
            trigger_error('Session Handler \'' . $class_name . '\' does not exist, using default \'KUU\\ZU\\Session\\File\'', E_USER_NOTICE);

            $class_name = 'KUU\\ZU\\Session\\File';
        } elseif (!is_subclass_of($class_name, 'KUU\ZU\SessionAbstract')) {
            trigger_error('Session Handler \'' . $class_name . '\' does not extend KUU\\ZU\\SessionAbstract, using default \'KUU\\ZU\\Session\\File\'', E_USER_NOTICE);

            $class_name = 'KUU\\ZU\\Session\\File';
        }

        $obj = new $class_name();

        if (!isset($name)) {
            $name = 'kuuzuid';
        }

        $obj->setName($name);

        return $obj;
    }
}
