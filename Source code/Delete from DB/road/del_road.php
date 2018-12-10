<!DOCTYPE html>
<html>
<head>
<title>Delete Road</title>
<meta content="noindex, nofollow" name="robot">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Delete a Road</h2>
</div>
<div class="divB">
<div class="divD">
<p>Choose the Road to be deleted</p>
<?php
$connection = mysqli_connect("localhost", "root", "", "traffic monitoring system") or die("Error " . mysqli_error($connection)); // Eastablishing Connection With Server.
//$db = mysqli_select_connection($connection,"traffic monitoring system"); // Selecting Database From Server.
if (isset($_GET['usr_id'])) {
$usr_id = $_GET['usr_id'];
//SQL query for usr_idetion.
$query1 = mysqli_query($connection,"delete from ROAD where id=$usr_id");
}
$query = mysqli_query( $connection,"select * from ROAD"); // SQL query to fetch data to display in menu.
while ($row = mysqli_fetch_array($query)) {
echo "<b><a href=\"del_road.php?uid={$row['id']}\">{$row['ROAD_ID']}</a></b>";
echo "<br />";
}
?>
</div><?php
if (isset($_GET['uid'])) {
$id = $_GET['uid'];
// SQL query to Display Details.
$query1 = mysqli_query( $connection,"select * from ROAD where id=$id");
while ($row1 = mysqli_fetch_array($query1)) {
?>
<form class="form">
<h2>Details of <?php echo $row1['ROAD_ID']; ?></h2>
<span><big>Traffic Point ID:</big></span> <div align="center"><?php echo $row1['ROAD_ID']; ?></div><br>
<span><big>ROAD_LOCATION:</big></span><div align="center"> <?php echo $row1['ROAD_LOCATION']; ?></div><br>
<!--<span>Contact No:</span> <?php echo $row1['USER_contact']; ?>
<span>Address:</span> <?php echo $row1['USER_address']; ?>-->
<?php echo "<b><a href=\"del_road.php?usr_id={$row1['id']}\"><input type=\"button\" class=\"submit\" value=\"Delete\"/></a></b>"; ?>
</form><?php
}
}
// Closing Connection with Server.
mysqli_close($connection);
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</body>
</html>