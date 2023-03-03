<?php

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}

include "../includes/conn.php";
$table = $_SESSION["clients"];
$id_c = $_POST["id"];
$name = $_POST["name"];
$note = $_POST["note"];
$sql = "UPDATE $table SET `name`='$name',`note`='$note'  WHERE id=" . $id_c;

if ($pharm->query($sql) === true) {
    header("Location: ../clients.php");
    exit();
} else {

    echo "Error: " . $sql . "<br>" . $pharm->error;
}

$conn->close();
