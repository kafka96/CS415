<?php
session_start();
$myAddress = "Bilkent Universitesi Ankara";
$destination = $_SESSION['destination'];
function get_coordinates($myAddress)
{
    $address = urlencode($myAddress);
    $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Turkey";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    //print_r($response);
    curl_close($ch);
    $response_a = json_decode($response);
    $status = $response_a->status;
    //echo $status;
    if ( $status == 'ZERO_RESULTS' )
    {
        return FALSE;
    }
    else
    {
        $return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng);
        //print_r($return);
        return $return;
    }
}

function GetDrivingDistance($myAddress, $destination)
{
    $c1 = get_coordinates($myAddress);
    $c2 = get_coordinates($destination);
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$c1['lat'].",".$c1['long']."&destinations=".$c2['lat'].",".$c2['long']."&mode=driving";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    
   // print_r($response_a);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

    return array('distance' => $dist, 'time' => $time);
}

    
    $dist = GetDrivingDistance($myAddress,$destination);
    echo 'Distance: <b>'.$dist['distance'].'</b><br>Travel time duration: <b>'.$dist['time'].'</b>';
    $_SESSION['distance'] = $dist['distance'];
    $_SESSION['time'] = $dist['time'];
    $priceperkm = $_SESSION['price'];
    echo "<br>";
    echo "Cost of the trip is ".$priceperkm * $dist['distance']. " TL";
    echo "<br>";
    echo " A driver was found. Do you accept the trip?";
    //session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Uber Pack | Distance Calculator</title>
</head>
<body>
    <br>
    <a href="accept.php" class="button">Accept</a>
    <a href="../index.php" class="button">Deny</a>


</body>
</html>