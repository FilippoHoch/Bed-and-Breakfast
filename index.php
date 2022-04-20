<?php
include "config.php";


$error = "";

if (isset($_POST['but_submit'])) {


	$adminName = "admin";
	$adminSurname = "admin";
	$adminEmail = "admin@gmail.com";
	$adminPassword = "admin";

	$name = mysqli_real_escape_string($con, $_POST['txt_name']);
	$surname = mysqli_real_escape_string($con, $_POST['txt_surname']);
	$email = mysqli_real_escape_string($con, $_POST['txt_email']);
	$password = mysqli_real_escape_string($con, $_POST['txt_pwd']);


	if ($name != "" && $password != "" && $surname != "" && $email != "") {

		$sql_query = "select count(*) as cntUser from utenti where nome='" . $name . "' and cognome='" . $surname . "' and email='" . $email . "' and password='" . $password . "'";
		$sql_query_error = "select count(*) as cntUser from utenti where nome='" . $name . "' and cognome='" . $surname . "' and email='" . $email . "'";
		$resultError = mysqli_query($con, $sql_query_error);
		$result = mysqli_query($con, $sql_query);
		$row = mysqli_fetch_array($result);
		$row_error = mysqli_fetch_array($resultError);

		$count = $row['cntUser'];
		$countError = $row_error['cntUser'];

		if ($count > 0) {
			$sql_query = "select utenti.id_utente from utenti where nome='" . $name . "' and cognome='" . $surname . "' and email='" . $email . "' and password='" . $password . "'";
			$row = mysqli_fetch_array(mysqli_query($con, $sql_query));
			$_SESSION['numberAccount'] = $row['id_utente'];

			$error = "";
			$_SESSION['name'] = $name;


			if ($name == $adminName && $surname == $adminSurname && $email == $adminEmail && $password == $adminPassword) {
				header('Location: admin.php');
			} else {
				header('Location: home.php');
			}
		} else if ($countError > 0) {
			session_destroy();
			$error = "Invalid credentials";
		} else {
			$sql_query = "select utenti.id_utente from utenti where nome='" . $name . "' and cognome='" . $surname . "' and email='" . $email . "' and password='" . $password . "'";
			$row = mysqli_fetch_array(mysqli_query($con, $sql_query));
			$_SESSION['numberAccount'] = $row['id_utente'];

			$error = "";
			$sql_insert_query = "insert into utenti ( email, nome, cognome, password) values ('" . $email . "', '" . $name . "', '" . $surname . "', '" . $password . "');";
			mysqli_query($con, $sql_insert_query);
			$_SESSION['name'] = $name;
			header('Location: home.php');
		}
	}
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>LogIn</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.0.2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- My CSS -->
	<link rel="stylesheet" href="assets\css\style.css">
</head>

<body>

	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

	<section class="vh-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 text-black">

					<div class="px-5 ms-xl-4">
						<i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
						<span class="h1 fw-bold mb-0">Logo</span>
					</div>

					<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

						<form style="width: 23rem;" method="post" action="">

							<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>


							<div class="form-outline mb-4">
								<input type="text" id="txt_name" name="txt_name" class="form-control form-control-lg" required />
								<label class="form-label" for="form2Example18">Name</label>
							</div>

							<div class="form-outline mb-4">
								<input type="text" id="txt_surname" name="txt_surname" class="form-control form-control-lg" required />
								<label class="form-label" for="form2Example18">Surname</label>
							</div>

							<div class="form-outline mb-4">
								<input type="email" id="txt_email" name="txt_email" class="form-control form-control-lg" required />
								<label class="form-label" for="form2Example18">Email address</label>
							</div>

							<div class="form-outline mb-4">
								<input type="password" id="txt_pwd" name="txt_pwd" class="form-control form-control-lg" required />
								<label class="form-label" for="form2Example28">Password</label>
							</div>
							<i style="color: red;" id="error_text"><?php echo $error ?></i>

							<div class="pt-1 mb-4">
								<input class="btn btn-info btn-lg btn-block" type="submit" name="but_submit" id="but_submit"></button>

							</div>
							<i> if the user has not yet registered, he will be registered automatically </i>
						</form>

					</div>

				</div>
				<div class="col-sm-6 px-0 d-none d-sm-block">
					<img src="../Bed-and-Breakfast/assets/img/log-in-bg.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
				</div>
			</div>
		</div>
	</section>


</body>

</html>