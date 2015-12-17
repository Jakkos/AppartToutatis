<?php
	// On définit les 4 variables nécessaires à la connexion MySQL :

$dsn = "Corail";

$user     = "User1_GroupeD";
$password = "azerty";
$server = "172.21.9.94";
$port = "4100";
$db = "M1_GroupeD";


if (isset( $_SESSION['idsysuser']))
{
	$id =  (int)$_SESSION['idsysuser'];
	switch ($id) {
		case '1':
		$user =   "User1_GroupeD";
		$db = "M1_GroupeD";
		break;
		case '3':
		$user = "User2_GroupeD";
		$db = "M1_GroupeD";
		break;
		case '4':
		$user = "User3_GroupeD";
		$db = "M1_GroupeD";
		break;
		case '5':
		$user = "User4_GroupeD";
		$db = "M1_GroupeD";
		break;
		case '6':
		$user = "User5_GroupeD";
		$db = "M1_GroupeD";
		break;
		case '7':
		$user = "User1_GroupeA";
		$db = "M1_GroupeA";
		break;
		case '8':
		$user = "User1_GroupeB";
		$db = "M1_GroupeA";
		break;
		default:
		$user = "User1_GroupeD";
		$db = "M1_GroupeD";
		break;
	}
}
$dsn = "Driver={Adaptive Server Enterprise};Server=172.21.9.94;Port=4100;Database".$db.";UID=".$user.";Password=azerty;";
$password = "azerty";

$conn = odbc_connect($dsn,$user,"azerty");

	$req = "use M1_GroupeD";
	odbc_exec($conn,$req);

	//req = "alter table contratlocation add DMDPROLONG tinyint null";

//$req = "dump tran M1_GroupeD with no_log";
//	odbc_exec($conn,$req);	

	//User1_GroupeA   azerty visiteur => connexion auto dessus 			uid:7
	// ET on les change ici 
	//User1_GroupeD    chefagence     uid:1
	//User2_GroupeD    employé			uid:3
	//User3_GroupeD    locataire		uid:4
	//User4_GroupeD    proprietaire		uid:5
	//User5_GroupeD    locprop			uid:6
	//User2_GroupeA		userco 			uid:8
	
?>