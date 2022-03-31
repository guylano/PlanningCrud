<?php 
include_once 'resources/includes/dbh.inc.php';

function getAllPlayers(){
	global $db;
    $data = $db->query("SELECT * FROM `players` ORDER BY name;");
	return $data;
}

