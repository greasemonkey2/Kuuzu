<?php
use KUU\ZU\KUUZU;
?>
<div class="col-sm-<?php echo $content_width; ?>">
  <div class="footerbox information">
    <h2><?php echo KUUZU::getDef('module_content_footer_information_heading_title'); ?></h2>
    <ul class="nav nav-pills nav-stacked">
      <li><a href="<?php echo KUUZU::link('shipping.php'); ?>"><?php echo KUUZU::getDef('module_content_footer_information_shipping'); ?></a></li>
      <li><a href="<?php echo KUUZU::link('privacy.php'); ?>"><?php echo KUUZU::getDef('module_content_footer_information_privacy'); ?></a></li>
      <li><a href="<?php echo KUUZU::link('conditions.php'); ?>"><?php echo KUUZU::getDef('module_content_footer_information_conditions'); ?></a></li>
      <li><a href="<?php echo KUUZU::link('contact_us.php'); ?>"><?php echo KUUZU::getDef('module_content_footer_information_contact'); ?></a></li>
    </ul>
  </div>
</div>
