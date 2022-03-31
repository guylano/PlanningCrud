<?php 
include_once 'resources/includes/dbh.inc.php';
include_once 'resources/models/GamesModel.php';

function getAllPlanning(){
	global $db;
    $data = $db->query("SELECT * FROM `planning` ORDER BY speeltijd;");
	return $data;
}


function getPlanningItem($id){
	global $db;
    $data = $db->query("SELECT * FROM `planning` WHERE id = $id  ORDER BY speeltijd LIMIT 1;");
    $val = $data[0]['id'];
    $itemX = $db->query("SELECT * FROM `planning_x_players` WHERE planning_id = $val ORDER BY id;");
    $data = $data[0];
    foreach($itemX as $X){
    	$data['players'][] = $db->query("SELECT * FROM `players` WHERE id = 1 ORDER BY id;");
    }
    $data['game']= getGame($data['game_id']);
	return $data;
}


function storePlanning($insert=array(), $players=array()){
	global $db;
    $game = getGame($insert[0]);
    $insert[3] = $game['play_minutes']+$game['explain_minutes'];
    //print_r($players);
    $insert[2]=str_replace('T', ' ', $insert[2]);
    $insert[2] = '"'.$insert[2].':00"';
   	$data = $db->query("INSERT INTO `planning` (`game_id`, `GameMaster_id`, `speeltijd`, `speelduur`) VALUES (
   		$insert[0],
   		 $insert[1],
   		  $insert[2],
   		   $insert[3]) ;");
   
    $planning = $db->query("SELECT * FROM `planning` ORDER BY id DESC LIMIT 1");
    $planning = $planning[0];
    $planning = $planning['id'];
    foreach ($players as $player) {
    	
    	$data = $db->query("INSERT INTO `planning_x_players` (`player_id`, `planning_id`) VALUES (
   		$player,
   		 $planning) ;");
    }
	return;
}