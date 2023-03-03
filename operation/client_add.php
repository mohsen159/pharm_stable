<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}
include "../includes/conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ;
    $table = $_SESSION["clients"];
    $sql = "SELECT * FROM `$table` WHERE  `name`='$name'";
    $result = $pharm->query($sql);
    if ($result->num_rows > 0 && $result->num_rows < 2) {
        header("Location: ../clients.php");
        exit(); 
    } else {
        /*there is a problem we have more then 2 rows in the database same name */
        //fix (we creat a client ) and take the id 
        $sql = "INSERT INTO `$table` (name) values ('$name')";

        if ($pharm->query($sql) === TRUE) {
            $id_c = $pharm->insert_id;
            $sql = "update `$table` set client='$id_c' where id='$id_c' " ; 
            $pharm->query($sql);
        }
    }
    $pharm->close();
    header("Location: ../clients.php");
    exit();
} 
else {
    /* some shit here dispaly a msg */
}
