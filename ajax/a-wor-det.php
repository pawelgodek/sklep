<?php
session_start();
$act = $_POST["act"];
$wrid = $_POST["wrid"];
$uid = $_POST["uid"];

$mysqli = new mysqli("localhost", "root", "", "swzsso");

if($act == 0) {
    $getdet = sprintf("SELECT name, surname, office, rate FROM users LEFT JOIN users_rating ON users.id = users_rating.user_rated_id WHERE users.id = '%s'", $wrid);
    $result = $mysqli->query($getdet);
    echo json_encode(mysqli_fetch_array($result, MYSQLI_NUM));
} elseif ($act == 1) {
    $getdet = sprintf("SELECT rate FROM users_rating WHERE user_rated_id = '%s' AND user_id = '%s'", $wrid, $uid);
    $result = $mysqli->query($getdet);
    echo json_encode(mysqli_fetch_array($result, MYSQLI_NUM));
}

mysqli_close($mysqli);