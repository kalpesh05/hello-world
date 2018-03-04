<?php require_once('./config.php'); 

$plan = \Stripe\Plan::all(array("limit" => 3));


?>

<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="5000"
          data-locale="auto"></script>
</form>
</br>
<?php 
foreach($plan['data'] as $k=>$v)
{?>
	

<form action="createSub.php" method="post" class="sub">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-name="<?php echo $v['id'];?>"
          data-description="<?php echo $v['nickname'];?>"
          data-amount="<?php echo $v['amount'];?>"
		  data-label="Sign Me up!"
          data-allow-remember-me="false"></script>
	<input type="hidden" name="plan" value="<?php echo $v['id'];?>">
	<input type="hidden" name="price" value="<?php echo $v['amount'];?>">
</form>
<?php
}?>
