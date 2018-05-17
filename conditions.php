<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\HTML;
  use KUU\ZU\KUUZU;

  require('includes/application_top.php');

  $KUUZU_Language->loadDefinitions('conditions');

  $breadcrumb->add(KUUZU::getDef('navbar_title'), KUUZU::link('conditions.php'));

  require($kuuTemplate->getFile('template_top.php'));
?>

<div class="page-header">
  <h1><?php echo KUUZU::getDef('heading_title'); ?></h1>
</div>

<div class="contentContainer">
  <div class="contentText">
    <?php echo KUUZU::getDef('text_information'); ?>
  </div>

  <div class="buttonSet">
    <div class="text-right"><?php echo HTML::button(KUUZU::getDef('image_button_continue'), 'fa fa-angle-right', KUUZU::link('index.php')); ?></div>
  </div>
</div>

<?php
  require($kuuTemplate->getFile('template_bottom.php'));
  require('includes/application_bottom.php');
?>
