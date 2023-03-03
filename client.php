<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    // cheak if we have a session later on
    include "includes/session.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="boulahbal mohssen">
    <title><?php echo $name; ?></title>
    <link rel="icon" href="img/logo.png">
    <!-- Latest compiled and minified CSS -->
    <link href="/assest/boot/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
    <!--- dashboard style-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/avatars/img1.jpg" />
    <link href="css/app.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script type="text/javascript" src="/js/jquery-3.5.1.js"></script>
    <!--script src="assest/boot/dist/js/bootstrap.bundle.min.js"></script-->
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="/js/jszip.min.js"></script>
    <script type="text/javascript" src="/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/js/buttons.colVis.min.js"></script>

    <!--font Awesome-->
    <link href="/assest/fontawesome/css/all.css" rel="stylesheet">
    <style type="text/css">
        .space input {
            margin-right: 5px;
        }

        pre {
            font-size: 14px !important;
        }
    </style>
    <script src="js/app.js"></script>

    <script src="js/main.js"></script>
    <script>
        <?php
        include "includes/conn.php";
        $temp = $_SESSION["clients"];

        $sql = "SELECT * FROM `$temp`";
        $res = null;
        $r = $pharm->query($sql);
        if ($r->num_rows > 0) {
            while ($row = $r->fetch_assoc()) {
                $temp = $row['name'];
                $res .= "'$temp',";
            }
        }
        echo "let clients =[$res'null'] ; ";

        $temp = $_SESSION["id"];
        $sql = "SELECT DISTINCT `lot` FROM `products` WHERE id_ph='$temp'";
        $list_lot = null;
        $m = $pharm->query($sql);
        if ($m->num_rows > 0) {
            while ($row = $m->fetch_assoc()) {
                $v = $row['lot'];
                $list_lot .= "'$v',";
            }
        }
        echo " let lot = [$list_lot'null'] ; ";
        $sql = "SELECT distinct `name` FROM `products` where id_ph='$temp' ";
        $list_drugs = null;
        $m = $pharm->query($sql);
        if ($m->num_rows > 0) {
            while ($row = $m->fetch_assoc()) {
                $v = $row['name'];
                $list_drugs .= "'$v',";
            }
        }
        echo "let drugs =[ $list_drugs'null']  ; ";

        $sql = "SELECT distinct `dci` FROM `dunation` where id_ph='$temp' ";
        $list_drugs = null;
        $m = $pharm->query($sql);
        if ($m->num_rows > 0) {
            while ($row = $m->fetch_assoc()) {
                $v = $row['dci'];
                $list_drugs .= "'$v',";
            }
        }
        echo "let dci =[ $list_drugs'null']  ; ";
        $sql = "SELECT distinct `name` FROM `dunation` where id_ph='$temp' ";
        $list_drugs = null;
        $m = $pharm->query($sql);
        if ($m->num_rows > 0) {
            while ($row = $m->fetch_assoc()) {
                $v = $row['name'];
                $list_drugs .= "'$v',";
            }
        }
        echo "let products =[ $list_drugs'null']  ; ";
        ?>

        function call(id) {
            autocomplete(document.getElementById(id), drugs);
        }

        function sale(id, name) {
            window.location.assign(window.location.origin + "/client.php?id=" + id + "&name=" + name);
        }
    </script>


</head>

