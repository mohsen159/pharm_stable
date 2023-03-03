<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}
include "../includes/conn.php";
$id_ph = $_SESSION["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $dci = $_POST["dci"];
    $amount = $_POST["amount"];
    $exp = $_POST["exp"];
    if (count($name) == count($dci) && count($dci) == count($amount) && count($name) == count($exp) ) {
        $counter = count($name);

        for ($i = 0; $i < $counter; $i++) {

            $n = $name[$i];
            $l = $dci[$i];
            $a = $amount[$i];
            $e = $exp[$i];
            //check if it exist and then do the change 
            if (!empty($n) && !empty($l) && !empty($a)) {
                $sql = " SELECT * FROM `dunation` WHERE `name`='$n' AND `expiration`='$e' and id_ph='$id_ph'";
                $result = $pharm->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sql = "UPDATE `dunation` SET amount=(amount+$a) WHERE id =" . $row["id"];
                        $pharm->query($sql);
                    }
                } 
                else {
                    $sql = "INSERT INTO `dunation` ( `id_ph`, `name`, `dci`, `amount` ,   `expiration` ) 
        VALUES ( $id_ph , '$n','$l','$a' ,  '$e' )";
                    //  if prodectus name is new then insert to products list 

                    if ($pharm->query($sql) === true) {
                        // pass some information here like modification 
                        echo "add ";
                    } else {

                        echo "Error: " . $sql . "<br>" . $pharm->error;
                    }
                }
            }
        }
        $pharm->close();
    } else {
        // erroe msg required here 
    }
    header("Location: /donation.php");
    exit();
}
