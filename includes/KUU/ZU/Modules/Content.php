<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

namespace KUU\ZU\Modules;

use KUU\ZU\Apps;

class Content extends \KUU\ZU\ModulesAbstract
{
    public function getInfo($app, $key, $data)
    {
        $result = [];

        foreach ($data as $code => $class) {
            $class = $this->ns . $app . '\\' . $class;

            if (is_subclass_of($class, 'KUU\ZU\Modules\\' . $this->code . 'Interface')) {
                $result[$key . '/' . $app . '\\' . $code] = $class;
            }
        }

        return $result;
    }

    public function getClass($module)
    {
        list($group, $code) = explode('/', $module, 2);
        list($vendor, $app, $code) = explode('\\', $code, 3);

        $info = Apps::getInfo($vendor . '\\' . $app);

        if (isset($info['modules'][$this->code][$group][$code])) {
            return $this->ns . $vendor . '\\' . $app . '\\' . $info['modules'][$this->code][$group][$code];
        }
    }
}
