<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'traffic monitoring system');
	// initialize variables
	$name = "";
	$USER_ID = "";
	$email="";
	$password="";
	$id = 0;
	$update = false;
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$USER_ID = $_POST['USER_ID'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		mysqli_query($db, "UPDATE USER SET name='$name', USER_ID='$USER_ID',email='$email',password='$password' WHERE id=$id");
		$_SESSION['message'] = "User details updated!!"; 
		header('location: index.php');
	}
	$results = mysqli_query($db, "SELECT * FROM USER");
?>