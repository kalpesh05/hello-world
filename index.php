<?php 
include("./database.class.php");
include("./table.class.php");
include("./user.class.php");

$db = database::getinstance();

$db->connect("localhost","user","","test");


$user = new user();

$user->load('1');

print_r($user); 

?>