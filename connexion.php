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
		$user = "User2_GroupeA";
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

echo $dsn;
//echo $dsn;
$conn = odbc_connect($dsn,$user,"azerty");

?>