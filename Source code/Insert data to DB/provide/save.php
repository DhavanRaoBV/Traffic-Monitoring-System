<?php
$connect = mysqli_connect("localhost", "root", "", "traffic monitoring system");

if(isset($_POST['USER_ID']) && isset($_POST['TP_ID']) && isset($_POST['LOCATION'])) {
$USER_ID = $_POST['USER_ID'];
$TP_ID = $_POST['TP_ID'];
$LOCATION = $_POST['LOCATION'];
$insert_query = "INSERT INTO PROVIDE (USER_ID, TP_ID,LOCATION) VALUES ('".$USER_ID."', '".$TP_ID."','".$LOCATION."')";
mysqli_query($connect, $insert_query) or die("database error: ". mysqli_error($connect));
echo "Your details saved successfully. Thanks!";
} else {
echo "Please Enter your USER_ID and TP_ID!";
}
?>