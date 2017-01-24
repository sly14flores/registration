<?php

$req = (isset($_GET['p'])) ? $_GET['p'] : "";
$_POST = json_decode(file_get_contents('php://input'), true);

require_once 'db.php';

switch ($req) {
	
	case "register":
	
	$_POST['enrollee_sy'] = date("Y");
	$_POST['enrollee_dob'] = date("Y-m-d",strtotime($_POST['enrollee_dob']));
	$_POST['enrollee_date'] = "CURRENT_TIMESTAMP";

	$con = new pdo_db('enrollees');
	$con->reset_increment_one();
	echo $con->insertData($_POST);
	
	// echo "Registration Successful. Thanks! :)";
	
	break;
	
	case "student_profile":
	
	$con = new pdo_db('enrollees');
	$result = $con->getData("SELECT * FROM enrollees WHERE enrollee_id = ".$_POST['id']);
	$result[0]['enrollee_dob'] = date("m/d/Y",strtotime($result[0]['enrollee_dob']));
	echo json_encode($result[0]);
	
	break;
	
}

?>