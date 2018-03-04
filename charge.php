<?php

require_once('config.php');
//\Stripe\Stripe::setApiKey('____YOUR_STRIPE_SECRET_KEY____');
$token = $_POST['stripeToken'];
// Create a Customer
$customer = \Stripe\Customer::create(array(
    "email" => "paying.user@example.com",
    "source" => $token,
));
/*
$subscription = \Stripe\Plan::create(array(
    "product" => "prod_CQXNVwWdPse8In",
	"amount" => 4000,
    "interval" => "month",
    "nickname" => "Platinum large",
    "currency" => "cad",
    "id" => "platinum"
));*/
// Subscribe the customer to the plan
$subscription = \Stripe\Subscription::create(array(
    "customer" => $customer->id,
    "plan" => "gold"
));
print_r($subscription);

?>