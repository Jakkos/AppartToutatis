<?php
require_once('requete_appart.php');
include 'connexion.php';

$idappart = $_GET['id']; // id appartement à payer
$req = "select contratlocation.IDCONTRAT from dbo.contratlocation inner join appartement on appartement.IDAPPARTEMENT = contratlocation.IDAPPARTEMENT where contratlocation.IDAPPARTEMENT=$idappart;";
$result = odbc_exec($conn,$req);
$idContrat = odbc_result($result, 1);
// 4         5


$update = "update dbo.contratlocation set DATEASSURANCE = getdate() where IDCONTRAT = $idContrat;";
$result = odbc_exec($conn,$update);

header ('Location: locataire.php');
?>