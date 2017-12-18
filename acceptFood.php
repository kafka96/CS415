<?php
session_start();
if($_SESSION['timedFood'] == true){
	echo "The food will arrive in the time required <br>";
}
else{
	echo "The drive will deliver the food shortly <br>";
	
}
echo "Go home while waiting";
?>
<br>	
<a href="index.php">Go Home</a>

