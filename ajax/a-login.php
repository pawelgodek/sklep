<?php
    session_start();
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $mysqli = new mysqli("localhost", "root", "", "swzsso");
    $sqlLogin = sprintf("SELECT id, password, type FROM users WHERE login = '%s'", $login);
    $result = $mysqli->query($sqlLogin);

    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    if($row[1] == $pass) {
        $_SESSION["id"] = $row[0];
        $_SESSION["login"] = $login;
        $_SESSION["type"] = $row[2];
    } else {
        $_SESSION["login"] = "err";
    }

    if(!isset($_SESSION["sid"])) {
        $_SESSION["sid"] = 0;
    }

    $_SESSION["ptid"] = -1;

    mysqli_close($mysqli);
?>