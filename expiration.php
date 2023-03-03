<?php
$name = "péremption";
$total = 0;
$id_r = 0;
$amount = 0;
include "includes/session.php";

include "includes/conn.php";

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
    </script>
    <script type="text/javascript">
        function show_record(id) {
            window.location.href = window.location.origin + "/expiration.php?id=" + id;
        }

        function exp_edit(id, name, type, amount, prix, datef, datep, ) {

            document.forms["edit_exp"]["id"].value = id;
            document.forms["edit_exp"]["name"].value = name;
            document.forms["edit_exp"]["type"].value = type;
            document.forms["edit_exp"]["amount"].value = amount;
            document.forms["edit_exp"]["prix"].value = prix;
            document.forms["edit_exp"]["datef"].value = datef;
            document.forms["edit_exp"]["datep"].value = datep;
        }
    </script>
</head>

<body>
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


                <h1 class="h3 mb-3">Péremption</h1>

                <div class="row">
                    <table id="donate" style="width:100%" class="display" class="display table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Conditionnment </th>
                                <th>Quantité</th>
                                <th>Prix d'achat</th>
                                <th>PPA</th>
                                <th>Montant</th>
                                <th>Date Fabrication</th>
                                <th>Date péremption</th>
                                <th>More </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $temp = $_SESSION['id'];
                            // if there is a post command set to 
                            if (isset($_GET['id'])) {
                                $id_r = $_GET['id'];
                            }
                            $sql = "SELECT * from  expiration where id_ph= $temp and id_record='$id_r'";
                            $result = $pharm->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr class='sill'>";
                                    //     echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>"  . $row["name"] . "</td>";
                                    echo "<td>"  . $row["condi"] . "</td>";
                                    echo "<td>" . $row["amount"] . "</td>";
                                    echo "<td>" .   round($row["prix"] / 1.2, 2) . "</td>";
                                    echo "<td>"  . $row["prix"] . "</td>";
                                    echo "<td>"  . $row["prix"] * $row["amount"] . "</td>";
                                    $total = ($row["amount"] * $row["prix"]) + $total;
                                    echo "<td>"  . $row["datef"] . "</td>";
                                    echo "<td>"  . $row["datep"] . "</td>";
                                    echo "<td class='operation'> 
                  <button class='btn btn-info btn-sm edit btn-flat'  data-bs-toggle='modal' data-bs-target='#exp_edit' 
                  onclick=\"exp_edit('" . $row['id'] . "','" . $row['name'] . "','" . $row['condi'] . "','" . $row['amount'] . "','" . $row['prix'] . "','" . $row['datef'] . "','" . $row['datep'] . "')\">More</button> 
									</tr> ";
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                    <br>
                    <br>
                    <br>
                    <h3 style="float:right"> Total amount : <span id="total"> <?php echo  $total;   ?></span> </h3>

                    <?php
                    if (!isset($_GET['id'])) {
                        include "model/exp_model.php";
                    } ?>


                </div>



            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="#" target="_blank"><strong></strong></a> &copy; by mohssen boulahbal
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
            buttons: [
                <?php
                if (!isset($_GET['id'])) {
                    echo " {
                    text: 'add',
                    action: function() {
                        $('#iModal').modal('show');
                    }
                },
                {
                    text: 'empty',
                    action: function() {
                        /// open a new model and create a new recorde 
                        ///ask for date and confirm 
                        /// show the total 
                        document.forms['recorde_exp']['exp_total'].value = document.getElementById('total').innerText;
                        $('#iempty').modal('show');

                    }
                },
                {
                    text: 'record',
                    action: function() {
                        $('#irecord').modal('show');
                    }
                },
                ";
                }   ?>


                ,
                {
                    extend: 'print',
                    messageBottom: ' \n \n Total : ' + <?php echo  $total;   ?>,
                    exportOptions: {
                        columns: ':visible'
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
                'colvis'
            ],
            columnDefs: [{
                targets: -1,
                visible: true
            }],
            /*language: {
              search: "_INPUT_",
              searchPlaceholder: "Search..."
            }*/
            language: {
                searchPlaceholder: "Search records",
                search: "",
            },
            order: [
                [5, "desc"]
            ],
            columns: [{
                    "width": "170px"
                },
                {
                    "width": "10px"
                },
                {
                    "width": "10px"
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
                },
                {
                    "width": "30px"
                },
                {
                    "width": "30px"
                }
            ]
        });
    });
    $(document).ready(function() {
        $('#exp').DataTable({
            responsive: true,
            paging: false,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    messageBottom: ' \n \n Total : ' + <?php echo $amount;   ?>,
                    exportOptions: {
                        columns: ':visible'
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
                'colvis'
            ],

            language: {
                searchPlaceholder: "Search records",
                search: "",
            }
        });
    });
</script>

</html>