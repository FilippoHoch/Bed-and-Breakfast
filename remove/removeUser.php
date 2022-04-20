<?php
include "../config.php";

$sql_query = "DELETE FROM utenti WHERE utenti.id_utente = ".htmlentities($_POST['selectedUser'], ENT_QUOTES, "UTF-8").";";
mysqli_query($con, $sql_query);


header('Location: ../admin.php');