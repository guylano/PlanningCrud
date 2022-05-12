<?php 
include_once 'resources/includes/dbh.inc.php';
include_once 'resources/models/GamesModel.php';

function getAllPlanning($when = 'future'){
    if($when === 'future'){
    	global $db;
        $data = $db->query("SELECT * FROM `planning` WHERE speeltijd >= now() ORDER BY speeltijd;");
    	return $data;
    }
    if($when === 'history'){
        global $db;
        $data = $db->query("SELECT * FROM `planning` WHERE speeltijd <= now() ORDER BY speeltijd;");
        return $data;
    }
}


function getPlanningItem($id){
	global $db;
    $data = $db->query("SELECT * FROM `planning` WHERE id = $id  ORDER BY speeltijd LIMIT 1;");
    $val = $data[0]['id'];
    $itemX = $db->query("SELECT * FROM `planning_x_players` WHERE planning_id = $val ORDER BY id;");
    $data = $data[0];
    if($data['GameMaster_id'] != 0){
        $d= $data['GameMaster_id'];
        $master = $db->query("SELECT * FROM `players` WHERE id = $d ORDER BY id;");
        $data['master'] = $master[0];
    }
    foreach($itemX as $X){
        $p_id = $X['player_id'];
        $player = $db->query("SELECT * FROM `players` WHERE id = $p_id ORDER BY id;");
    	$data['players'][] = $player[0];
    }
    $data['game']= getGame($data['game_id']);
	return $data;
}


function storePlanning($insert=array(), $players=array(), $id=null){
	global $db;
    $game = getGame($insert[0]);
    $ogTime = '"'.$insert[2].'"';
    $insert[3] = $game['play_minutes']+$game['explain_minutes'];
    //print_r($players);
    $insert[2]=str_replace('T', ' ', $insert[2]);
    $insert[2] = '"'.$insert[2].':00"';
   	
   if($id == null){
    $data = $db->query("INSERT INTO `planning` (`game_id`, `GameMaster_id`, `speeltijd`, `speelduur`, `speeltijd_origin`) VALUES (
        $insert[0],
         $insert[1],
          $insert[2],
           $insert[3],
            $ogTime) ;");
        $planning = $db->query("SELECT * FROM `planning` ORDER BY id DESC LIMIT 1");
        $planning = $planning[0];
        $planning = $planning['id'];
   }else{

        $data = $db->query("UPDATE `planning`
            SET `game_id` = $insert[0],
                `GameMaster_id` = $insert[1],
                `speeltijd` = $insert[2],
                `speelduur` = $insert[3],
                `speeltijd_origin` = $ogTime
            WHERE `id` = $id ;");
            $planning= $id;
            $db->query("DELETE FROM `planning_x_players` WHERE `planning_id`=$id;");
   }
    foreach ($players as $player) {
    	
    	$data = $db->query("INSERT INTO `planning_x_players` (`player_id`, `planning_id`) VALUES (
   		$player,
   		 $planning) ;");
    }
	return;
}


function deletePlanning($id = null){
    global $db;
    if($id != null){
        $db->query("DELETE FROM `planning` WHERE `id`=$id;");
        $db->query("DELETE FROM `planning_x_players` WHERE `planning_id`=$id;");
    }

    return;
}