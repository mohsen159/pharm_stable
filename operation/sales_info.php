<?php
$id = $_GET['id'];
if(isset($id))
{
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: /login.php");
        exit();
    }
    include "../includes/conn.php";
    $id_ph = $_SESSION["id"];

    $sql = "SELECT `id`,`medication`, `num_order`, `dure`, `sales_date`, `next_date`, `sales_id` , `note` FROM `sales` WHERE id='$id';";
    $result = $pharm->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    }
}

?>