<?php
session_start();
$timed = $_SESSION['timed'];
	if($timed == true){
		echo "Your driver is going to pick you up at the selected time";
	}
	
	else{
		echo "Your Uber car is going to arrive in 5 minutes 33 seconds";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Uber Pack | Driver Location</title>
</head>
<body>
	<br>
    <a href="../index.php" class="button">Go to Home Page</a>

</body>
</html>