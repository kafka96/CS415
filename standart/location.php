<?php
session_start();
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
		Enter the destination you want to go to<input type="text" name="username" >
  		<br>
  		<input type="submit" value="Lets Go!">     
	</form>
</body>
</html>