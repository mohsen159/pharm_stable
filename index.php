<?php
$name = "psychotrope";

include "includes/session.php";
include "includes/conn.php";
if ($_SESSION["type"] == "admin") {
} else {
	header("Location: /clients.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "includes/head.php"; ?>
	<script>
		// this part is about auto complete stuff
		let lot = []; /// for testing lot 
		let drugs = []; /// for drugs 
		let dci = []; /// for dci 
		let products = []; /// help me find the dci for a product in find_dci func 
		function fetch_products() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					products = data;
					dci = data.map(function(obj) {
						return obj.dci;
					});
					/// to delet duplicated value 
					dci = [...new Set(dci)];
					drugs = data.map(function(obj) {
						return obj.name;
					});
				}
			};
			xmlhttp.open("GET", window.location.origin + "/operation/fetch_index.php");
			xmlhttp.send();
		}

		function call(id) {
			autocomplete(document.getElementById(id), drugs);
		}

		function sale(id, name) {
			window.location.assign(window.location.origin + "/client.php?id=" + id + "&name=" + name);
		}

		function find_dci(arg) {

			let parent = arg.parentNode;
			const myNodelist = parent.querySelectorAll("input");
			const n = drugs.indexOf((myNodelist[0].value));
			if (n != -1) {
				myNodelist[3].value = products[n].dci;
			}
			lot_auto(myNodelist[1]);
		}

		function delet_p(element) {
			if (element.parentElement === document.getElementById("1")) {
				/// no need for the form to be visible
				alert("Please set on input for validation the form");
			} else {
				element.parentElement.remove();
			}
		}
		// this is stupid shit change it in the modeal 
		// use local storge to prevent your self from doing this again all the time 
		function drugs_auto(element) {
			autocomplete(element, drugs);
		}

		function lot_auto(element) {
			/// calculate possible values lot before !!
			let parent = element.parentNode;
			const myNodelist = parent.querySelectorAll("input");
			let n = myNodelist[0].value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					lot = []; // just for test 
					lot = data.map(function(obj) {
						return obj.lot;
					});
				}
			};
			xmlhttp.open("GET", window.location.origin + "/operation/fetch_index.php?name=" + n);
			xmlhttp.send();
			autocomplete(element, lot);
		}

		function dci_auto(element) {
			autocomplete(element, dci);
		}
		let count = 1;

		function addElement() {
			const newDiv = document.createElement("div");
			const currentDiv = document.getElementById("1");
			const nothing = document.getElementById("0");
			newDiv.id = ++count;
			newDiv.innerHTML = currentDiv.innerHTML;
			newDiv.classList.add("mt-3", "autocomplete", "d-flex", "flex-nowrap", "space", "justify-content-between");
			document.getElementById("new_drog").insertBefore(newDiv, nothing);
		}

		function validateForm() {
			/// under day okay deal with it in the server for know !! 
			return true;
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
							<i class="align-middle" data-feather="log-out"></i> <span class="align-middle">se d??connecter</span>
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


				<h1 class="h3 mb-3">Psychtrop </h1>
				<br>

				<div class="row">
					<table id="donate" style="width:100%" class="display" class="display table table-hover my-0">
						<thead>
							<tr>
								<th>Name</th>
								<th>Dci</th>
								<th>lot</th>
								<th>amount</th>
								<th class='operation'>More</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$temp = $_SESSION['id'];
							$sql = "SELECT * FROM `products` WHERE amount!=0 and id_ph = '$temp' ";
							$result = $pharm->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {

									echo "<tr class='sill'>";
									echo "<td>" . $row['name'] . "</td>";
									echo "<td>" . $row['dci'] . "</td>";
									echo "<td>" . $row['lot'] . "</td>";
									echo "<td>" . $row['amount'] . "</td>";
									echo "<!--td>" . "</td-->";
									echo "<td class='operation'> 
                  <button class='btn btn-info btn-sm edit btn-flat'  data-bs-toggle='modal' data-bs-target='#edit' 
                  onclick=\"drug_edit('" . $row['id'] . "','" . $row['name'] . "','" . $row['lot'] . "','" . $row['amount'] . "')\">Info</button> 
									</tr> ";
								}
							}
							?>
						</tbody>
					</table>
					<?php include "model/index_model.php"; ?>

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
	$(document).ready(function() {
		$('#donate').DataTable({

			responsive: true,
			paging: false,
			dom: 'Bfrtip',
			buttons: [{
					text: 'add',
					action: function() {

						if (dci.length == 0) {
							fetch_products();
							/// i had like to creat a local storge so no need to upload data but wtf 
							// nothing work stupid shit so we just keep request all the time 
							/*if (localStorage.getItem("dci") === null) {
								localStorage.setItem('dci', JSON.stringify(dci));
								localStorage.setItem('drugs', JSON.stringify(drugs));
							} else {
								dci = JSON.parse(localStorage.getItem('dci'));
								drugs = JSON.parse(localStorage.getItem('drugs'));
							}*/

						} else {

							console.log("we created it before ");
						}
						$('#myModal').modal('show');
					}
				},
				{
					extend: 'print',
					messageTop: ' ',
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
				[1, "desc"]
			],
			columns: [{
					"width": "100px"
				},
				{
					"width": "100px"
				},
				{
					"width": "20px"
				},
				{
					"width": "20px"
				},
				{
					"width": "100px"
				}
			]
		});
	});
</script>

<style>



</style>

</html>