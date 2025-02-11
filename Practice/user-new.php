<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>New User - PHP with MySQL - Estudonauta</title>
</head>
<body>
    <?php
        require_once "src/includes/login.php";
        require_once "src/includes/dbase.php";
        require_once "src/includes/functions.php";
    ?>
    <div id="body">
        <?php
            if(!is_admin()) {
                echo "<h1>Restricted Area</h1>";
                echo msg_error("You dont't have Administrator privileges");
            }
            else {
                if (!isset($_POST['user'])) {
                    require "user-new-form.php";
                }
                else {
                    $user = $_POST['user'] ?? null;
                    $name = $_POST['name'] ?? null;
                    $password1 = $_POST['password1'] ?? null;
                    $password2 = $_POST['password2'] ?? null;
                    $type = $_POST['type'] ?? null;

                    if($password1 === $password2) {
                        if(empty($user) || empty($name) || empty($password1) || empty($password2) || empty($type)) {
                            echo msg_error("All data fields are required");
                        }
                        else {
                            $password = generateHash($password1);
                            $q = "INSERT INTO users (user, name, password, type) VALUES ('$user', '$name', '$password', '$type')";
                            if($dbase->query($q)) {
                                echo msg_success("User $name registered successfully");
                            }
                            else {
                                echo msg_error("Can't register user $user, perhaps already exists");
                            }
                        }
                    }
                    else {
                        echo msg_error("Passowrds don't match. Try Again");
                    }
                }
            }

            echo back();
        ?>
    </div>
</body>
</html>