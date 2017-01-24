<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lord of Zion Divine School | Online Registration</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style type="text/css">				
		
		.logo {
			width: 150px;
		}
		
		.page-divider {
			height: 0;
			box-sizing: content-box;
			border: 0;
			border-top: 1px solid #eee;
		}				
		
		.jumbotron h1 {
			font-size: 50px;
			font-weight: normal;
			color: #424242;			
		}
		
		.jumbotron p {
			font-size: 20px;
			color: #999;			
		}
	
		@media (max-width: 768px) {
			
			.jumbotron {						
				text-align: center;
			}
		
		}

		footer {
			margin-top: 50px;
		}
		
		.powered-by {
			font-size: 11px;
			color: #7c7c7c;
		}
		
		.powered-by .autopilot {
			color: #333;
		}
		
		#register {
			
		}
		
		.reg-msg {
			margin-top: 10px;
			padding: 15px;
			font-size: 13px;
			color: #474747;
		}
	
	</style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://lzds.edu.ph">LZDS</a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/registration">Registration</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php

require_once 'db.php';

$con = new pdo_db("enrollees");
$result = $con->getData("SELECT * FROM enrollees WHERE enrollee_id < ".$_GET['id']." ORDER BY enrollee_id DESC LIMIT 1");
if ($result[0]['enrollee_rn'] == "") {
	$reference = array("enrollee_rn"=>date("y")."001");
} else {
	$reference = array("enrollee_rn"=>$result[0]['enrollee_rn']+1);
}
$con->updateData($reference,array("enrollee_id"=>$_GET['id']));

?>		
<div class="container" style="margin-top: 30px;">
	
	<div class="jumbotron">
	  <img class="logo" src="images/lzds-logo.png">	
	  <h1>Your reference number is <strong><?php echo $reference['enrollee_rn']; ?></strong></h1>
	  <p>Please visit Lord of Zion Divine School office and provide your reference number for the next step</p>
	  <p><a class="btn btn-primary btn-lg" href="http://lzds.edu.ph" role="button">Go back to lzds.edu.ph</a></p>
	</div>	
	
	<hr class="page-divider">
	
	<footer>
	  <p>&copy; 2016 Lord of Zion Divine School |<span class="powered-by"><i> Powered by: </i><span class="autopilot">Sly <i>Autopilot</i> Solutions</span></span></p>
	</footer>

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>	
  </body>
</html>