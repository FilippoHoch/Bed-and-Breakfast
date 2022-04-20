<?php
include "../config.php";

$sql_query = "DELETE FROM stanze WHERE stanze.nStanza = ".htmlentities($_POST['selectedRoom'], ENT_QUOTES, "UTF-8").";";
mysqli_query($con, $sql_query);


header('Location: ../admin.php');