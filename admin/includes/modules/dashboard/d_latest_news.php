<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\Cache;
  use KUU\ZU\DateTime;
  use KUU\ZU\HTML;
  use KUU\ZU\HTTP;
  use KUU\ZU\KUUZU;
  use KUU\ZU\Registry;

  class d_latest_news {
    var $code = 'd_latest_news';
    var $title;
    var $description;
    var $sort_order;
    var $enabled = false;

    function d_latest_news() {
      $this->title = KUUZU::getDef('module_admin_dashboard_latest_news_title');
      $this->description = KUUZU::getDef('module_admin_dashboard_latest_news_description');

      if ( defined('MODULE_ADMIN_DASHBOARD_LATEST_NEWS_STATUS') ) {
        $this->sort_order = MODULE_ADMIN_DASHBOARD_LATEST_NEWS_SORT_ORDER;
        $this->enabled = (MODULE_ADMIN_DASHBOARD_LATEST_NEWS_STATUS == 'True');
      }
    }

    function getOutput() {
      $entries = [];

      $newsCache = new Cache('kuuzu_website-news-latest');

      if ($newsCache->exists(360)) {
        $entries = $newsCache->get();
      } else {
        $response = HTTP::getResponse(['url' => 'https://www.kuuzu.org/index.php?RPC&GetLatestNews']);

        if (!empty($response)) {
          $response = json_decode($response, true);

          if (is_array($response) && (count($response) === 5)) {
            $entries = $response;
          }
        }

        $newsCache->save($entries);
      }

      $output = '<table class="table table-hover">
                   <thead>
                     <tr class="info">
                       <th>' . KUUZU::getDef('module_admin_dashboard_latest_news_title') . '</th>
                       <th class="text-right">' . KUUZU::getDef('module_admin_dashboard_latest_news_date') . '</th>
                     </tr>
                   </thead>
                   <tbody>';

      if (is_array($entries) && (count($entries) === 5)) {
        foreach ($entries as $item) {
          $output .= '    <tr>
                            <td><a href="' . HTML::outputProtected($item['link']) . '" target="_blank">' . HTML::outputProtected($item['title']) . '</a></td>
                            <td class="text-right" style="white-space: nowrap;">' . HTML::outputProtected(DateTime::toShort($item['date'])) . '</td>
                          </tr>';
        }
      } else {
        $output .= '    <tr>
                          <td colspan="2">' . KUUZU::getDef('module_admin_dashboard_latest_news_feed_error') . '</td>
                        </tr>';
      }

      $output .= '    <tr>
                        <td class="text-right" colspan="2">
                          <a href="https://www.kuuzu.org/Us&News" target="_blank" title="' . HTML::outputProtected(KUUZU::getDef('module_admin_dashboard_latest_news_icon_news')) . '"><span class="fa fa-fw fa-home"></span></a>
                          <a href="https://www.kuuzu.org/newsletter/subscribe" target="_blank" title="' . HTML::outputProtected(KUUZU::getDef('module_admin_dashboard_latest_news_icon_newsletter')) . '"><span class="fa fa-fw fa-newspaper-o"></span></a>
                          <a href="https://plus.google.com/+kuuzu" target="_blank" title="' . HTML::outputProtected(KUUZU::getDef('module_admin_dashboard_latest_news_icon_google_plus')) . '"><span class="fa fa-fw fa-google-plus"></span></a>
                          <a href="https://www.facebook.com/" target="_blank" title="' . HTML::outputProtected(KUUZU::getDef('module_admin_dashboard_latest_news_icon_facebook')) . '"><span class="fa fa-fw fa-facebook"></span></a>
                          <a href="https://twitter.com/kuuzu_" target="_blank" title="' . HTML::outputProtected(KUUZU::getDef('module_admin_dashboard_latest_news_icon_twitter')) . '"><span class="fa fa-fw fa-twitter"></span></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>';

      return $output;
    }

    function isEnabled() {
      return $this->enabled;
    }

    function check() {
      return defined('MODULE_ADMIN_DASHBOARD_LATEST_NEWS_STATUS');
    }

    function install() {
      $KUUZU_Db = Registry::get('Db');

      $KUUZU_Db->save('configuration', [
        'configuration_title' => 'Enable Latest News Module',
        'configuration_key' => 'MODULE_ADMIN_DASHBOARD_LATEST_NEWS_STATUS',
        'configuration_value' => 'True',
        'configuration_description' => 'Do you want to show the latest osCommerce News on the dashboard?',
        'configuration_group_id' => '6',
        'sort_order' => '1',
        'set_function' => 'tep_cfg_select_option(array(\'True\', \'False\'), ',
        'date_added' => 'now()'
      ]);

      $KUUZU_Db->save('configuration', [
        'configuration_title' => 'Sort Order',
        'configuration_key' => 'MODULE_ADMIN_DASHBOARD_LATEST_NEWS_SORT_ORDER',
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
      return array('MODULE_ADMIN_DASHBOARD_LATEST_NEWS_STATUS', 'MODULE_ADMIN_DASHBOARD_LATEST_NEWS_SORT_ORDER');
    }
  }
?>
