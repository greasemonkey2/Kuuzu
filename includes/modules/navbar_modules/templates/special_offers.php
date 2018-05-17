<?php
// in a template so that shopowners
// don't have to change the main file!

use KUU\ZU\KUUZU;
?>

<?=
  KUUZU::getDef('module_navbar_special_offers_public_text', [
    'specials_url' => KUUZU::link('specials.php')
  ]);
?>
