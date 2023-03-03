<?php

session_start();
if (!isset($_SESSION["id"])) {
header("Location: /login.php");
exit();
}
include "../includes/conn.php";
$id_ph = $_SESSION["id"];

$id = $_POST["id"];
$name = $_POST["name"];
$type = $_POST["type"];
$datef = $_POST["datef"];
$datep = $_POST["datep"];
$amount = $_POST["amount"];
$prix = $_POST["prix"];
$sql = "UPDATE `expiration` SET `name` ='$name' , `amount` = '$amount', `prix`='$prix', 
`datef` = '$datef', `datep` = '$datep' , `condi` = '$type', `id_ph` = '$id_ph'  ,
 `id_record` = 0  where  `id` = '$id'"  ;
if ($pharm->query($sql) === true) {
// pass some information here like modification
echo "add ";
} else {

echo "Error: " . $sql . "<br>" . $pharm->error;
}
$pharm->close();
header("Location: ../expiration.php");
exit();