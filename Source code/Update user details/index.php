<?php 
include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM USER WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$USER_ID = $n['USER_ID'];
		    $email = $n['email'];
			$password = $n['password'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update User details </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Update my details</a></li>
    </ul>
  </div>
</nav>
  <br /><br />  <br /> <br /> 

	<?php if (isset($_SESSION['message'])): ?>
		<div class="container" align="center">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM USER"); ?>
<br><br>
	<table class="data-table">
	<thead>
		<tr>
			<th>Name</th>
			<th>User ID</th>
			<th>Email</th>
			<th>Password</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['USER_ID']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td align="center">
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" X >Edit</a>
			</td>
		</tr>
	<?php } ?>
</table>
<br><br>
<div class="container" style="min-height:300px;" >
<form method="post" class="form-horizontal" action="server.php">  
		<input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
      <label class="col-xs-3 control-label">Name:</label>
      <div class="col-xs-8">
        <input type="text" name="name" value="<?php echo $name; ?>">
        </div>
    </div>  
     <div class="form-group">
      <label class="col-xs-3 control-label">User ID:</label>
      <div class="col-xs-8">
        <input type="text" name="USER_ID" value="<?php echo $USER_ID; ?>">  
      </div>
    </div>  
    <div class="form-group">
      <label class="col-xs-3 control-label">Email:</label>
      <div class="col-xs-8">
       <input type="email" name="email" value="<?php echo $email; ?>">     
      </div>
    </div>
    <div class="form-group">
      <label class="col-xs-3 control-label">Password:</label>
      <div class="col-xs-8">
       <input type="password" name="password" value="<?php echo $password; ?>"> 
      </div>
    </div>
    <div class="form-group">
      <label class="col-xs-3 control-label"></label>    
         <div class="col-xs-8">
		    <?php if ($update == true): ?>
			  <input type="submit" class="btn btn-success" name="update" value="Update"/>
			<?php else: ?>
			<?php endif ?>
	</div>  
	</div>    
  </form> 
</div>
</body>
</html>