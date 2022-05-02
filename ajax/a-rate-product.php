<?php
$c = $_POST["c"];
$pid = $_POST["pid"];
$uid = $_POST["uid"];
$inVal = $_POST["inVal"];

$mysqli = new mysqli("localhost", "root", "", "swzsso");
if($c == 0) {
    $sqlRate = sprintf("INSERT INTO products_rating(product_id, user_id, rating) VALUES('%s', '%s', '%s')", $pid, $uid, $inVal);
    $result = $mysqli->query($sqlRate);
} else {
    $sqlRate = sprintf("UPDATE products_rating SET rating = '%s' WHERE user_id = '%s' AND product_id = '%s'", $inVal, $uid, $pid);
    $result = $mysqli->query($sqlRate);
}

mysqli_close($mysqli);