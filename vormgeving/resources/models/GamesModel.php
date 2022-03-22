<?php 
include_once 'resources/includes/dbh.inc.php';

function getAllGames(){
	global $db;
    $data = $db->query("SELECT * FROM `games` ORDER BY name;");
	return $data;
}

