<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>User Login - PHP with MySQL - Estudonauta</title>
    <style>
        div#body {
            width: 270px;
            font-size: 13pt;
        }
        td {
            padding: 6px;
        }
    </style>
</head>
<body>
    <?php
        require_once "src/includes/login.php";
        require_once "src/includes/dbase.php";
        require_once "src/includes/functions.php";
    ?>
    <div id="body">
        <?php
            $u = $_POST['user'] ?? null;
            $p = $_POST['password'] ?? null;

            if (is_null($u) || is_null($p)) {
                require "user-login-form.php";
            }
            else {

                $q = "SELECT user, name, password, type FROM users where user = '$u' LIMIT 1";
                $search = $dbase->query($q);
                if(!$search) {
                    echo msg_error('Failed to access the database');
                }
                else {
                    if($search->num_rows > 0) {

                        $reg = $search->fetch_object();

                        if (testHash($p, $reg->password)) {
                            echo msg_success('Logged successfully');
                            $_SESSION['user'] = $reg->user;
                            $_SESSION['name'] = $reg->name;
                            $_SESSION['type'] = $reg->type;
                        }
                        else {
                            echo msg_error('Invalid password');
                        }
                    }
                    else {
                        msg_error("User doesn't exist");
                    }
                }
            }
            echo back();
        ?>
    </div>
</body>
</html>