<?php
	session_start();
	$_SESSION['timedFood'] = false;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center><h2>Welcome to UberPack Standard Eat Service. Check the restaurants list.</h2></center>
	<?php include 'restaurant.php'; ?>
</body>
</html>