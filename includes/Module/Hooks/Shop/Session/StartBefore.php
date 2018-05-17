<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

namespace KUU\ZU\Module\Hooks\Shop\Session;

use KUU\ZU\KUUZU;

class StartBefore
{
    public function execute($parameters) {
        if (SESSION_BLOCK_SPIDERS == 'True') {
            $user_agent = '';

            if (isset($_SERVER['HTTP_USER_AGENT'])) {
                $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
            }

            if (!empty($user_agent)) {
                foreach (file(KUUZU::getConfig('dir_root') . 'includes/spiders.txt') as $spider) {
                    if (!empty($spider)) {
                        if (strpos($user_agent, $spider) !== false) {
                            $parameters['can_start'] = false;
                            break;
                        }
                    }
                }
            }
        }
    }
}
