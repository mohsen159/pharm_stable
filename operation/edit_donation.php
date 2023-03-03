<?php

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}

include "../includes/conn.php";
$id_c = $_POST["id"];
$name = $_POST["name"];
$dci = $_POST["dci"];
$exp = $_POST["exp"];
$amount = $_POST["amount"];
$sql = "UPDATE `dunation` SET `dci`='$dci',`name`='$name',`expiration`='$exp',`amount`='$amount'   WHERE id=" . $id_c;

if ($pharm->query($sql) === true) {
    header("Location: ../donation.php");
    exit();
} else {

    echo "Error: " . $sql . "<br>" . $pharm->error;
}

$conn->close();
