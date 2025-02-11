<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Edit User - PHP with MySQL - Estudonauta</title>
</head>
<body>
    <?php
        require_once "src/includes/login.php";
        require_once "src/includes/dbase.php";
        require_once "src/includes/functions.php";
    ?>
    <div id="body">
        <?php
            if (!is_logged()) {
                echo msg_error("<a href='user-login.php'>Login</a> to proceed editing data");
            }
            else {
                if (!isset($_POST['user'])) {
                    include "user-edit-form.php";
                }
                else {
                    $user = $_POST['user'] ?? null;
                    $name = $_POST['name'] ?? null;
                    $type = $_POST['type'] ?? null;
                    $password1 = $_POST['password1'] ?? null;
                    $password2 = $_POST['password2'] ?? null;

                    $q = "UPDATE users SET user = '$user', name = '$name'";

                    if (empty('password1') || is_null('password1')) {
                        echo msg_warning("Password was maintained");
                    }
                    else {
                        if ($password1 === $password2) {
                            $password = generateHash($password1);
                            $q .= ", password = '$password'";
                        }
                        else {
                            echo msg_error("Passwords don't match. Earlier password will be maintained.");
                        }
                    }

                    $q .= "WHERE user = '" . $_SESSION['user'] . "'";

                    if ($dbase->query($q)) {
                        echo msg_success("User data updated sucessfully");
                        logout();
                        echo msg_warning("For security reasons, pelase <a href='user-login.php'>login</a> again");
                    }
                    else {
                        echo msg_error("It's not possible to update the user data");
                    }
                }
            }

            echo back();
        ?>
    </div>
    <?php require_once "footer.php"; ?>
</body>
</html>