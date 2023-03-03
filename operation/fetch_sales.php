<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}
include "../includes/conn.php";
if(!isset($_GET["name"]))
{

    $sql = "SELECT  `name` , `dci`  FROM `prodcts_list` ";
    $result = $pharm->query($sql);
    if ($result->num_rows > 0) {

        $row = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($row);
    }
}
else
{
    $name = $_GET["name"];
    $temp = $_SESSION["id"];
    $sql = "SELECT `lot` FROM `products` WHERE id_ph=$temp and name='$name' AND amount!=0"; 
    $result = $pharm->query($sql);
    if ($result->num_rows > 0) {

        $row = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($row);
    }
    else
    {
        echo "";
    }
}
