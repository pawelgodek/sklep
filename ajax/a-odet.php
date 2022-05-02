<?php
session_start();
$oid = $_POST["oid"];

$mysqli = new mysqli("localhost", "root", "", "swzsso");

$getdet = sprintf("SELECT products.id, pid, quantity, name FROM orders_products JOIN products ON products.id = orders_products.pid WHERE orders_products.oid = '%s'", $oid);
$result = $mysqli->query($getdet);

$tab = [];

while($rs = $result->fetch_array()) {
    array_push($tab, $rs);
}
echo json_encode($tab);
mysqli_close($mysqli);