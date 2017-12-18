<?php
session_start();
if($_SESSION['timed'] == true){
	echo "The driver will pickup the package in the time specified <br>";
}
else{
	echo "The driver is coming to pickup the package <br>";
	
}
echo "Go home while waiting";
?>
<br>	
<a href="index.php">Go Home</a>