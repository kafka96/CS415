<?php
include 'time.php';

session_start();
	$_SESSION['timed'] = true;
	$_SESSION['pricep'] = 2.5;
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//get the input from the user
	  	$destination = test_input($_POST['username']);
	  	$_SESSION['destination'] = $destination;
	  	header("Location:test.php");
	  	exit;
	 }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<form method = "post">
		Enter the destination you want to deliver the package<input type="text" name="username" >
  		<br>
  		<input type="submit" value="Lets Go!">     
	</form>
</body>
</html>