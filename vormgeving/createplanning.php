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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="border-b-2 border-white">
        <div class="text-3xl font-bold">
            <h1>Create Plan</h1>
        </div>
    </header>
    <div class="bg-zinc-500 w-3/4 m-auto pt-2">
        <form action="storeplanning.php" class="" method="post">
            <select class="text-black m-2 mt-0 pt-2 block appearance-none w-full bg-gray-200 border border-gray-200 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 w-2/5" name="Game" required>
                <?php 
                    $data = getAllGames(); 
                    foreach($data as $D){
                        print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                    }
                ?>
            </select>
            <select class="text-black m-2 form-multiselect block w-full w-2/5" multiple name="Players[]" required>
                <?php $data = getAllPlayers(); 
                    foreach($data as $D){
                        print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                    }
                ?>
            </select>
            <select class="text-black m-2 block appearance-none w-full bg-gray-200 border border-gray-200 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 w-2/5" name="gameMaster" required>
                <?php $data = getAllPlayers(); 
                    foreach($data as $D){
                        print '<option value='.$D['id'].'>'.$D['name'].'</option>';
                    }
                ?>
            </select>
            <input type="hidden" name="id" value="null">
            <input class="text-black m-2 form-control block w-full px-3 py-1.5 text-base font-normal  bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none w-2/5" type="datetime-local" name="starttijd" required>
            <input type="submit" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out" value="Create" name="submit">
        </form>

    </div>
    <footer>&copy; Guylano 2022</footer>
</body>
</html>