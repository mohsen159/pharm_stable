<?php
include "../includes/conn.php";
$id = $_POST["id"]; 
$name = $_POST["name"];
$lot = $_POST["lot"];
$count = $_POST["number"];

$sql = "UPDATE `products` SET `name`='$name',`lot`='$lot',`amount`='$count' where `id`='$id'" ; 
$pharm->query($sql);
$pharm->close();
header("Location: /index.php");
exit();




