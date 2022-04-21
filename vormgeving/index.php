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
    <header>
        <div class="title">
            <h1>Plannings tool</h1>
        </div>
    </header>
    <div class="container">
        
        <?php $data = getAllPlanning(); 
            foreach($data as $D){                
                $game = getGame($D['game_id']);
                print('<p class="inline">'.$game['name'].' at '.$D['speeltijd'].'</p>');
                print('<form action="showplanning.php" method="post" class="inline"><input type="hidden" name="id" value="'.$D['id'].'"><input type="submit" value="Show"></form><br>');
            }
        ?>
        <br><br>
        <a href="createplanning.php">
            <button>Create new plan</button>
        </a>
    </div>
    <footer>&copy; Guylano 2022</footer>
</body>
</html>