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
  $lot = $_POST["Lot"];
  $amount = $_POST["amount"];
  $dci = $_POST["dci"];
  if(count($name) == count($lot) && count($lot) == count($amount)) 
  {
    $counter = count($name);

    for ($i = 0; $i < $counter; $i++) {
    
      $n = $name[$i];
      $l = $lot[$i];
      $a = $amount[$i];
      $ddci = $dci[$i]; 
      //check if it exist and then do the change 
      if (!empty($n) && !empty($l) && !empty($a)) {
        $sql = " SELECT * FROM `products` WHERE `name`='$n' AND lot='$l' and id_ph='$id_ph'";
        $result = $pharm->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $sql = "UPDATE products SET amount=(amount+$a) WHERE id =" . $row["id"];
            $pharm->query($sql);
          }
        } 
        else {
          $sql = "INSERT INTO `products`( `id_ph`, `name`, `lot`, `amount` , `dci` ) 
        VALUES ( $id_ph , '$n','$l','$a' ,' $ddci' )";
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
   
  }
  else
  {
    // erroe msg required here 
  }
  header("Location: /index.php");
  exit();
}
