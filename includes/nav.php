<nav id="nav" style="background-color: rgb(255, 255, 255)" class="navbar">
    <form class="container-fluid justify-content-start">
        <form class="container-fluid justify-content-start">

            <?php
            if ($_SESSION["type"] == "admin") {
              echo ' <a class="btn btn-danger" type="button" class="navbar-brand" href="index.php">drugs</a>
            <a class="btn btn-success" type="button" class="navbar-brand" href="sales.php">Sales</a>' ; 
            } 
            ?>
           
            <a class="btn btn-primary" type="button" class="navbar-brand" href="clients.php">clients</a>
            <a class="btn" style="background-color:#25007A;color:white" type="button" class="navbar-brand" href="donation.php">donations</a>
            <a class="btn btn-warning" type="button" style="color:white" class="navbar-brand" href="expiration.php">péremption</a>
            <a class="btn btn-primary" type="button" class="navbar-brand" style="background-color:black" href="logout.php">logout</a>
        </form>
    </form>
</nav>