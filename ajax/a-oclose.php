<?php
$oid = $_POST["oid"];

$mysqli = new mysqli("localhost", "root", "", "swzsso");

$sqlRate = sprintf("DELETE FROM orders_products WHERE oid = '%s'", $oid);
$result = $mysqli->query($sqlRate);

$sqlRate = sprintf("DELETE FROM orders WHERE id = '%s'", $oid);
$result = $mysqli->query($sqlRate);

mysqli_close($mysqli);