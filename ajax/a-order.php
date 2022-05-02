<?php
function write_log($log_msg)
{
    $log_filename = "logs";
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/debug.log';
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);

}

session_start();
$ids = $_POST["id"];
$qs = $_POST["q"];

$mysqli = new mysqli("localhost", "root", "", "swzsso");

$getLastId = sprintf("SELECT id FROM orders ORDER BY id DESC LIMIT 1");

$result = $mysqli->query($getLastId);
$row = mysqli_fetch_array($result, MYSQLI_NUM);

if($row != NULL) {
    $lastId = $row[0] + 1;
} else {
    $lastId = 0;
}

$insertOrder = sprintf("INSERT INTO orders(id, user_id, shop) VALUES('%s', '%s', '%s')", $lastId, $_SESSION["id"], $_SESSION["sid"]);
$result = $mysqli->query($insertOrder);


for($i=0;$i<count($ids);$i++) {
    $insertOP = sprintf("INSERT INTO orders_products(pid, oid, quantity) VALUES('%s', '%s', '%s')", $ids[$i], $lastId, $qs[$i]);
    $result = $mysqli->query($insertOP);

    $getQ = sprintf("SELECT quantity FROM shops_products WHERE s_id = '%s' AND p_id = '%s'", $_SESSION["sid"], $ids[$i]);
    $result = $mysqli->query($getQ);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);

    $updateQ = sprintf("UPDATE shops_products SET quantity = '%s' WHERE s_id = '%s' AND p_id = '%s'",($row[0] - $qs[$i]), $_SESSION["sid"], $ids[$i]);
    write_log($updateQ);
    $result = $mysqli->query($updateQ);
}

mysqli_close($mysqli);