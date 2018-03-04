<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_HvfjugkLAXbZiLIdmDpq6k1O",
  "publishable_key" => "pk_test_wSDNPdQ10goBpoAmO3Jj5OT0"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
