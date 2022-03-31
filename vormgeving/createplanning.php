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
</head>
<body>
    <form action="storeplanning.php" method="post">
        <select name="Game" required>
            <?php 
                $data = getAllGames(); 
                foreach($data as $D){
                    print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                }
            ?>
        </select><br>
        <select multiple name="Players[]" required>
            <?php $data = getAllPlayers(); 
                foreach($data as $D){
                    print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                }
            ?>
        </select><br>
        <select name="gameMaster" required>
            <?php $data = getAllPlayers(); 
                foreach($data as $D){
                    print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                }
            ?>
        </select><br>
        
        <input type="datetime-local" name="starttijd" required>
        <input type="submit" value="Create">
    </form>

<header>
</header>

<footer>&copy; Guylano 2022</footer>
</body>
</html>