<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit();
}
include "../includes/conn.php";
$id_ph = $_SESSION["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $client = $_POST["client"];
    $type = $_POST["type"];  /// if 1 it's for old recorde 
    $employs = $_POST["employs"];
    $name = $_POST["name"];
    $lot = $_POST["Lot"];
    $amount = $_POST["amount"];
    $num_order = $_POST["num_order"];
    $ds = $_POST["sale_date"];
    $dure = $_POST["dure"];
    $note = $_POST["note"];
    $id_c = null ; 
    if (count($name) == count($lot) && count($lot) == count($amount)) {
        $counter = count($name);
        /// next sale 
        $ns = date('Y-m-d', strtotime($ds . ' +  ' . $dure . ' days'));
        // make a recorde of this operation first we need the time 
        $table = $_SESSION["clients"];
        $sql = "SELECT * FROM `$table` WHERE  `name`='$client'";
        $result = $pharm->query($sql);
        if ($result->num_rows > 0 && $result->num_rows < 2) {
            while ($row = $result->fetch_assoc()) {
                $id_c =  $row['id'];
                /// fix this so we creat a recorde to solve here 
            }
        } else {
            /*there is a problem we have more then 2 rows in the database same name */
            //fix (we creat a client ) and take the id 
            $sql = "INSERT INTO `$table` (`name` ) values ('$client')";

            if ($pharm->query($sql) === TRUE) {
                $id_c = $pharm->insert_id;
                $sql = "update `$table` set client='$id_c' where id='$id_c'  ";
                $pharm->query($sql);
            }
        }
        /// do a test to cheack if the amounts are right
        for ($i=0; $i < count($name) && $type != 1 ; $i++) {
            $tn = $name[$i];
            $tl = $lot[$i];
            $ta = $amount[$i];
            $sql = "SELECT * FROM `products` WHERE id_ph ='$id_ph' and  `name`='$tn' and lot='$tl' and amount>='$ta'";
            $result = $pharm->query($sql);
            if ($result->num_rows > 0 && $result->num_rows < 2  ) {
                // this is good 
            }
            else
            {
                $_SESSION["danger"] = " you have roung input in '$tn' , '$tl' , '$ta' ";
                header("Location: /sales.php");
                exit();
              
            }
        }
        
        /// if we here the re
        // the meditavtion variable 
        for ($i = 0; $i < $counter; $i++) {

            $n = $name[$i];
            $l = $lot[$i];
            $a = $amount[$i];
            //check if it exist and then do the change 
            if ($type != 1) {
                if (!empty($n) && !empty($l) && !empty($a)) {
                    $sql = "UPDATE products SET amount=(amount-$a) , `date_modif`=CURRENT_TIMESTAMP WHERE id_ph ='$id_ph'  and  `name`='$n' and lot='$l'";
                    $pharm->query($sql);
                }
            }
        }
        $mdication = null; // gentrat the text for the sale 
        for ($i = 0; $i < count($name); $i++) {
            if ($amount[$i] != 0) {
                for ($j = $i + 1; $j < count($name); $j++) {
                    if ($name[$i] == $name[$j]) {
                        $amount[$i] +=  $amount[$j];
                        $amount[$j] = 0;
                    }
                }
                $mdication = $mdication . $name[$i]  . " : "  . $amount[$i] . " bts\n";
            }
        }
        $sql = "INSERT INTO `sales` (`id_pharm`, `id_client`, `client`, `medication`, `num_order`, `dure`, `sales_date`, `next_date`
        , `note` ,`sales_id`)  VALUES  ('$id_ph' , '$id_c' , '$id_c' , '$mdication', '$num_order' , '$dure' , '$ds' ,'$ns' , '$note' , '$employs' ) ";
        $pharm->query($sql);
    
       
        /// update client inforamtion 
       
            $sql = "UPDATE `$table` SET `next_sales`='$ns' , `note`='$note' WHERE id= '$id_c'";
            $pharm->query($sql);
            echo '<html>  <body>  <script>  window.history.back() </script>  </body>  </html>';
            //header("Location: /sales.php");
        exit();
    } else {
        /* some shit here dispaly a msg */
    }
}
