<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}
$id =  $_GET['id'];
$name = $_GET['name'];
include "../includes/conn.php";

$sql = "DELETE FROM " .$name." WHERE id=" . $id . " ; ";
$pharm->query($sql);
$pharm->close();

echo "$name $id deleted successfully" ;
