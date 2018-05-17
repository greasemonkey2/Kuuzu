<?php
// in a template so that shopowners
// don't have to change the main file!

use KUU\ZU\KUUZU;
?>

<?=
  KUUZU::getDef('module_navbar_new_products_public_text', [
    'new_products_url' => KUUZU::link('products_new.php')
  ]);
?>
