<?php
$c = $_POST["c"];
$wrid = $_POST["wrid"];
$uid = $_POST["uid"];
$inVal = $_POST["inVal"];

$mysqli = new mysqli("localhost", "root", "", "swzsso");
if($c == 0) {
    $sqlRate = sprintf("INSERT INTO users_rating(user_rated_id, user_id, rate) VALUES('%s', '%s', '%s')", $wrid, $uid, $inVal);
    $result = $mysqli->query($sqlRate);
} else {
    $sqlRate = sprintf("UPDATE users_rating SET rate = '%s' WHERE user_id = '%s' AND user_rated_id = '%s'", $inVal, $uid, $wrid);
    $result = $mysqli->query($sqlRate);
}

mysqli_close($mysqli);