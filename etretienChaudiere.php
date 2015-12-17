<?php
require_once('requete_appart.php');
include 'connexion.php';

$idappart = $_GET['id']; // id appartement à payer


$update = "update appartement.dbo set DATEASSURANCE = getdate() where IDAPPARTEMENT = $idappart;";
$result = odbc_exec($conn,$update);

header ('Location: locataire.php');
?>
