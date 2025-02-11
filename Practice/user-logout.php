<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>User Logout - PHP with MySQL - Estudonauta</title>
</head>
<body>
    <?php
        require_once "src/includes/login.php";
        require_once "src/includes/dbase.php";
        require_once "src/includes/functions.php";
    ?>
    <div id="body">
        <?php
            logout();
            echo msg_success('User disconnected');
            echo back();
        ?>
    </div>
</body>
</html>