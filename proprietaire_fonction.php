<?php 
include ('connexion.php');
$id = $_GET['id'];

$req = "UPDATE appartement SET ESTDISPONIBLE = ".$_GET['a']." WHERE IDAPPARTEMENT=".$id;
odbc_exec($conn,$req);

header('Location: proprietaire.php');
echo 'ok';
?>