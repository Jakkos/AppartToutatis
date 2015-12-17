<?php
require_once('connexion.php');
$id = $_GET['id'];
$req = "UPDATE contratlocation SET DMDPROLONG = 1 WHERE IDAPPARTEMENT=".$id;
odbc_exec($conn, $req);

header('Location: appartement.php?id='.$id.'')

?>