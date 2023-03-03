<?php
$expire = 365 * 24 * 3600; // We choose a one year duration
ini_set('session.gc_maxlifetime', $expire);
session_start(); // start a session
setcookie(session_name(), session_id(), time() + $expire);
$_SESSION["success"] = null; //
$_SESSION["danger"] = null; //
$user = null; // user
$pwd = null; // password
if (isset($_SESSION["id"])) {
	header("Location: /index.php");
	exit();
} else {

	include "includes/conn.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["user"] != null && $_POST["pwd"] != null) {
		$user = $_POST["user"];
		$pwd = $_POST["pwd"];
		$sql = "SELECT * FROM `emploes` WHERE  username = '$user' and pwd= '$pwd'";
		$result = $pharm->query($sql);
		if ($result->num_rows > 0 && $result->num_rows < 2) {
			$result = $result->fetch_assoc();
			$_SESSION["id"] = $result["id_pharm"];
			$_SESSION["type"] = $result["type"];
			$_SESSION["name"] = $result["username"];
			$_SESSION["clients"] = "clients" . strval($result["id_pharm"]);
			/// msg shit 
			$_SESSION["success"] = null; // 
			$_SESSION["danger"] = null; //
			if ($_SESSION["type"] == "admin") {
				header("Location: /index.php");
			} else {
				header("Location: /clients.php");
			}

			exit();
		} else {
			$_SESSION["danger"]  = "Please enter a valid username or password.";
			$user = "";
			$pwd = "";
		}
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="	Mohsssne boulahbal">


	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/avatars/img2.jpg" />



	<title>Sign In</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img/avatars/img2.jpg" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form id=" log_in" action="login.php" method="post">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" placeholder="Username" name="user" value="<?php echo "$user" ?>" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" placeholder="Password" name="pwd" value="<?php echo "$pwd" ?>">
											<small>
												<a href="#">Forgot password?</a> <a style="float: right" href="/signup.php">creat a new acount</a>
											</small>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>