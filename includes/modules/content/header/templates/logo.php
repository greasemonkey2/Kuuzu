<?php
use KUU\ZU\HTML;
use KUU\ZU\KUUZU;
?>
<div id="storeLogo" class="col-sm-<?php echo $content_width; ?> storeLogo">
  <?php echo '<a href="' . KUUZU::link('index.php') . '">' . HTML::image(KUUZU::linkImage(STORE_LOGO), STORE_NAME) . '</a>'; ?>
</div>

