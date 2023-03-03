<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}
include "../includes/conn.php";
$id_ph = $_SESSION["id"];
$exp_total = $_POST["exp_total"];
$date = $_POST["date"];
$sql = "INSERT INTO `record_exp`(  `total`, `creation`, `id_ph`) VALUES ( '$exp_total','$date','$id_ph')" ;
if ($pharm->query($sql) === TRUE) {
    $last_id = $pharm->insert_id;
    $sql = "UPDATE `expiration` SET `id_record`='$last_id'  WHERE `id_ph`='$id_ph' and `id_record`=0";
    $pharm->query($sql);
    $pharm->close();
    header("Location: ../expiration.php");
    exit(); 
}
else
{
    // we have a error here ): return
}

?>