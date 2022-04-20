<?php
include "config.php";

$breakfast = 0;

if($_POST['breakfast'] == "checkedValue"){
	$breakfast = 1;
}


$sql_query = "INSERT INTO soggiornare (nStanza, id_utente, inizio, fine, nPersone, colazione) VALUES (".$_POST['numberRoom'].",".$_SESSION['numberAccount'].",'".$_POST['arrivalDate']."','".$_POST['departureDate']."', ".$_POST['person'].",".$breakfast.")";
mysqli_query($con, $sql_query);


header('Location: home.php');
