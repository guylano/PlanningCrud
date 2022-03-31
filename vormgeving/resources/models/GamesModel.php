<?php 
include_once 'resources/includes/dbh.inc.php';

function getAllGames(){
	global $db;
    $data = $db->query("SELECT * FROM `games` ORDER BY name;");
	return $data;
}


function getGame($id){
	global $db;
    $data = $db->query("SELECT * FROM `games` WHERE id = $id ORDER BY name LIMIT 1;");
	return $data[0];
}
