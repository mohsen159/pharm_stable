<?php

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}
include "../includes/conn.php";
$id_ph = $_SESSION["id"];

$lot =  $_GET['lot'];
$name = $_GET['name'];


$sql = "SELECT * FROM `products` WHERE id_ph ='$id_ph' and  `name`='$name' and lot='$lot' ";
$result = $pharm->query($sql);
if ($result->num_rows > 0 && $result->num_rows < 2) {
    while ($row = $result->fetch_assoc()) {
        $amount  =  $row['amount'];
        echo $amount ; 
    }
}
else
{
    echo "-1"; 
}
$pharm->close();
exit(); 









?>