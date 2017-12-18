<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $myAddress = test_input($_POST["name"]);
  $destination = test_input($_POST["password"]);
 $_SESSION['myAddress'] = $myAddress;
	$_SESSION['destination'] = $destination;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>UberPack|Route Details</title>
</head>
<body>
   <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Your address:<br>
  <input type="text" name="myPosition" >
  <br>
  Destination:<br>
  <input type="text" name="Destination">
  <br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>