<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\KUUZU;

  require('includes/application_top.php');

  if (!isset($_SESSION['customer_id'])) {
    $_SESSION['navigation']->set_snapshot();
    KUUZU::redirect('login.php');
  }

  $KUUZU_Language->loadDefinitions('account');

  $breadcrumb->add(KUUZU::getDef('navbar_title'), KUUZU::link('account.php'));

  require($kuuTemplate->getFile('template_top.php'));
?>

<div class="page-header">
  <h1><?= KUUZU::getDef('heading_title'); ?></h1>
</div>

<?php
  if ($messageStack->size('account') > 0) {
    echo $messageStack->output('account');
  }
?>

<div class="contentContainer">
  <div class="row">

    <?php
    echo $kuuTemplate->getContent('account');
    ?>

  </div>
</div>


<?php
  require($kuuTemplate->getFile('template_bottom.php'));
  require('includes/application_bottom.php');
?>
