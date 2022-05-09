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
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <header class="border-b-2 border-white">
        <div class="text-3xl font-bold">
            <h1>Plannings tool</h1>
        </div>
    </header>
    
    <div class="bg-zinc-500 w-3/4 m-auto">
        <table class="w-full">
            <?php $data = getAllPlanning(); 
                foreach($data as $D){                
                    $game = getGame($D['game_id']);
                    print('<tr>');
                    print('
                            <th>
                            <p class="inline text-lg">'
                                .$game['name'].' at '.$D['speeltijd'].
                            '</p>
                            </th>'
                        );
                    print('
                            <th>
                                <form action="showplanning.php" method="post" class="inline">
                                <input type="hidden" name="id" value="'.$D['id'].'">
                                <input type="submit" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out" value="Show">
                                </form><br>
                            </th>'
                    );
                    print('</tr>');
                }
            ?>
        </table>
        
        <a href="createplanning.php" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">
            <button>Create new plan</button>
        </a>
    </div>
    
    <?php include_once 'resources/components/footer.php' ?>
</body>
</html>