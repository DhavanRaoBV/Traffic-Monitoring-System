<!DOCTYPE html>  
<html>  
 <head>  
  <title>Data Insertion</title>  
  <meta content="width=device-width, initial-scale=1.0" name="viewport" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<link rel="stylesheet" href="Home_pg,Login,Sign_Up,Insert/assets/fonts/stylesheet.css">
        <link rel="stylesheet" href="Home_pg,Login,Sign_Up,Insert/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="Home_pg,Login,Sign_Up,Insert/assets/css/style.css">

 </head>  
 <body class=""> 
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Data Entry</a></li>
    </ul>
   <!-- <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>-->
  </div>
</nav>
<br><br><br><br><br><br><br><br><br><br><br><br>
<div class="container" style="min-height:400px;" align="center">
	<strong><big>

<?php
$connect = mysqli_connect("localhost", "root", "", "traffic monitoring system");

if(isset($_POST['TP_ID']) && isset($_POST['STATUS'])) {
$STATUS = $_POST['STATUS'];
$TP_ID = $_POST['TP_ID'];
$insert_query = "INSERT INTO TRAFFIC_POINT (STATUS, TP_ID) VALUES ('".$STATUS."', '".$TP_ID."')";
mysqli_query($connect, $insert_query) or die("database error: ". mysqli_error($connect));
echo "Your details saved successfully. Thanks!";
} else {
echo "Please Enter you STATUS and TP_ID!";
}
?>

</big>
</strong>
</div>
</body>
</html>  