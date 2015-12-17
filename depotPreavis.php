<?php

require_once('requete_appart.php');
include 'connexion.php';

$idappart = $_GET['id'];
$req = get_appart($_GET['id']);
$result = odbc_exec($conn,$req);
$type = odbc_result($result, 4);


switch ($type){
	case 1:
	// standar => 3mois
	$req = "select contratlocation.IDCONTRAT from contratlocation inner join appartement on appartement.IDAPPARTEMENT = contratlocation.IDAPPARTEMENT where contratlocation.IDAPPARTEMENT=$idappart and DATEFINLOC<dateadd(mm,3,getDate()) ;";
	$result = odbc_exec($conn,$req);
	$idContrat = odbc_result($result, 1);

		
	if($idContrat!=null)
	{
		$update = "update contratlocation set DATEFINLOC = dateadd(mm,3,getDate()) where IDCONTRAT = $idContrat;";
		$result = odbc_exec($conn,$update);
	}

	
	break;

	case 2:
	// vacances
	break;

	case 3:
	$req = "select contratlocation.IDCONTRAT from contratlocation inner join appartement on appartement.IDAPPARTEMENT = contratlocation.IDAPPARTEMENT where contratlocation.IDAPPARTEMENT=$idappart and DATEFINLOC<dateadd(mm,1,getDate()) ;";
	$result = odbc_exec($conn,$req);
	$idContrat = odbc_result($result, 1);
	
	if($idContrat!=null)
	{
		$update = "update contratlocation set DATEFINLOC = dateadd(mm,1,getDate()) where IDCONTRAT = $idContrat;";
		$result = odbc_exec($conn,$update);
	}
	

		break;
}
//header('Location: locataire.php');
?>