<body>
    <script>
        function user(name) {
            document.forms["form_sales"]["client"].value = name;
        }
    </script>

    <script>
        function delet_p(element) {
            if (element.parentElement === document.getElementById("1")) {
                /// no need for the form to be visible
                alert("Please set on input for validation the form");
            } else {
                element.parentElement.remove();
            }
        }

        function drugs_auto(element) {
            autocomplete(element, drugs);
        }

        function lot_auto(element) {
            autocomplete(element, lot);
        }
        let count = 1;

        function addElement() {
            const newDiv = document.createElement("div");
            const currentDiv = document.getElementById("1");
            const nothing = document.getElementById("0");
            newDiv.id = ++count;
            newDiv.innerHTML = currentDiv.innerHTML;
            newDiv.classList.add("mt-3", "autocomplete", "d-flex", "flex-nowrap", "space", "justify-content-between");
            document.getElementById("form_sales").insertBefore(newDiv, nothing);
        }
    </script>


    <style>
        .space input {
            margin-right: 10px;
        }

        .space input {
            margin-right: 10px;
        }
    </style>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar collapsed">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.php">
                    <span class="align-middle">hakim pharm</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Pages
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="dashbord.php">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="setting.php">
                            <i class="align-middle" data-feather="settings"></i> <span class="align-middle">settings</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php">
                            <i class="align-middle" data-feather="box"></i> <span class="align-middle">psychotrope</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="sales.php">
                            <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Ventes</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="clients.php">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">clients</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="donation.php">
                            <i class="align-middle" data-feather="heart"></i> <span class="align-middle">Dons</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="expiration.php">
                            <i class="align-middle" data-feather="trash-2"></i> <span class="align-middle">Expirations</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="logout.php">
                            <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">se déconnecter</span>
                        </a>
                    </li>




                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="bell"></i>
                                    <span class="indicator">4</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    4 New Notifications
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-danger" data-feather="alert-circle"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                                                <div class="text-muted small mt-1">30m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-warning" data-feather="bell"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Lorem ipsum</div>
                                                <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-primary" data-feather="home"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Login from 192.186.1.8</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-success" data-feather="user-plus"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">New connection</div>
                                                <div class="text-muted small mt-1">Christina accepted your request.</div>
                                                <div class="text-muted small mt-1">14h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="message-square"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                                <div class="dropdown-menu-header">
                                    <div class="position-relative">
                                        4 New Messages
                                    </div>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Vanessa Tucker</div>
                                                <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                                                <div class="text-muted small mt-1">15m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">William Harris</div>
                                                <div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Christina Mason</div>
                                                <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
                                                <div class="text-muted small mt-1">4h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Sharon Lessman</div>
                                                <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all messages</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?php echo $_SESSION["name"] ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">


                <h1 class="h3 mb-3">client : <?php echo $name;  ?></h1>
                <!--button type="button" id="btn" class="fa fa-plus btn btn-primary" onclick="user('<?php echo $name; ?>' )" data-bs-toggle="modal" data-bs-target="#myModal">
                </button-->

                <div class="row">
                    <table id="donate" style="width:100%" class="display" class="display table table-hover my-0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>num order</th>
                                <th>medication</th>
                                <th>date_sales</th>
                                <th>next_sales</th>
                                <th>dure</th>
                                <th>operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $temp = $_SESSION["id"];
                            $sql =  "SELECT * FROM `sales` where id_pharm= '$temp' AND  client='$id'";
                            $result = $pharm->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr class='sill'>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['num_order'] . "</td>";
                                    echo "<td><pre >" . $row['medication'] . $row['note'] . "</pre ></td>";
                                    echo "<td>" . $row['sales_date'] . "</td>";
                                    echo "<td style='color:red;'>" . $row['next_date'] . "</td>";
                                    echo "<td>" . $row['dure'] . "</td>";
                                    echo
                                    "<td class='operation'> 
       
<button onclick=\"sales_edit(" . $row['id'] . ")\" class='btn btn-info btn-sm edit btn-flat'  data-bs-toggle='modal' data-bs-target='#myedit' >More</button>";


                                    echo "</tr> ";
                                }


                                $pharm->close();
                            }
                            ?>
                        </tbody>
                    </table>

                    <?php if ($_SESSION["type"] == "admin") {

                        include "model/client_model.php";
                    } ?>


                </div>



            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="#" target="_blank"><strong></strong></a> &copy; 2022
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#" target="_blank">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#" target="_blank">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#" target="_blank">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#" target="_blank">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<script>
    /// table configuration
    $(document).ready(function() {
        $('#donate').DataTable({
            responsive: true,
            paging: false,
            dom: 'Bfrtip',
            buttons: [{
                    text: 'add',
                    action: function() {

                        <?php
                        if ($_SESSION["type"] == "admin") {
                            echo "user('" . $name . "');   $('#myModal').modal('show');";
                        }
                        ?>

                    }
                },
                {
                    extend: 'excel',
                    text: 'excel',
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'current'
                        }
                    }
                },
                {
                    extend: 'print',
                    messageTop: 'list of sales ',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            columnDefs: [{
                targets: -1,
                visible: true
            }],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
            order: [
                [0, "desc"]
            ],
            columns: [{
                    "width": "40px"
                },
                {
                    "width": "60px"
                },
                {
                    "width": "70px"
                },
                {
                    "width": "100px"
                },
                {
                    "width": "70px"

                },
                {
                    "width": "70px"

                },
                {
                    "width": "100px"
                }
            ]
        });
    });
    // auto complet shit 
</script>



</html>