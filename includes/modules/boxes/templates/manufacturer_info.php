<?php
use KUU\ZU\KUUZU;
?>
<div class="panel panel-default">
  <div class="panel-heading"><?php echo KUUZU::getDef('module_boxes_manufacturer_info_box_title'); ?></div>
  <div class="panel-body"><?php echo $manufacturer_info_string; ?></div>
  <div class="panel-footer clearfix"><a href="<?php echo KUUZU::link('index.php', 'manufacturers_id=' . $Qmanufacturer->valueInt('manufacturers_id')); ?>"><?php echo KUUZU::getDef('module_boxes_manufacturer_info_box_other_products'); ?></a></div>
</div>
