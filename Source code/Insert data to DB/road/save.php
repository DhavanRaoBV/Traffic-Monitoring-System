<?php
$connect = mysqli_connect("localhost", "root", "", "traffic monitoring system");

if(isset($_POST['ROAD_ID']) && isset($_POST['TP_ID']) && isset($_POST['ROAD_LOCATION'])) {
$ROAD_ID = $_POST['ROAD_ID'];
$TP_ID=$_POST['TP_ID'];
$ROAD_LOCATION = $_POST['ROAD_LOCATION'];
$insert_query = "INSERT INTO ROAD (ROAD_ID,TP_ID,ROAD_LOCATION) VALUES ('".$ROAD_ID."', '".$TP_ID."','".$ROAD_LOCATION."')";
mysqli_query($connect, $insert_query) or die("database error: ". mysqli_error($connect));
echo "Your details saved successfully. Thanks!";
} else {
echo "Please Enter your ROAD_ID,TP_ID and ROAD_LOCATION!";
}
?>