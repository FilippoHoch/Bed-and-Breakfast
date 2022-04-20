<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['name'])) {
	header('Location: index.php');
}

// logout
if (isset($_POST['but_logout'])) {
	session_destroy();
	header('Location: index.php');
}
?>


<!doctype html>
<html lang="en">

<head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.0.2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="assets\css\style.css" rel="stylesheet">

</head>

<body>

	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

	<!-- banner -->
	<section>
		<div class="banner_main" style="background-image: url('../Bed-and-Breakfast/assets/img/header-bg.jpg') !important;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="text-bg">
							<div class="padding_lert">
								<img src="../Bed-and-Breakfast/assets/img/logo.png">
								<form method='post' action="">
									<input type="submit" value="Logout" class="btn btn_dark read_more" name="but_logout">
								</form>
								<br>
								<h1>Welcome to our Bed and Breakfast</h1>
								<span>One of the most HIGH ranked b&b</span>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel pretium leo. Quisque ac mauris pulvinar, condimentum mauris id, sollicitudin sem. In hac habitasse platea dictumst. Maecenas porttitor ornare metus ac auctor. Integer molestie, lorem in bibendum suscipit, lorem nibh porta lorem, id dignissim turpis lectus ac nisi. Sed ut urna ex. Suspendisse at tincidunt erat. Donec scelerisque dolor non risus commodo tincidunt et consequat dui.</p>
								<br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end banner -->

	<!-- choose  section -->
	<div class="choose">
		<div class="container">
			<div class="row">
				<form action="createRoom.php" method="post">
					<div class="row">
						<div class="col-md-2">
							<label class="date">N. room</label>
							<input class="book_n" type="text" name="nStanza">
						</div>
						<div class="col-md-2">
							<label class="date">Name</label>
							<input class="book_n" type="text" name="name">
						</div>
						<div class="col-md-2">
							<label class="date">N. Person</label>
							<input class="book_n" placeholder="2" type="text" name="roomSlot">
						</div>
						<div class="col-md-3">
							<label class="date">Plan</label>
							<select class="form-select book_n" aria-label="Default select example" name="plan">
								<option value="Terra">Terra</option>
								<option value="Primo">Primo</option>
								<option value="Seminterrato">Seminterrato</option>
							</select>
						</div>

						<div class="col-md-2">
							<button type="submit" class="book_btn" style="margin-top: 25px !important;">Add room</button>
						</div>
				</form>
			</div>
		</div>
		<!-- style="margin-top: 0px !important;" -->
		<div class="container">
			<div class="row">
				<form action="remove/removeRoom.php" method="post">
					<div class="row">
						<label> Remove room</label>
						<div class="col-md-3">
							<select class="form-select book_n" aria-label="Default select example" name="selectedRoom">
							<?php
								$sql_query = "SELECT distinct stanze.* FROM stanze;";
								$result = mysqli_query($con, $sql_query);
								$nUsers = mysqli_num_rows($result);
								foreach($result as $row){
									printf('<option value="'.$row['nStanza'].'">'.$row['nStanza'].'</option>');
								}
								?>
								
							</select>
						</div>
						<div class="col-md-2">
							<button type="submit" class="book_btn" style="margin-top: 0px !important;">Remove room</button>
						</div>
				</form>

				<form action="remove/removeUser.php" method="post">
					<div class="row">
						<label> Remove user</label>
						<div class="col-md-3">
							<select class="form-select book_n" aria-label="Default select example" name="selectedUser">
								<?php
								$sql_query = "SELECT distinct utenti.* FROM utenti;";
								$result = mysqli_query($con, $sql_query);
								$nUsers = mysqli_num_rows($result);
								foreach($result as $row){
									printf('<option value="'.$row['id_utente'].'">'.$row['id_utente'].": ".$row['name'].'</option>');
								}
								?>
								
							</select>
						</div>
						<div class="col-md-2">
							<button type="submit" class="book_btn" style="margin-top: 0px !important;">Remove user</button>
						</div>
				</form>

				<form action="remove/removeBook.php" method="post">
					<div class="row">
						<label> Remove book</label>
						<div class="col-md-3">
							<select class="form-select book_n" aria-label="Default select example" name="selectedBook">
							<?php
								$sql_query = "SELECT distinct soggiornare.* FROM soggiornare;";
								$result = mysqli_query($con, $sql_query);
								$nUsers = mysqli_num_rows($result);
								foreach($result as $row){
									printf('<option value="'.$row['nStanza'].'|'.$row['id_utente'].'|'.$row['inizio'].'|'.$row['fine'].'">'.$row['nStanza'].', '.$row['id_utente'].', inzio: '.$row['inizio'].', fine: '.$row['fine'].'</option>');
								}
								?>
							</select>
						</div>
						<div class="col-md-2">
							<button type="submit" class="book_btn" style="margin-top: 0px !important;">Remove book</button>
							<br>
							<br>
						</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end choose  section -->
</body>

</html>