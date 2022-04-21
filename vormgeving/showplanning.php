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
            <?php
                $id=$_REQUEST['id'];
                $planning = getPlanningItem($id);
                print(
                    '<h1>'.
                        $planning['game']['name'].'<br>'.$planning['speeltijd'].
                    '</h1>'
                );
            ?>
        </div>
    </header>
    <div class="container">
        
        <div class="textfield inline">
            <?php
                print(
                    $planning['game']['description']
                );
            ?>
        </div>
        <div class="img">
            <img  class="image" src='resources/images/<?php  print($planning["game"]["image"]); ?>'>
        </div>
        <?php
            print($planning['master']['name']);
        ?>
        <table>
          <tr>
            <th>*</th>
            <th>Name</th>
          </tr>
            <?php
                $count = 1;
                foreach($planning['players'] as $player){
                    print('
                            <tr>
                                <th>'.$count.'</th>
                                <th>'.$player['name'].'</th>
                            </tr>
                        ');
                    $count++;
                }
            ?>
          
        </table>
        <?php
            print('
                <form class="inline" action="editplanning.php" method="post">
                    <input type="hidden" name="id" value="'.$id.'">
                    <input type="submit" value="Edit">
                </form>
            ');
        ?>
        <?php
            print('
                <form class="inline" action="deleteplanning.php" method="post">
                    <input type="hidden" name="id" value="'.$id.'">
                    <input type="submit" value="Delete">
                </form>
            ');
        ?>
    </div>
    <footer>&copy; Guylano 2022</footer>
</body>
</html>