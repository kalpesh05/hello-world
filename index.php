<?php 
/*include("./database.class.php");
include("./table.class.php");
include("./user.class.php");

$db = database::getinstance();

$db->connect("localhost","user","","test");


$user = new user();

$user->load('1');

print_r($user); 

*/?>
<html>
<head>
	<title>DEMO APP</title>
	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="jquery.redirect.js"></script>
</head>
<body>
	<div>
		<table id="tbl" name="datatable" border="1">
			<tr>	
				<td> Table Name </td>
				<td><input type="text" name="table" id="tablename"></td>
			</tr>
			<tr>
				<td>Field1</td>
				<td><input type="text" class="key" name="cname"></td>
				<td><input type="text" id="field1" name="cname"></td>
			</tr>
			<tr>
				<td>Field2</td>
				<td><input type="text" class="key" name="cname"></td>
				<td><input type="text" id="field2" name="cname"></td>
			</tr>			
			<tr>
				<td>Field3</td>
				<td><input type="text" class="key" name="cname"></td>
				<td><input type="text" id="field3" name="cname"></td>
			</tr>
			<tr>
				<td><button id="submitbtn" onclick="submitdata()">Create</button></td>
				<td><button id="submitbtn" onclick="updatesingle()">Update</button></td>
				<td><button id="editbtn" data-id="dgadsg" data-session="kgdfk" data-bundle="sdsdg" onclick="edit()">Edit</button></td>
			</tr>
		</table>
	</div>
	
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyA2zdW-h07LQUZLVmcbkc46RONPz23UzDE",
    authDomain: "onesignal-44991.firebaseapp.com",
    databaseURL: "https://onesignal-44991.firebaseio.com",
    projectId: "onesignal-44991",
    storageBucket: "onesignal-44991.appspot.com",
    messagingSenderId: "1089209754756"
  };
  firebase.initializeApp(config);
</script>
<script src="init.js">
</script>
</body>
</html>