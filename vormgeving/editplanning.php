<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Planning</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
    <?php include_once 'resources/includes/dbh.inc.php' ?>
    <?php include_once 'resources/models/GamesModel.php' ?>
    <?php include_once 'resources/models/PlayersModel.php' ?>
    <?php include_once 'resources/models/PlanningModel.php' ?>
</head>
<body>
    <?php 
        $id=$_REQUEST['id'];
        $planning = getPlanningItem($id);
    ?>
    <header>
        <div class="title">
            <h1>Edit Plan</h1>
        </div>
    </header>
    <div class="container">
        
        <form action="storeplanning.php" method="post">
            <select name="Game" required>
                <?php 
                    $data = getAllGames(); 
                    foreach($data as $D){
                        if($planning['game']['id']==$D['id']){
                            print '<option selected value='.$D['id'].'>'.$D['name'].'</option>';
                        }else{
                            print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                        }
                    }
                ?>
            </select><br>
            <select multiple name="Players[]" required>
                <?php $data = getAllPlayers();
                    foreach($planning['players'] as $p){
                        $player_ids[]=$p['id'];
                    } 
                    foreach($data as $D){
                        if(in_array($D['id'], $player_ids)){
                            print '<option selected value='.$D['id'].'>'.$D['name'].'</option>';
                        }else{
                            print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                        }
                    }
                ?>
            </select><br>
            <select name="gameMaster" required>
                <?php $data = getAllPlayers(); 
                    foreach($data as $D){
                        if($planning['GameMaster_id'] == $D['id']){
                            print '<option selected value='.$D['id'].'>'.$D['name'].'</option>';
                        }else{
                            print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                        }
                    }
                ?>
            </select><br>
            <input type="hidden" name="id" value="<?php print($id);  ?>">
            <?php
                $time = $planning['speeltijd_origin'];
                
                
            ?>
            <input type="datetime-local" name="starttijd" value="<?php print($time); ?>" required>
            <input type="submit" value="update" name="submit">
        </form>

    </div>
    <footer>&copy; Guylano 2022</footer>
</body>
</html>