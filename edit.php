<?php 
//echo $_POST['sid'];	
echo $_POST['sess'];	
echo $_POST['bundle'];	
?>

<!doctype html5>
<html>
	<head>
	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
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
		<script type="text/javascript" src="init.js"></script>
	</head>
	<body>	
		<table border=1>
			
			<tr>
				<td> ID </td>
				<td> SESSION </td>
				<td> Bundle </td>
			</tr>
			<tr>
				<td id="ID"></td>
				<td id="sess"></td>
				<td id="bnd"></td>
			</tr>
		</table>
	</body>
</html>