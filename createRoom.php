<?php
include "config.php";


$sql_query = "INSERT INTO stanze (nStanza, nome, posti, piano) VALUES (".$_POST['nStanza'].",'".$_POST['name']."', ".$_POST['roomSlot'].", '".htmlentities($_POST['plan'], ENT_QUOTES, "UTF-8")."')";
mysqli_query($con, $sql_query);


header('Location: admin.php');