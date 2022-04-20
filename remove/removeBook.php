<?php
include "../config.php";

$params = explode("|",htmlentities($_POST['selectedBook'], ENT_QUOTES, "UTF-8"));

$sql_query = "DELETE FROM soggiornare WHERE soggiornare.nStanza = ".$params[0]." and soggiornare.id_utente=".$params[1]." and soggiornare.inizio='".$params[2]."' and soggiornare.fine='".$params[3]."';";
mysqli_query($con, $sql_query);


header('Location: ../admin.php');