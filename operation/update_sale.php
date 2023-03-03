<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}
include "../includes/conn.php";
$id_ph = $_SESSION["id"];
$id = $_POST["id"];
$med = $_POST["medication"]; 
$note = $_POST["note_fix"];
$no = $_POST["num_order"];
$ds = $_POST["sale_date"];
$dure = $_POST["dure"];
$employee = $_POST["employs"];
$dn = date('Y-m-d', strtotime($ds . ' +  ' . $dure . ' days'));

$sql = "UPDATE `sales` SET `num_order`='$no',`sales_id`='$employee',`dure`='$dure',`sales_date`='$ds',`medication`='$med',`next_date`='$dn',`note`='$note',`creat_date`=CURRENT_TIMESTAMP WHERE id='$id' ; ";
$pharm->query($sql);
echo '<html>  <body>  <script>  window.history.back() </script>  </body>  </html>';

exit();
