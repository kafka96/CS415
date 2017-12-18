<?php
  session_start();
  $foodPrice = 18;
  $totalCost = 4.3 * 1.4 + 18.6;
  $_SESSION['food'] = true;
  if($_SESSION['timedFood'] == true){
      include 'time.php';

  }
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
	<title>Trip</title>
</head>
<body>
 <div class ="container">
 <div class="col-sm-4">
        <p>The food costs <?php echo $foodPrice; ?> TL. Transportation costs <?php echo $totalCost;?> TL.</p>

      <h3><a href="acceptFood.php">Accept</a><br></h3>
      <p></p>
      <p>If you press this button, than you fullfill your order and the price will be cut from your credit card connected to UberPack </p>
      <p> </p>
    </div>
    <div class="col-sm-4">
      <h3><a href="index.php">Cancel</a></h3>        
      <p>Need a second thought?</p>
      <p>Meanwhile you can check our other services 	</p>
    </div>
 </div>   

</body>
</html>