<?php

session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "";
    $_SESSION['name'] = "";
    $_SESSION['type'] = "";
}

function crypto($password) {
    $c = '';
    for($pos = 0; $pos < strlen($password); $pos++) {
        $letter = ord($password[$pos]) + 1;
        $c .= chr($letter);
    }
    return $c;
}

function generateHash($password) {
    $txt = crypto($password);
    $hash = password_hash($txt, PASSWORD_DEFAULT);
    return $hash;
}

function testHash($password, $hash) {
    $ok = password_verify(crypto($password), $hash);
    return $ok;
}

function logout() {
    unset($_SESSION['user']);
    unset($_SESSION['name']);
    unset($_SESSION['type']);
}

function is_logged() {
    if(empty($_SESSION['user'])) {
        return false;
    }
    else {
        return true;
    }
}

function is_admin() {
    $t = $_SESSION['type'] ?? null;

    if(is_null($t)) {
        return false;
    }
    else {
        if ($t == 'admin') {
            return true;
        }
        else {
            return false;
        }
    }
}

function is_editor() {
    $t = $_SESSION['type'] ?? null;

    if(is_null($t)) {
        return false;
    }
    else {
        if ($t == 'editor') {
            return true;
        }
        else {
            return false;
        }
    }
}

?>