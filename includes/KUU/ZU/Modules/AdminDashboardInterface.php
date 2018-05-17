<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

namespace KUU\ZU\Modules;

interface AdminDashboardInterface
{
    public function getOutput();
    public function install();
    public function keys();
    public function isEnabled();
    public function check();
    public function remove();
}
