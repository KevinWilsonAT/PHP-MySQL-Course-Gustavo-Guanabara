<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Game Details - PHP with MySQL - Estudonauta</title>
</head>
<body>
    <?php
        require_once "src/includes/login.php";
        require_once "src/includes/dbase.php";
        require_once "src/includes/functions.php";
    ?>
    <div id="body">
        <?php
            include_once "header.php";

            $c = $_GET['cod'] ?? 0;
            $search = $dbase->query("SELECT * FROM games WHERE cod='$c'");
        ?>

        <h1>Game Details</h1>
        <table class="details">
            <?php
                if(!$search) {
                    echo "<tr><td>Search Failed! $dbase->error";
                }
                else {
                    if($search->num_rows == 1) {
                        $reg = $search->fetch_object();
                        $t = thumb($reg->cover);
                        echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                        echo "<td><h2>$reg->name</h2>";
                        echo "Rank: " . number_format($reg->rank, 1) . "/10.0";
                        echo "<br>";

                        if (is_admin()) {
                            echo "<a href='index.php'><i class='material-icons'>add_circle</i></a>";
                            echo "<a href='index.php'><i class='material-icons'>edit</i></a>";
                            echo "<a href='index.php'><i class='material-icons'>delete</i></a>";
                        }
                        elseif (is_editor()) {
                            echo "<a href='index.php'><i class='material-icons'>edit</i></a>";;
                        }

                        echo "<tr><td>$reg->description";
                        echo "<tr><td>adm";
                    }
                    else {
                        echo "<tr><td>No register found";
                    }
                }
            ?>
        </table>
        <?php echo back(); ?>
    </div>
    <?php include_once "footer.php"; ?>
</body>
</html>