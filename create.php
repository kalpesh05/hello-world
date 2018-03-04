<?php
 require_once('./config.php');
print_r($_POST);
// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];

// Create a Customer:
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token,
));

// Charge the Customer instead of the card:
/*$charge = \Stripe\Charge::create(array(
  "amount" => 1000,
  "currency" => "usd",
  "customer" => $customer->id
));*/
$subscription = \Stripe\Subscription::create([
    'customer' => $customer->id,
    'items' => [['plan' => 'Basic']],
]);
// YOUR CODE: Save the customer ID and other info in a database for later.
print_r($subscription);

/*// YOUR CODE (LATER): When it's time to charge the customer again, retrieve the customer ID.
$charge = \Stripe\Charge::create(array(
  "amount" => 1500, // $15.00 this time
  "currency" => "usd",
  "customer" => $customer_id
));*/

?>