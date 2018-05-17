<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

namespace KUU\ZU;

abstract class PagesActionsAbstract implements \KUU\ZU\PagesActionsInterface
{
    protected $page;
    protected $file;
    protected $is_rpc = false;

    public function __construct(\KUU\ZU\PagesInterface $page)
    {
        $this->page = $page;

        if (isset($this->file)) {
            $this->page->setFile($this->file);
        }
    }

    public function isRPC()
    {
        return ($this->is_rpc === true);
    }
}
