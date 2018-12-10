<?php

$connect = mysqli_connect("localhost", "root", "", "traffic monitoring system");
$sql = 'SELECT TP_ID,ROAD_LOCATION FROM road';
		
$query = mysqli_query($connect, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($connect));
}

?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Data Insertion</title>  
  <meta content="width=device-width, initial-scale=1.0" name="viewport" >
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
			font-size: 13px;
			min-width: 380px;
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
 <body class=""> 
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Data Entry</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>
  <br />
 
  
<div align="center">
<h4>Traffic Point ID corresponding to the Traffic Points</h4>
	<table class="data-table">
		<thead>
			<tr>
				<th>NO</th>
				<th>TP_ID</th>
				<th>Traffic Point</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['TP_ID'].'</td>
					<td>'.$row['ROAD_LOCATION'].'</td>	
				</tr>';
			$no++;
		}?>
		</tbody>
	</table>
</div>
  <!-- Responsive Header -->
  <div class="container"> 
  <h4>Select the Traffic Point ID from the table to view the Traffic Point details:-</h4>
  <br>
  
  <form method="post" class="form-horizontal" action="save.php">  
    <div class="form-group">
      <label class="col-xs-3 control-label">Enter the User ID:</label>
      <div class="col-xs-8">
        <input type="text" id="USER_ID" name="USER_ID" />       
      </div>
    </div>  
    <div class="form-group">
      <label class="col-xs-3 control-label">Enter the Traffic Point ID:</label>
      <div class="col-xs-8">
        <input type="text" id="TP_ID" name="TP_ID" data-role="tagsinput"  />        
      </div>
    </div>
    <div class="form-group">  
      <label class="col-xs-3 control-label"></label>    
      <div class="col-xs-8">
       <input type="submit" class="btn btn-success" name="submit" value="Submit"/>
      </div>
    </div>      
  </form> 
  <br>
  <br>
</div>


</body>
  </div>
 </body>  
</html>  