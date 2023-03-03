   <?php  if ($_SESSION["success"] != null)

        echo   " <div class='alert alert-success alert-dismissible fade show'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        <strong> " . $_SESSION["success"]  . "</strong>
    </div>
    ";
    $_SESSION["success"]  = null; // so the msg stop 

    if ($_SESSION["danger"] != null)

        echo   " <div class='alert alert-danger alert-dismissible fade show'>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        <strong> " . $_SESSION["danger"]  . "</strong>
    </div>
    ";
    $_SESSION["danger"]  = null; // so the msg stop  
    ?>
