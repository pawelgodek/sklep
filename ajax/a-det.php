<?php
session_start();
$act = $_POST["act"];
$pid = $_POST["pid"];
$uid = $_POST["uid"];

$mysqli = new mysqli("localhost", "root", "", "swzsso");

if($act == 0) {
    $getdet = sprintf("SELECT name, products_types.type, rating, description FROM products JOIN products_types ON products.type = products_types.id WHERE products.id = '%s'", $pid);
    $result = $mysqli->query($getdet);
    echo json_encode(mysqli_fetch_array($result, MYSQLI_NUM));
} elseif ($act == 1) {
    $getdet = sprintf("SELECT rating FROM products_rating WHERE product_id = '%s' AND user_id = '%s'", $pid, $uid);
    $result = $mysqli->query($getdet);
    echo json_encode(mysqli_fetch_array($result, MYSQLI_NUM));
}

mysqli_close($mysqli);