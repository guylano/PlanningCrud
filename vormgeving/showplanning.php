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
    <header class="border-b-2 border-white flex">
        <div class="text-3xl font-bold w-1/2">
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
        <div class="text-3xl font-bold w-1/2 mt-4">
            <h2>
                <?php
                    print('Game Master : '.$planning['master']['name']);
                ?>
            </h2>
        </div>
    </header>
    <div class="bg-zinc-500 w-3/4 m-auto pt-2">
        <div class="flex">
            <div class="textfield w-2/3">
                <div class="flex p-3">
                    <div class="w-full">
                        <?php
                            print(
                                $planning['game']['description']
                            );
                        ?>
                    </div>
                </div>
                <div class="flex p-3">
                    <div class="w-full">
                        <?php
                            print('Het spel duurt overigens '.
                                $planning['game']['play_minutes']
                                .' minuuten.'
                            );
                        ?>
                    </div>
                </div>
                <div class="flex">
                    <table class="w-3/4 m-auto my-4">
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
                </div>
                <div class="flex my-4">
                    <div class="m-auto border-2 border-white ">
                        <?php  print($planning["game"]["youtube"]); ?>
                    </div>
                </div>
            </div>
            <div class="w-1/3 m-3">
                <img  class="image border-2 border-white" src='resources/images/<?php  print($planning["game"]["image"]); ?>'>
            </div>
        </div>
        
        <div>
            <?php
                print('
                    <form class="inline" action="editplanning.php" method="post">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="submit" class="inline-block px-6 py-2.5 bg-orange-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-orange-600 hover:shadow-lg focus:bg-orange-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-orange-700 active:shadow-lg transition duration-150 ease-in-out" value="Edit">
                    </form>
                ');
            ?>
            <?php
                print('
                    <form class="inline" action="deleteplanning.php" method="post">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="submit" class="inline-block px-6 py-2.5 bg-red-500 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-600 hover:shadow-lg focus:bg-red-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-lg transition duration-150 ease-in-out" value="Delete">
                    </form>
                ');
            ?>
        </div>
    </div>
    <footer>&copy; Guylano 2022</footer>
</body>
</html>