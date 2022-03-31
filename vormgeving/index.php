<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
    <link href="resources/css/fix.css" rel="stylesheet"/>
    <?php include_once 'resources/includes/dbh.inc.php' ?>
    <?php include_once 'resources/models/GamesModel.php' ?>
    <?php include_once 'resources/models/PlayersModel.php' ?>
    <?php include_once 'resources/models/PlanningModel.php' ?>

</head>
<body>

    <?php $data = getAllPlanning(); 
        foreach($data as $D){
            
            $game = getGame($D['game_id']);
            print($game['name'].' at '.$D['speeltijd']);
            print('<form action="showplanning.php" method="post"><input type="hidden" name="id" value="'.$D['id'].'"><input type="submit" value="Show"></form>');
        }

        //$p = getPlanningItem(1);
        //print_r($p);
    ?>

<header>
</header>
<a href="createplanning.php">
      <button>Create new plan</button>
    </a>
<footer>&copy; Guylano 2022</footer>
</body>
</html>