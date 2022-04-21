<?php
	include_once 'resources/models/PlanningModel.php';
	$id=$_REQUEST['id'];
	
	deletePlanning($id);






	header("Location: index.php");


?>