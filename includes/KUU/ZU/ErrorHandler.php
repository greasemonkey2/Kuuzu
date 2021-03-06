<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

namespace KUU\ZU;

use KUU\ZU\FileSystem;
use KUU\ZU\KUUZU;

class ErrorHandler
{
    public static function initialize()
    {
        ini_set('display_errors', false);
        ini_set('html_errors', false);
        ini_set('ignore_repeated_errors', true);

        if (FileSystem::isWritable(static::getDirectory(), true)) {
            if (!is_dir(static::getDirectory())) {
                mkdir(static::getDirectory(), 0777, true);
            }
        }

        if (FileSystem::isWritable(static::getDirectory())) {
            ini_set('log_errors', true);
            ini_set('error_log', static::getDirectory() . 'errors-' . date('Ymd') . '.txt');
        }
    }

    public static function getDirectory()
    {
        return KUUZU::BASE_DIR . 'Work/Logs/';
    }
}
