<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lord of Zion Divine School | Student Profile</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style type="text/css">

		body {						
			background-color: #fff;
		}
		
		#register {
			padding: 25px 35px 60px 35px;
			border-radius: 5px;
			background-color: #f2f6ff;
			border: 1px solid #bad1ff;
		}
	
		header {
			overflow: auto;
			1px solid #ddd;
		}
		
		header img, header .in-header {
			float: left;
		}
		
		.in-header {
			box-sizing: content-box;
			padding-top: 25px;
			padding-left: 15px;
		}
		
		header h1 {
			font-size: 50px;
			font-weight: normal;
			color: #424242;
		}
		
		header p {
			font-size: 20px;
			color: #999;
		}
		
		.logo {
			width: 150px;
		}
		
		.page-divider {
			height: 0;
			box-sizing: content-box;
			border: 0;
			border-top: 1px solid #eee;
		}		
	
		@media (max-width: 768px) {
			
			header {
				text-align: center;
			}
			
			header img, header .in-header {
				float: none;
			}
			
			.in-header {
				box-sizing: content-box;
				padding-top: 0;
				padding-left: 0;
			}

			header h1 {
				font-size: 40px;
				font-weight: normal;
				color: #424242;
			}
			
			header p {
				font-size: 15px;
				color: #999;
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
			color: #c69191;
		}
	
		div.growlUI h1, div.growlUI h2 {
			color: white;
			padding: 0 5px 0 50px;
			text-align: left;
			font-size: 16px !important;
		}
		
		div.growlUI h2 {
			padding-bottom: 15px;
		}
		
		.copy-infos a {
			font-size: 12px;
		}
	
	</style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src="js/angular.js/angular.min.js"></script>	
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
        <li class="active"><a href="/registration/student-profile.php?eid=<?php echo $_GET['eid']; ?>">Student Profile</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		
<div class="container">

	<header>
		<img class="logo" src="images/lzds-logo.png">
		<div class="in-header">
		  <h1>Student Profile</h1>
		</div>
	</header>
	
	<hr class="page-divider">	
	
	<main ng-app="regApp" ng-controller="regAppCtrl">
		<div class="row" style="margin-bottom: 20px;">
		  <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
			<form name="register" id="register" novalidate>

			<div class="form-group">
			    <label class="radio-inline">
			      <input type="radio" name="enrollee_stat" id="enrollee_stat_0" value="0" ng-model="reg.enrollee_stat" ng-required="!reg.enrollee_stat" ng-click="checkIfTransferee()"> Old Student
			    </label>
			    <label class="radio-inline">
			      <input type="radio" name="enrollee_stat" id="enrollee_stat_1" value="1" ng-model="reg.enrollee_stat" ng-required="!reg.enrollee_stat" ng-click="checkIfTransferee()"> New Student
			    </label>
			    <label class="radio-inline">
			      <input type="radio" name="enrollee_stat" id="enrollee_stat_2" value="2" ng-model="reg.enrollee_stat" ng-required="!reg.enrollee_stat" ng-click="checkIfTransferee()"> Transferee
			    </label>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_stat">Please let us know whether you're an old, new or transferee student</p>
			</div>
			<div class="form-group" ng-show="isTransferee">
				<label for="">Public/Private</label>
				<select name="enrollee_old_school_type" id="enrollee_old_school_type" class="form-control" ng-model="reg.enrollee_old_school_type" required>
				<option value="Public">Public</option>
				<option value="Private">Private</option>
				</select>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_old_school_type">Please select public or private</p>				
			</div>
			<div class="form-group" ng-show="isTransferee">
				<label for="enrollee_old_school_name">School</label>
				<input type="text" class="form-control" name="enrollee_old_school_name" id="enrollee_old_school_name" placeholder="School" ng-model="reg.enrollee_old_school_name" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_old_school_name">Please fill out school</p>				
			</div>
			<div class="form-group">
				<label for="enrollee_grade">Grade/Level</label>
			    <select name="enrollee_grade" id="enrollee_grade" class="form-control">
					<option value="101">Nursery</option>
					<option value="102">Kindergarten</option>
					<option value="1">Grade 1</option>
					<option value="2">Grade 2</option>
					<option value="3">Grade 3</option>
					<option value="4">Grade 4</option>
					<option value="5">Grade 5</option>
					<option value="6">Grade 6</option>
					<option value="7">Grade 7</option>
					<option value="8">Grade 8</option>
					<option value="9">Grade 9</option>
					<option value="10">Grade 10</option>
					<option value="11">Grade 11</option>
					<option value="12">Grade 12</option>
			    </select>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_grade">Please select Grade/Level</p>				
			</div>

			<div class="panel panel-info">
			  <div class="panel-heading">
				<h3 class="panel-title">Student</h3>
			  </div>
			<div class="panel-body">			
			<div class="form-group">
				<label for="enrollee_lname">Last name</label>
				<input type="text" class="form-control" name="enrollee_lname" id="enrollee_lname" placeholder="Last name" ng-model="reg.enrollee_lname" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_lname">Please fill out Last name</p>
			</div>
			<div class="form-group">
				<label for="enrollee_fname">First name</label>
				<input type="text" class="form-control" name="enrollee_fname" id="enrollee_fname" placeholder="First name" ng-model="reg.enrollee_fname" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_fname">Please fill out First name</p>				
			</div>
			<div class="form-group">
				<label for="enrollee_mname">Middle name</label>
				<input type="text" class="form-control" name="enrollee_mname" id="enrollee_mname" placeholder="Middle name" ng-model="reg.enrollee_mname" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_mname">Please fill out Middle name</p>
			</div>			
			  <div class="form-group">
				<label for="">Gender&nbsp;&nbsp;</label>
			    <label class="radio-inline">
			      <input type="radio" name="enrollee_sex" id="enrollee_sex_male" value="Male" ng-model="reg.enrollee_sex" ng-required="!reg.enrollee_sex"> Male
			    </label>
			    <label class="radio-inline">
			      <input type="radio" name="enrollee_sex" id="enrollee_sex_female" value="Female" ng-model="reg.enrollee_sex" ng-required="!reg.enrollee_sex"> Female
			    </label>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_sex">Please select gender</p>				
			  </div>
			  <div class="form-group">
				<label for="enrollee_address">Home Address</label>
				<input type="text" class="form-control" name="enrollee_address" id="enrollee_address" placeholder="Home Address" ng-model="reg.enrollee_address" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_address">Please enter Home Address</p>		
			  </div>
			  <div class="form-group">
				<label for="enrollee_dob">Date of Birth</label>
				<input type="text" class="form-control" name="enrollee_dob" id="enrollee_dob" placeholder="mm/dd/yyyy" ng-model="reg.enrollee_dob" ng-pattern="/^((\d{4})-(\d{2})-(\d{2})|(\d{2})\/(\d{2})\/(\d{4}))$/" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_dob">Please enter a valid Date of Birth</p>				
			  </div>
			  <div class="form-group">
				<label for="enrollee_pob">Place of Birth</label>
				<input type="text" class="form-control" name="enrollee_pob" id="enrollee_pob" placeholder="Place of Birth" ng-model="reg.enrollee_pob" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_pob">Please enter Place of Birth</p>
			  </div>
			  <div class="form-group">
				<label for="enrollee_religion">Religion</label>
				<input type="text" class="form-control" name="enrollee_religion" id="enrollee_religion" placeholder="Religion" ng-model="reg.enrollee_religion" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_religion">Please enter Religion</p>
			  </div>			  
			  <div class="form-group">
				<label for="enrollee_contact">Contact No.</label>
				<input type="text" class="form-control" name="enrollee_contact" id="enrollee_contact" placeholder="Contact No." ng-model="reg.enrollee_contact" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_contact">Please enter Contact No.</p>			
			  </div>
			  <div class="form-group">
				<label for="enrollee_email">Email</label>
				<input type="email" class="form-control" name="enrollee_email" id="enrollee_email" placeholder="Email" ng-model="reg.enrollee_email" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_email">Please enter a valid Email</p>				
			  </div>
			  <div class="form-group">
				<label for="enrollee_lrn">LRN</label>
				<input type="text" class="form-control" name="enrollee_lrn" id="enrollee_lrn" placeholder="Learner's reference number (DEPED)" ng-model="reg.enrollee_lrn" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_lrn">Please enter LRN</p>				
			  </div>			  
			</div>
			</div>			  
			
			<div class="panel panel-info">
			  <div class="panel-heading">
				<h3 class="panel-title">Father</h3>
			  </div>
			<div class="panel-body">			
			  <div class="form-group">
				<label for="enrollee_father_lastname">Last name</label>
				<input type="text" class="form-control" name="enrollee_father_lastname" id="enrollee_father_lastname" placeholder="Father's Last name" ng-model="reg.enrollee_father_lastname" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_father_lastname">Please enter Father's Last name</p>		
			  </div>
			  <div class="form-group">
				<label for="enrollee_father_firstname">First name</label>
				<input type="text" class="form-control" name="enrollee_father_firstname" id="enrollee_father_firstname" placeholder="Father's First name" ng-model="reg.enrollee_father_firstname" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_father_firstname">Please enter Father's First name</p>		
			  </div>
			  <div class="form-group">
				<label for="enrollee_father_middlename">Middle name</label>
				<input type="text" class="form-control" name="enrollee_father_middlename" id="enrollee_father_middlename" placeholder="Father's Middle name" ng-model="reg.enrollee_father_middlename">	
			  </div>
			  <div class="form-group">
				<label for="enrollee_father_extname">Ext name</label>
				<input type="text" class="form-control" name="enrollee_father_extname" id="enrollee_father_extname" placeholder="Father's Ext name" ng-model="reg.enrollee_father_extname">	
			  </div>			  
			  <div class="form-group">
				<label for="enrollee_father_job">Occupation</label>
				<input type="text" class="form-control" name="enrollee_father_job" id="enrollee_father_job" placeholder="Occupation" ng-model="reg.enrollee_father_job" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_father_job">Please enter Father's Occupation</p>
			  </div>
			  <div class="form-group">
				<label for="enrollee_father_income">Monthly income</label>
				<input type="text" class="form-control" name="enrollee_father_income" id="enrollee_father_income" placeholder="Monthly income" ng-model="reg.enrollee_father_income" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_father_income">Please enter monthly income</p>
			  </div>			  
			</div>
			</div>
			
			<div class="panel panel-info">
			  <div class="panel-heading">
				<h3 class="panel-title">Mother's maiden name</h3>
			  </div>
			<div class="panel-body">
			
		    <div class="form-group">
			  <label for="enrollee_mother_lastname">Last name</label>
			  <input type="text" class="form-control" name="enrollee_mother_lastname" id="enrollee_mother_lastname" placeholder="Mother's Last name" ng-model="reg.enrollee_mother_lastname" required>
			  <p class="bg-danger reg-msg" ng-show="validate_enrollee_mother_lastname">Please enter Mother's Last name</p>
		    </div>
		    <div class="form-group">
			  <label for="enrollee_mother_firstname">First name</label>
			  <input type="text" class="form-control" name="enrollee_mother_firstname" id="enrollee_mother_firstname" placeholder="Mother's First name" ng-model="reg.enrollee_mother_firstname" required>
			  <p class="bg-danger reg-msg" ng-show="validate_enrollee_mother_firstname">Please enter Mother's First name</p>
		    </div>
		    <div class="form-group">
			  <label for="enrollee_mother_middlename">Middle name</label>
			  <input type="text" class="form-control" name="enrollee_mother_middlename" id="enrollee_mother_middlename" placeholder="Mother's Middle name" ng-model="reg.enrollee_mother_middlename">
		    </div>
		    <div class="form-group">
			  <label for="enrollee_mother_extname">Ext name</label>
			  <input type="text" class="form-control" name="enrollee_mother_extname" id="enrollee_mother_extname" placeholder="Mother's Ext name" ng-model="reg.enrollee_mother_extname">	
		    </div>			
		    <div class="form-group">
			  <label for="enrollee_mother_job">Occupation</label>
			  <input type="text" class="form-control" name="enrollee_mother_job" id="enrollee_mother_job" placeholder="Occupation" ng-model="reg.enrollee_mother_job" required>
			  <p class="bg-danger reg-msg" ng-show="validate_enrollee_mother_job">Please enter Mother's Occupation</p>
		    </div>
		    <div class="form-group">
			  <label for="enrollee_mother_income">Monthly income</label>
			  <input type="text" class="form-control" name="enrollee_mother_income" id="enrollee_mother_income" placeholder="Monthly income" ng-model="reg.enrollee_mother_income" required>
			  <p class="bg-danger reg-msg" ng-show="validate_enrollee_mother_income">Please enter monthly income</p>
		    </div>			
			
			</div>
			</div>
			
			<div class="panel panel-info">
			  <div class="panel-heading">
				<h3 class="panel-title">Guardian</h3>
			  </div>
			<div class="panel-body">
			  <!--<div class="form-group copy-infos">
			    <a href="javascript:;" ng-click="copyFatherInfo()">Copy Father's Info</a> | <a href="javascript:;" href="#" ng-click="copyMotherInfo()">Copy Mother's Info</a>
			  </div>-->
			  <div class="form-group">
				<label for="enrollee_guardian_lastname">Last name</label>
				<input type="text" class="form-control" name="enrollee_guardian_lastname" id="enrollee_guardian_lastname" placeholder="Guardian's Last name" ng-model="reg.enrollee_guardian_lastname" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_guardian_lastname">Please enter Guardian's Last name</p>				
			  </div>
			  <div class="form-group">
				<label for="enrollee_guardian_firstname">First name</label>
				<input type="text" class="form-control" name="enrollee_guardian_firstname" id="enrollee_guardian_firstname" placeholder="Guardian's First name" ng-model="reg.enrollee_guardian_firstname" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_guardian_firstname">Please enter Guardian's First name</p>				
			  </div>
			  <div class="form-group">
				<label for="enrollee_guardian_middlename">Middle name</label>
				<input type="text" class="form-control" name="enrollee_guardian_middlename" id="enrollee_guardian_middlename" placeholder="Guardian's Middle name" ng-model="reg.enrollee_guardian_middlename">			
			  </div>
			  <div class="form-group">
				<label for="enrollee_guardian_extname">Ext name</label>
				<input type="text" class="form-control" name="enrollee_guardian_extname" id="enrollee_guardian_extname" placeholder="Guardian's Ext name" ng-model="reg.enrollee_guardian_extname">			
			  </div>			  
			  <div class="form-group">
				<label for="enrollee_guardian_job">Occupation</label>
				<input type="text" class="form-control" name="enrollee_guardian_job" id="enrollee_guardian_job" placeholder="Occupation" ng-model="reg.enrollee_guardian_job" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_guardian_job">Please enter Guardian's Occupation</p>
			  </div>
			  <div class="form-group">
				<label for="enrollee_guardian_income">Monthly income</label>
				<input type="text" class="form-control" name="enrollee_guardian_income" id="enrollee_guardian_income" placeholder="Occupation" ng-model="reg.enrollee_guardian_income" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_guardian_income">Please enter monthly income</p>
			  </div>			  
			</div>
			</div>
			
			<div class="panel panel-info">
			  <div class="panel-heading">
				<h3 class="panel-title">Sibling(s)</h3>
			  </div>
			<div class="panel-body">
			  <label for="enrollee_no_siblings">No. of sibling(s)</label>
			  <select name="enrollee_no_siblings" id="enrollee_no_siblings" class="form-control">
			    <option value="1">1</option>
			    <option value="2">2</option>
			    <option value="3">3</option>
			    <option value="4">4</option>
			    <option value="5">5</option>
			    <option value="6">6</option>
			    <option value="7">7</option>
			    <option value="8">8</option>
			    <option value="9">9</option>
			    <option value="10">10</option>
			    <option value="0">-</option>
			  </select>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_no_siblings">Please enter monthly income</p>			  
			</div>
			</div>
			
			<div class="panel panel-info">
			  <div class="panel-heading">
				<h3 class="panel-title">Indigenous</h3>
			  </div>
			<div class="panel-body">
			<div class="form-group">
			  <label>Are you a member of Indigenous People community?</label>
			  <label class="radio-inline">
			    <input type="radio" name="enrollee_indigenous" id="enrollee_indigenous_0" value="yes" ng-model="reg.enrollee_indigenous" ng-required="!reg.enrollee_indigenous"> Yes
			  </label>
			  <label class="radio-inline">
			    <input type="radio" name="enrollee_indigenous" id="enrollee_indigenous_1" value="no" ng-model="reg.enrollee_indigenous" ng-required="!reg.enrollee_indigenous"> No
			  </label>
			  <p class="bg-danger reg-msg" ng-show="validate_enrollee_indigenous">Please select an answer</p>
			</div>
			  <div class="form-group">
				<label for="enrollee_ethnicity">Ethnicity</label>
				<input type="text" class="form-control" name="enrollee_ethnicity" id="enrollee_ethnicity" placeholder="Ethnicity" ng-model="reg.enrollee_ethnicity" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_ethnicity">Please enter ethnicity</p>
			  </div>			
			</div>
			</div>
			
			<div class="panel panel-info">
			  <div class="panel-heading">
				<h3 class="panel-title">Languages</h3>
			  </div>
			<div class="panel-body">
			  <div class="form-group">
				<label for="enrollee_tongue">Mother Tongue</label>
				<input type="text" class="form-control" name="enrollee_tongue" id="enrollee_tongue" placeholder="Mother Tongue" ng-model="reg.enrollee_tongue" required>
				<p class="bg-danger reg-msg" ng-show="validate_enrollee_tongue">Please enter Mother Tongue</p>
			  </div>
			  <div class="form-group">
				<label for="enrollee_languages">Other spoken languages</label>
				<input type="text" class="form-control" name="enrollee_languages" id="enrollee_languages" placeholder="Other spoken languages" ng-model="reg.enrollee_languages">
			  </div>			  
			</div>
			</div>
			
			<!--<div class="form-group">
			<button type="submit" class="btn btn-primary pull-right">Submit</button>
			</div>-->

			</form>
		  </div>
		</div>
	</main>
	
	<hr class="page-divider">
	
	<footer>
	  <p>&copy; 2016 Lord of Zion Divine School |<span class="powered-by"><i> Powered by: </i><span class="autopilot">Sly <i>Autopilot</i> Solutions</span></span></p>
	</footer>

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>	
    <script src="js/jquery.blockUI.js"></script>	
	<script type="text/javascript">	
	
		var app = angular.module("regApp", []);
		
		app.controller('regAppCtrl', function($scope, $http, $window) {						
						
			bUI('Please wait...');

			$http({
			  method: 'POST',
			  url: 'ajax.php?p=student_profile',
			  data: {id: <?php echo $_GET['eid']; ?>}
			}).then(function mySucces(response) {								
				
				$scope.reg = response.data;				
				$('#enrollee_grade').val(response.data['enrollee_grade']);
				$('#enrollee_no_siblings').val(response.data['enrollee_no_siblings']);
				if (response.data['enrollee_stat'] == 2) {
					$scope.isTransferee = true;
					$('#enrollee_old_school_type').val(response.data['enrollee_old_school_type']);
				}
				
				uUI();
				
			}, function myError(response) {
				 
				
			});
			
		});
		
		function bUI(msg) {
			
			$.blockUI({
				message: '<span style="font-size: 12px;">'+msg+'</span>',
				css: {		
				border: 'none', 
				padding: '15px', 
				backgroundColor: '#000', 
				'-webkit-border-radius': '10px', 
				'-moz-border-radius': '10px', 
				opacity: .5, 
				color: '#fff'
				}
			});
			
		}

		function uUI() {

			$.unblockUI();

		}		
	
	</script>
  </body>
</html>