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

  $KUUZU_Language->loadDefinitions('ssl_check');

  $breadcrumb->add(KUUZU::getDef('navbar_title'), KUUZU::link('ssl_check.php'));

  require($kuuTemplate->getFile('template_top.php'));
?>

<div class="page-header">
  <h1><?php echo KUUZU::getDef('heading_title'); ?></h1>
</div>

<div class="contentContainer">
  <div class="contentText">

    <div class="panel panel-danger">
      <div class="panel-heading"><?php echo KUUZU::getDef('box_information_heading'); ?></div>
      <div class="panel-body">
        <?php echo KUUZU::getDef('box_information'); ?>
      </div>
    </div>

    <div class="panel panel-danger">
      <div class="panel-body">
        <?=
          KUUZU::getDef('text_information', [
            'contact_us_url' => KUUZU::link('contact_us.php')
          ]);
        ?>
      </div>
    </div>
  </div>

  <div class="buttonSet">
    <div class="text-right"><?php echo HTML::button(KUUZU::getDef('image_button_continue'), 'fa fa-angle-right', KUUZU::link('login.php')); ?></div>
  </div>
</div>

<?php
  require($kuuTemplate->getFile('template_bottom.php'));
  require('includes/application_bottom.php');
?>
