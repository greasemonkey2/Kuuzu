<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

namespace KUU\ZU\Module\Hooks\Shop\Session;

use KUU\ZU\Hash;
use KUU\ZU\HTTP;
use KUU\ZU\KUUZU;
use KUU\ZU\Registry;

class StartAfter
{
    public function execute() {
        $KUUZU_Session = Registry::get('Session');

// initialize a session token
        if (!isset($_SESSION['sessiontoken'])) {
            $_SESSION['sessiontoken'] = md5(Hash::getRandomInt() . Hash::getRandomInt() . Hash::getRandomInt() . Hash::getRandomInt());
        }

// verify the ssl_session_id if the feature is enabled
        if ((HTTP::getRequestType() === 'SSL') && (SESSION_CHECK_SSL_SESSION_ID == 'True') && $KUUZU_Session->hasStarted()) {
            if (!isset($_SESSION['SSL_SESSION_ID'])) {
                $_SESSION['SESSION_SSL_ID'] = $_SERVER['SSL_SESSION_ID'];
            }

            if ($_SESSION['SESSION_SSL_ID'] != $_SERVER['SSL_SESSION_ID']) {
                $KUUZU_Session->kill();

                KUUZU::redirect('ssl_check.php');
            }
        }

// verify the browser user agent if the feature is enabled
        if (SESSION_CHECK_USER_AGENT == 'True') {
            if (!isset($_SESSION['SESSION_USER_AGENT'])) {
                $_SESSION['SESSION_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
            }

            if ($_SESSION['SESSION_USER_AGENT'] != $_SERVER['HTTP_USER_AGENT']) {
                $KUUZU_Session->kill();

                KUUZU::redirect('login.php');
            }
        }

// verify the IP address if the feature is enabled
        if (SESSION_CHECK_IP_ADDRESS == 'True') {
            if (!isset($_SESSION['SESSION_IP_ADDRESS'])) {
                $_SESSION['SESSION_IP_ADDRESS'] = HTTP::getIpAddress();
            }

            if ($_SESSION['SESSION_IP_ADDRESS'] != HTTP::getIpAddress()) {
                $KUUZU_Session->kill();

                KUUZU::redirect('login.php');
            }
        }
    }
}
