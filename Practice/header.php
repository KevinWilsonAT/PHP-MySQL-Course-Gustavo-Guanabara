<?php
    echo "<header>";
    if (empty($_SESSION['user'])) {
        echo "<a href='user-login.php'>Login</a>";
    }
    else {
        echo "Hi, <strong>" . $_SESSION['name'] . "</strong> | ";
        echo "<a href='user-edit.php'>My Data</a> | ";
        if (is_admin()) {
            echo "<a href='user-new.php'>New User</a> | ";
            echo "New Game | ";
        }
        echo "<a href='user-logout.php'>Logout</a>";
    }

    echo "</header>";
?>