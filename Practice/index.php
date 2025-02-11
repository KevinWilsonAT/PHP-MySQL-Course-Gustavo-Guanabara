<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Game Listing - PHP with MySQL - Estudonauta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./src/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <?php
            require_once "src/includes/dbase.php";
            require_once "src/includes/functions.php";
            require_once "src/includes/login.php";

            $orderby = $_GET['order'] ?? "n";
            $key = $_GET['search'] ?? "";
        ?>
        <div id="body">

            <?php include_once "header.php"; ?>

            <h1>Choose your game:</h1>

            <form action="index.php" method="get" id="search">
                <div class="categories">
                    Order by:
                    <a href="index.php?order=n&search=<?php echo $key; ?>">Name</a> |
                    <a href="index.php?order=p&search=<?php echo $key; ?>">Productor</a> |
                    <a href="index.php?order=h&search=<?php echo $key; ?>">High Ranks</a> |
                    <a href="index.php?order=l&search=<?php echo $key; ?>">Low Ranks</a> |
                    <a href="index.php">Show All</a>
                </div>    
                <div class="search">
                    Search a game: <input type="text" name="search" size="10" maxlength="40">
                    <input type="submit" value="Search">
                </div>
            </form>
            <table class="listing">
                <?php 
                
                $query = "SELECT game_table.cod, game_table.name, game_table.cover, genre_table.genre, prod_table.productor FROM games game_table JOIN genres genre_table ON game_table.genre = genre_table.cod JOIN productors prod_table ON game_table.productor = prod_table.cod ";
                
                if(!empty($key)) {
                    $query .= "WHERE game_table.name LIKE '%$key%' OR prod_table.productor LIKE '%$key%' OR genre_table.genre LIKE '%$key%' ";
                }

                switch ($orderby) {
                    case "p":
                        $query .= "ORDER BY prod_table.productor";
                    break;
                    case "h":
                        $query .= "ORDER BY game_table.rank DESC";
                    break;
                    case "l":
                        $query .= "ORDER BY game_table.rank ASC";
                    break;
                    default:
                        $query .= "ORDER BY game_table.name";
                    break;

                }

                $search = $dbase->query($query);

                if (!$search) {
                    echo "<tr><td>Something went wrong on the search";
                }
                else {
                    if ($search->num_rows == 0) {
                        echo "<tr><td>No registers found";
                    }
                    else {
                        while($reg = $search->fetch_object()) {
                            $t = thumb($reg->cover);
                            echo "<tr><td><img src='$t' class='mini' />";
                            echo "<td><a href='details.php?cod=$reg->cod'>$reg->name</a>";
                            echo " [$reg->genre] ";
                            echo "<br>$reg->productor";
                            
                            if (is_admin()) {
                                echo "<td>";
                                echo "<a href='index.php'><i class='material-icons'>add_circle</i></a>";
                                echo "<a href='index.php'><i class='material-icons'>edit</i></a>";
                                echo "<a href='index.php'><i class='material-icons'>delete</i></a>";
                            }
                            elseif (is_editor()) {
                                echo "<td>";
                                echo "<a href='index.php'><i class='material-icons'>edit</i></a>";;
                            }
                        }
                    }
                }
                ?>
            </table>
        </div>
        <?php include_once "footer.php"; ?>
    </body>
</html>