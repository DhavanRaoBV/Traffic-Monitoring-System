<?php  
//index.ph
 ?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Data Insertion</title>  
  <meta content="width=device-width, initial-scale=1.0" name="viewport" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
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
  <br /><br />  <br /> <br /> 
  <div class="container" style="min-height:500px;">
  <br>
  <!-- Responsive Header -->
  <div class="container"> 
  <h2>Enter the Providers details:-</h2>
  <br>
  <br>
  <form method="post" class="form-horizontal" action="save.php">  
    <div class="form-group">
      <label class="col-xs-3 control-label">Enter the User ID:</label>
      <div class="col-xs-8">
        <input type="text" id="USER_ID" name="USER_ID" />       
      </div>
    </div>  
    <div class="form-group">
      <label class="col-xs-3 control-label">Enter the Traffic_Point ID:</label>
      <div class="col-xs-8">
        <input type="text" id="TP_ID" name="TP_ID" data-role="tagsinput"  />        
      </div>
    </div>
    <div class="form-group">
      <label class="col-xs-3 control-label">Enter the Location:</label>
      <div class="col-xs-8">
        <input type="text" id="LOCATION" name="LOCATION" data-role="tagsinput"  />        
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
  <!--<div style="margin:50px 0px 0px 0px;">
    <a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/create-bootstrap-tags-input-with-jquery-php-mysql/">Back</a>    
  </div>-->
</div>
</div>
</body>
  </div>
 </body>  
</html>  