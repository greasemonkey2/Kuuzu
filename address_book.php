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

  if (!isset($_SESSION['customer_id'])) {
    $_SESSION['navigation']->set_snapshot();
    KUUZU::redirect('login.php');
  }

  $KUUZU_Language->loadDefinitions('address_book');

  $breadcrumb->add(KUUZU::getDef('navbar_title_1'), KUUZU::link('account.php'));
  $breadcrumb->add(KUUZU::getDef('navbar_title_2'), KUUZU::link('address_book.php'));

  require($kuuTemplate->getFile('template_top.php'));
?>

<div class="page-header">
  <h1><?php echo KUUZU::getDef('heading_title'); ?></h1>
</div>

<?php
  if ($messageStack->size('addressbook') > 0) {
    echo $messageStack->output('addressbook');
  }
?>

<div class="contentContainer">
  <h2><?php echo KUUZU::getDef('primary_address_title'); ?></h2>

  <div class="contentText row">
    <div class="col-sm-8">
      <div class="alert alert-warning"><?php echo KUUZU::getDef('primary_address_description'); ?></div>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo KUUZU::getDef('primary_address_title'); ?></div>

        <div class="panel-body">
          <?php echo tep_address_label($_SESSION['customer_id'], $_SESSION['customer_default_address_id'], true, ' ', '<br />'); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <h2><?php echo KUUZU::getDef('address_book_title'); ?></h2>

  <div class="alert alert-warning"><?php echo KUUZU::getDef('text_maximum_entries', ['max_address_book_entries' => MAX_ADDRESS_BOOK_ENTRIES]); ?></div>

  <div class="contentText row">
<?php
  $Qab = $KUUZU_Db->prepare('select address_book_id, entry_firstname as firstname, entry_lastname as lastname, entry_company as company, entry_street_address as street_address, entry_suburb as suburb, entry_city as city, entry_postcode as postcode, entry_state as state, entry_zone_id as zone_id, entry_country_id as country_id from :table_address_book where customers_id = :customers_id order by firstname, lastname');
  $Qab->bindInt(':customers_id', $_SESSION['customer_id']);
  $Qab->execute();

  while ($Qab->fetch()) {
    $format_id = tep_get_address_format_id($Qab->valueInt('country_id'));
?>
      <div class="col-sm-4">
        <div class="panel panel-<?php echo ($Qab->valueInt('address_book_id') == $_SESSION['customer_default_address_id']) ? 'primary' : 'default'; ?>">
          <div class="panel-heading"><?php echo HTML::outputProtected($Qab->value('firstname') . ' ' . $Qab->value('lastname')); ?></strong><?php if ($Qab->valueInt('address_book_id') == $_SESSION['customer_default_address_id']) echo '&nbsp;<small><i>' . KUUZU::getDef('primary_address') . '</i></small>'; ?></div>
          <div class="panel-body">
            <?php echo tep_address_format($format_id, $Qab->toArray(), true, ' ', '<br />'); ?>
          </div>
          <div class="panel-footer text-center"><?php echo HTML::button(KUUZU::getDef('small_image_button_edit'), 'fa fa-file', KUUZU::link('address_book_process.php', 'edit=' . $Qab->valueInt('address_book_id'))) . ' ' . HTML::button(KUUZU::getDef('small_image_button_delete'), 'fa fa-trash', KUUZU::link('address_book_process.php', 'delete=' . $Qab->valueInt('address_book_id'))); ?></div>
        </div>
      </div>
<?php
  }
?>
  </div>

  <div class="clearfix"></div>

  <div class="buttonSet row">
    <div class="col-xs-6"><?php echo HTML::button(KUUZU::getDef('image_button_back'), 'fa fa-angle-left', KUUZU::link('account.php')); ?></div>
<?php
  if (tep_count_customer_address_book_entries() < MAX_ADDRESS_BOOK_ENTRIES) {
?>
    <div class="col-xs-6 text-right"><?php echo HTML::button(KUUZU::getDef('image_button_add_address'), 'fa fa-home', KUUZU::link('address_book_process.php')); ?></div>
<?php
  }
?>
  </div>
</div>

<?php
  require($kuuTemplate->getFile('template_bottom.php'));
  require('includes/application_bottom.php');
?>
