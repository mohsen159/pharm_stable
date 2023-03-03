<?php
include "../includes/conn.php";
$id = $_GET["id"];
$count = $_GET["n"]; 
$sql = "UPDATE `dunation` SET `amount`=(`amount`-'$count') where `id`='$id'";
$pharm->query($sql);
$pharm->close();
header("Location: /donation.php");
exit();
