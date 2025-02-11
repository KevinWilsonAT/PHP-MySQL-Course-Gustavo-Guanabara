<?php
    $dbase = new mysqli("localhost", "root", "", "db_games");
    if($dbase->connect_errno) {
        echo "<p> Encontrei um erro $dbase->errno -->
        $dbase->connect_error</p>";
        die();
    }

    $search = $dbase->query("SET NAMES 'utf8'");
    $search = $dbase->query("SET character_set_connection=utf8");
    $search = $dbase->query("SET character_set_client=utf8");
    $search = $dbase->query("SET character_set_results=utf8");
?>