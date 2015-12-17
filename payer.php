<?php
require_once('requete_appart.php');
include 'connexion.php';

$idappart = $_GET['id']; // id appartement à payer
$req = "select contratlocation.IDCONTRAT from contratlocation inner join appartement on appartement.IDAPPARTEMENT = contratlocation.IDAPPARTEMENT where contratlocation.IDAPPARTEMENT=$idappart;";
$result = odbc_exec($conn,$req);
$idContrat = odbc_result($result, 1);
// 4         5

$idPaiement = "select TOP 1 paiement.IDPAIEMENT from paiement  INNER JOIN contratlocation ON paiement.IDCONTRAT = contratlocation.IDCONTRAT WHERE paiement.IDCONTRAT=$idContrat order by paiement.IDPAIEMENT desc ;";
$result = odbc_exec($conn,$idPaiement);
$idlol = odbc_result($result, 1);
// 4         5


$update = "update paiement set DATEPAIEMENT = getdate() where IDPAIEMENT = $idlol;";
$result = odbc_exec($conn,$update);

header ('Location: locataire.php');
?>