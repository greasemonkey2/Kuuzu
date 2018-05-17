<?php
/**
  * osCommerce Online Merchant
  *
  * @copyright (c) 2016 osCommerce; https://www.oscommerce.com
  * @license MIT; https://www.oscommerce.com/license/mit.txt
  */

  use KUU\ZU\HTML;
  use KUU\ZU\Is;
  use KUU\ZU\Mail;
  use KUU\ZU\KUUZU;

  require('includes/application_top.php');

  $KUUZU_Language->loadDefinitions('contact_us');

  if (isset($_GET['action']) && ($_GET['action'] == 'send') && isset($_POST['formid']) && ($_POST['formid'] == $_SESSION['sessiontoken'])) {
    $error = false;

    $name = HTML::sanitize($_POST['name']);
    $email_address = HTML::sanitize($_POST['email']);
    $enquiry = HTML::sanitize($_POST['enquiry']);

    if (!Is::email($email_address)) {
      $error = true;

      $messageStack->add('contact', KUUZU::getDef('entry_email_address_check_error'));
    }

    $actionRecorder = new actionRecorder('ar_contact_us', (isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null), $name);
    if (!$actionRecorder->canPerform()) {
      $error = true;

      $actionRecorder->record(false);

      $messageStack->add('contact', KUUZU::getDef('error_action_recorder', ['module_action_recorder_contact_us_email_minutes' => (defined('MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES') ? (int)MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES : 15)]));
    }

    if ($error == false) {
      $contactEmail = new Mail(STORE_OWNER_EMAIL_ADDRESS, STORE_OWNER, $email_address, $name, KUUZU::getDef('email_subject', ['store_name' => STORE_NAME]));
      $contactEmail->setBody($enquiry);
      $contactEmail->send();

      $actionRecorder->record();

      KUUZU::redirect('contact_us.php', 'action=success');
    }
  }

  $breadcrumb->add(KUUZU::getDef('navbar_title'), KUUZU::link('contact_us.php'));

  require($kuuTemplate->getFile('template_top.php'));
?>

<div class="page-header">
  <h1><?php echo KUUZU::getDef('heading_title'); ?></h1>
</div>

<?php
  if ($messageStack->size('contact') > 0) {
    echo $messageStack->output('contact');
  }

  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>

<div class="contentContainer">
  <div class="contentText">
    <div class="alert alert-info"><?php echo KUUZU::getDef('text_success'); ?></div>
  </div>

  <div class="pull-right">
    <?php echo HTML::button(KUUZU::getDef('image_button_continue'), 'fa fa-angle-right', KUUZU::link('index.php')); ?>
  </div>
</div>

<?php
  } else {
?>

<?php echo HTML::form('contact_us', KUUZU::link('contact_us.php', 'action=send'), 'post', 'class="form-horizontal"', ['tokenize' => true]); ?>

<div class="contentContainer">
  <div class="contentText">

    <p class="text-danger text-right"><?php echo KUUZU::getDef('form_required_information'); ?></p>
    <div class="clearfix"></div>

    <div class="form-group has-feedback">
      <label for="inputFromName" class="control-label col-sm-3"><?php echo KUUZU::getDef('entry_name'); ?></label>
      <div class="col-sm-9">
        <?php
        echo HTML::inputField('name', NULL, 'required autofocus="autofocus" aria-required="true" id="inputFromName" placeholder="' . KUUZU::getDef('entry_name_text') . '"');
        echo KUUZU::getDef('form_required_input');
        ?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="inputFromEmail" class="control-label col-sm-3"><?php echo KUUZU::getDef('entry_email'); ?></label>
      <div class="col-sm-9">
        <?php
        echo HTML::inputField('email', NULL, 'required aria-required="true" id="inputFromEmail" placeholder="' . KUUZU::getDef('entry_email_address_text') . '"', 'email');
        echo KUUZU::getDef('form_required_input');
        ?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="inputEnquiry" class="control-label col-sm-3"><?php echo KUUZU::getDef('entry_enquiry'); ?></label>
      <div class="col-sm-9">
        <?php
        echo HTML::textareaField('enquiry', 50, 15, NULL, 'required aria-required="true" id="inputEnquiry" placeholder="' . KUUZU::getDef('entry_enquiry_text') . '"');
        echo KUUZU::getDef('form_required_input');
        ?>
      </div>
    </div>
  </div>

  <div class="buttonSet">
    <div class="text-right"><?php echo HTML::button(KUUZU::getDef('image_button_continue'), 'fa fa-send', null, null, 'btn-success'); ?></div>
  </div>
</div>

</form>

<?php
  }

  require($kuuTemplate->getFile('template_bottom.php'));
  require('includes/application_bottom.php');
?>
