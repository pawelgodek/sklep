<?php

$uid = $_POST["uid"];
$title = $_POST["title"];
$content =$_POST["content"];

$mysqli = new mysqli("localhost", "root", "", "swzsso");
$insertOrder = sprintf("INSERT INTO raports(title, user_id, content) VALUES('%s', '%s', '%s')", $title, $uid, $content);
$result = $mysqli->query($insertOrder);

?>