<?php
session_start();
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Traffic Monitoring System</title>
    <meta charset="utf-8"> <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
     <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="assets/fonts/stylesheet.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    <style>
    body
    {
        margin: 0;
        text-align: center;
    }
    
    h2
    {
        font: bold 1.4em 'Lucida sans', 'Trebuchet MS', Tahoma, Arial;
        color: #555;
    }
    
    .button
    {        
        display: inline-block;
        white-space: nowrap;
        background-color: #ddd;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#eee), to(#ccc));
        background-image: -webkit-linear-gradient(top, #eee, #ccc);
        background-image: -moz-linear-gradient(top, #eee, #ccc);
        background-image: -ms-linear-gradient(top, #eee, #ccc);
        background-image: -o-linear-gradient(top, #eee, #ccc);
        background-image: linear-gradient(top, #eee, #ccc);
        border: 1px solid #777;
        padding: 0 1.5em;
        margin: 0.5em;
        font: bold 1em/2em Arial, Helvetica;
        text-decoration: none;
        color: #333;
        text-shadow: 0 1px 0 rgba(255,255,255,.8);
        -moz-border-radius: .2em;
        -webkit-border-radius: .2em;
        border-radius: .2em;
        -moz-box-shadow: 0 0 1px 1px rgba(255,255,255,.8) inset, 0 1px 0 rgba(0,0,0,.3);
        -webkit-box-shadow: 0 0 1px 1px rgba(255,255,255,.8) inset, 0 1px 0 rgba(0,0,0,.3);
        box-shadow: 0 0 1px 1px rgba(255,255,255,.8) inset, 0 1px 0 rgba(0,0,0,.3);
    }
    
    .button:hover
    {
        background-color: #eee;        
        background-image: -webkit-gradient(linear, left top, left bottom, from(#fafafa), to(#ddd));
        background-image: -webkit-linear-gradient(top, #fafafa, #ddd);
        background-image: -moz-linear-gradient(top, #fafafa, #ddd);
        background-image: -ms-linear-gradient(top, #fafafa, #ddd);
        background-image: -o-linear-gradient(top, #fafafa, #ddd);
        background-image: linear-gradient(top, #fafafa, #ddd);
    }
    
    .button:active
    {
        -moz-box-shadow: 0 0 4px 2px rgba(0,0,0,.3) inset;
        -webkit-box-shadow: 0 0 4px 2px rgba(0,0,0,.3) inset;
        box-shadow: 0 0 4px 2px rgba(0,0,0,.3) inset;
        position: relative;
        top: 1px;
    }
    
    .button:focus
    {
        outline: 0;
        background: #fafafa;
    }    
    
    .button:before
    {
        background: #ccc;
        background: rgba(0,0,0,.1);
        float: left;        
        width: 1em;
        text-align: center;
        font-size: 1.5em;
        margin: 0 1em 0 -1em;
        padding: 0 .2em;
        -moz-box-shadow: 1px 0 0 rgba(0,0,0,.5), 2px 0 0 rgba(255,255,255,.5);
        -webkit-box-shadow: 1px 0 0 rgba(0,0,0,.5), 2px 0 0 rgba(255,255,255,.5);
        box-shadow: 1px 0 0 rgba(0,0,0,.5), 2px 0 0 rgba(255,255,255,.5);
        -moz-border-radius: .15em 0 0 .15em;
        -webkit-border-radius: .15em 0 0 .15em;
        border-radius: .15em 0 0 .15em;     
        pointer-events: none;		
    }
	
	/* Buttons and inputs */
	
	button.button, input.button 
	{ 
		cursor: pointer;
		overflow: visible; /* removes extra side spacing in IE */
	}
	
	/* removes extra inner spacing in Firefox */
	button::-moz-focus-inner 
	{
	  border: 0;
	  padding: 0;
	}
	
	/* If line-height can't be modified, then fix Firefox spacing with padding */
	 input::-moz-focus-inner 
	{
	  padding: .4em;
	}

	/* The disabled styles */
	.button[disabled], .button[disabled]:hover, .button.disabled, .button.disabled:hover 
	{
		background: #eee;
		color: #aaa;
		border-color: #aaa;
		cursor: default;
		text-shadow: none;
		position: static;
		-moz-box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: none;		
	}
    
    /* Hexadecimal entities for the icons */
    
    .add:before
    {
        content: "\271A";
    }
    
    .edit:before
    {
        content: "\270E";        
    }
    
    .delete:before
    {
        content: "\2718";        
    }
    
    .save:before
    {
        content: "\2714";        
    }
    
    .email:before
    {
        content: "\2709";        
    }
    
    .like:before
    {
        content: "\2764";        
    }
    
    .next:before
    {
        content: "\279C";
    }
    
    .star:before
    {
        content: "\2605";
    }
    
    .spark:before
    {
        content: "\2737";
    }
    
    .play:before
    {
        content: "\25B6";
    }

 </style>
</head>
<body>
    <div class='preloader'><div class='loaded'>&nbsp;</div></div>
      <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['usr_id'])) { ?>
                <li class="active"><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
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
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>
<!--<a href="Insert data to DB\user\index.php" class="button">User Table</a>-->
<a href="Insert data to DB\traffic point\index.php" class="button">Traffic_Point Table</a>
<a href="Insert data to DB\road\index.php" class="button">Road Table</a>
<a href="Insert data to DB\traffic point view\index.php" class="button">Traffic_Point_View Table</a>
<a href="Insert data to DB\provide\index.php" class="button">Provide Table</a>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
</body>
</html>
