<?php

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}
include "../includes/conn.php";
$id_ph = $_SESSION["id"];


$name = $_POST["name"];
$type = $_POST["type"];
$datef = $_POST["datef"];
$datep = $_POST["datep"];
$amount = $_POST["amount"]; 
$prix = $_POST["prix"];
$sql = "INSERT INTO `expiration`(`name`, `amount`, `prix`, `datef`, `datep`, `condi`, `id_ph` , `id_record` ) 
VALUES ('$name','$amount' , '$prix','$datef','$datep' ,'$type', '$id_ph' , 0)"  ;
if ($pharm->query($sql) === true) {
    // pass some information here like modification 
    echo "add ";
} else {

    echo "Error: " . $sql . "<br>" . $pharm->error;
}
$pharm->close();
header("Location: ../expiration.php");
exit();



?>