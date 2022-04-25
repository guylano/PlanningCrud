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
</head>
<body>
    <header>
        <div class="title">
            <h1>Create Plan</h1>
        </div>
    </header>
    <div class="container">
        <form action="storeplanning.php" method="post">
            <select class="" name="Game" required>
                <?php 
                    $data = getAllGames(); 
                    foreach($data as $D){
                        print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                    }
                ?>
            </select><br>
            <select class="" multiple name="Players[]" required>
                <?php $data = getAllPlayers(); 
                    foreach($data as $D){
                        print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                    }
                ?>
            </select><br>
            <select class="" name="gameMaster" required>
                <?php $data = getAllPlayers(); 
                    foreach($data as $D){
                        print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                    }
                ?>
            </select><br>
            <input type="hidden" name="id" value="null">
            <input class="" type="datetime-local" name="starttijd" required>
            <input type="submit" value="Create" name="submit">
        </form>

    </div>
    <footer>&copy; Guylano 2022</footer>
</body>
</html>