<?php
session_start();

$name = $_POST['rname'];
$surname = $_POST['rsurname'];
$login = $_POST['rlogin'];
$email = $_POST['remail'];
$pass = $_POST['rpass'];
$date = $_POST['rdate'];
$user = "user";

$mysqli = new mysqli("localhost", "root", "", "swzsso");

$sqlIns = sprintf("INSERT INTO users(name, surname, login, password, type, email, bd) VALUES ( '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $name, $surname, $login, $pass, $user, $email, $date);
$sqlLogin = sprintf("SELECT id FROM users WHERE login = '%s'", $login);
$result = $mysqli->query($sqlLogin);

$row = mysqli_fetch_array($result, MYSQLI_NUM);
if(is_null($row)) {
    $result = $mysqli->query($sqlIns);
    print("ok");
} else {
    print("loginEq");
}
mysqli_close($mysqli);
?>
