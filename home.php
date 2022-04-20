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
	<title>B&B</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.0.2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="assets\css\style.css" rel="stylesheet">


</head>

<body class="main-layout">

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
	<!-- form_lebal -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<form class="form_book" action="rooms.php" method="post">
						<div class="row">
								<div class="col-md-3">
									<label class="date">ARRIVAL DATE</label>
									<input class="book_n" type="date" name="arrivalDate">
								</div>
								<div class="col-md-3">
									<label class="date">DEPARTURE DATE</label>
									<input class="book_n" type="date" name="departureDate">
								</div>
								<div class="col-md-3">
									<label class="date">PERSON</label>
									<input class="book_n" placeholder="2" type="type" name="person">
								</div>
								<div class="col-md-3">
									<button type="submit" class="book_btn">Book Now</button>
								</div>
							</form>
							</div>
					</form>
				</div>
			</div>

		</div>
	</section>
	<!-- end form_lebal -->
	<!-- choose  section -->
	<div class="choose">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="choose_box">
						<div class="titlepage">
							<h2><span class="text_norlam">Choose The Perfect</span> <br>Accommodation</h2>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
						<a class="read_more" href="#">See More</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="img_box">
								<figure><img src="../Bed-and-Breakfast/assets/img/top1.webp" alt="#" /></figure>
							</div>
						</div>
						<div class="col-md-6">
							<div class="img_box">
								<figure><img src="../Bed-and-Breakfast/assets/img/top2.jpg" alt="#" /></figure>
							</div>
						</div>
						<div class="col-md-6">
							<div class="img_box">
								<figure><img src="../Bed-and-Breakfast/assets/img/top3.jpg" alt="#" /></figure>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end choose  section -->
	<!-- our  section -->
	<div class="our">
		<div class="container">
			<div class="row d_flex">
				<div class="col-md-6">
					<div class="img_box">
						<figure><img src="../Bed-and-Breakfast/assets/img/top4.jpg" alt="#" /></figure>
					</div>
				</div>
				<div class="col-md-6">
					<div class="our_box">
						<div class="titlepage">
							<h2><span class="text_norlam">Our Best </span> <br>Breakfast</h2>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
						<a class="read_more" href="#">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end our  section -->

	<?php
// TODO: Lista staze
// TODO: Prenotazione
// TODO: Gestisci tue prenotazioni (disdire)


// TODO: admin controllo utenti e stanze