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

	<br>

	<div class="container-fluid">


		<?php
		$person = $_POST["person"];
		$arrivalDate = $_POST["arrivalDate"];
		$departureDate = $_POST["departureDate"];

		$sql_query = "SELECT distinct stanze.* FROM stanze, soggiornare WHERE stanze.nStanza NOT IN (select distinct stanze.nStanza from soggiornare, stanze WHERE soggiornare.nStanza=stanze.nStanza AND ( soggiornare.inizio<'" . $arrivalDate . "' AND soggiornare.fine>'" . $departureDate . "'  OR stanze.posti<" . $person . "));";
		$result = mysqli_query($con, $sql_query);

		if (mysqli_num_rows($result) == 0) {
			printf("<i> no free room </i>");
		} else {
			foreach ($result as $row) {
				printf(
					'
							<div class="card">
								<div class="card-body">
									<h4 class="card-title"> Stanza: ' . $row['nStanza'] . '</h4>
									<p class="card-text">located: ' . $row['piano'] . ', places: ' . $row['posti'] . ' "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
									<div class="d-flex card text-end" style="border-color: white !important;">
									<label class="form-check-label" for="" style="text-align: left !important;">
										Breakfast:
									</label>
										<form action="book.php"  method="POST" class="ml-auto">
											<div class="form-check">
												<input type="checkbox" class="form-check-input" name="breakfast" value="checkedValue" checked>
											</div>
											<input name="numberRoom" style="display: none !important" value="' . $row['nStanza'] . '">
											<input name="person" style="display: none !important" value="' . $person . '">
											<input name="arrivalDate" style="display: none !important" value="' . $arrivalDate . '">
											<input name="departureDate" style="display: none !important" value="' . $departureDate . '">
											<button type="submit" class="btn btn_dark read_more">Submit</button>
										</form>
									</div>
								</div>
							</div>
							<br>
						'
				);
			}
		}
		?>

	</div>


	<br>


</body>

</html>