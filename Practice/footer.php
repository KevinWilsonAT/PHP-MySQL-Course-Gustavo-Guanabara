<?php 
    echo "<footer>";
    echo "<p>Accessed by " . $_SERVER['REMOTE_ADDR'] . " on " . date('D') . ", " . date('d/M/Y') . " </p>";
    echo "<p>Developed by Estudonauta - &copy; 2024</p>";
    echo "</footer>";
    $dbase->close();
?>