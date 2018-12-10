<?php
session_start();
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | Traffic Monitoring System</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
	  <!--  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
  -->
<style type="text/css">
	container {
  padding: 2em;
}

/* GENERAL BUTTON STYLING */
button,
button::after {
  -webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
  -o-transition: all 0.3s;
	transition: all 0.3s;
}

button {
  background: none;
  border: 3px solid #9d33e3;
  border-radius: 5px;
  color: #ffffff;
  display: block;
  font-size: 1.6em;
  font-weight: bold;
  margin: 1em auto;
  padding: 0em 1.5em;
  position: relative;
  text-transform: uppercase;
}

button::before,
button::after {
  background: #E3E0D3;
  content: '';
  position: absolute;
  z-index: -1;
}

button:hover {
  color: #000000;
}
/* BUTTON 4 */
.btn-4::before {
  height: 100%;
  left: 0;
  top: 0;
  width: 100%;
}

.btn-4::after {
  background: #000000;
  height: 100%;
  left: 0;
  top: 0;
  width: 100%;
}

.btn-4:hover:after {
  height: 0;
  left: 50%;
  top: 50%;
  width: 0;
}
</style>


</head>
<body>
  
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li ><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li class="lg"><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
  </div>
</nav>

 <br><br>
<!--
<div class="container">
<div class="">
 <a href="Insert data to DB\traffic point\index.php" class="btn btn-info" role="button">Provide Traffic Point</a>
</div>
</div>
<br><br>

<div class="container">
<div class="">
  <a href="Delete from DB\traffic point\del_traffic_point.php"" class="btn btn-info" role="button">Remove Traffic Point</a>
</div>
</div>
<br><br>

<div class="container">
<div class="">
  <a href="Insert data to DB\road\index.php"" class="btn btn-info" role="button">Provide Road Details</a>
</div>
</div>
<br><br>

<div class="container">
<div class="">
  <a href="disp_traffic_point_tb.php" class="btn btn-info" role="button">View Traffic Point</a>
</div>
</div>
<br><br>

<div class="container">
<div class="">
  <a href="disp_traffic_point_view.php"" class="btn btn-info" role="button">Monitor User</a>
</div>
</div>
<br><br>
-->
<div class="container">
 <a href="Insert data to DB\traffic point\index.php"> <button class="btn-4">Provide Traffic Point</button></a>
</div>

<div class="container">
 <a href="Delete from DB\traffic point\del_traffic_point.php"> <button class="btn-4">Remove Traffic Point</button></a>
</div>

<div class="container">
 <a href="Insert data to DB\road\index.php"> <button class="btn-4">Provide Road Details</button></a>
</div>

<div class="container">
 <a href="disp_traffic_point_tb.php"> <button class="btn-4">View Traffic Point</button></a>
</div>

<div class="container">
 <a href="disp_traffic_point_view.php"> <button class="btn-4">Monitor User</button></a>
</div>

<script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
</body>
</html>

