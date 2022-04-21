<?php
	include_once 'resources/models/PlanningModel.php';
	$game=$_REQUEST['Game'];
	$players=$_REQUEST['Players'];
	$gameMaster=$_REQUEST['gameMaster'];
	//$GameLength=$_REQUEST['GameLength'];
	$starttijd=$_REQUEST['starttijd'];
	$submit=$_REQUEST['submit'];
	$id = null;
	if($submit == 'update'){
		$id = $_REQUEST['id'];
	}

	$insert[]=$game;
	$insert[]=$gameMaster;
	$insert[]=$starttijd;
	//$insert[]=$GameLength;
	$players=$players;

	storePlanning($insert, $players, $id);






	header("Location: index.php");


?>