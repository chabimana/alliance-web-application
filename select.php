<?php  
if(isset($_GET["id"]))  
{  
	// get ID of the product to be edited
	$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
	// core configuration
	include_once "config/core.php";

	// include classes
	include_once 'config/database.php';
	include_once 'model/Events.php';

	// get database connection since we need icons on the UI before creating a program
	$database = new Database();
	$db       = $database -> getConnection ();
	$event = new Events( $db );
	$event->id = $id;
	$result=$event->readOne();

	echo json_encode($result);
}  
?>