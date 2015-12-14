<?php
	// On définit les 4 variables nécessaires à la connexion MySQL :

$dsn = "Corail";

$user     = "User1_GroupeD";
$password = "azerty";

if (isset( $_SESSION['idsysuser']))
{
	$id =  (int)$_SESSION['idsysuser'];
	switch ($id) {
		case '1':
		$user =   "User1_GroupeD";
		break;
		case '3':
		$user =   "User2_GroupeD";
		break;
		case '4':
		$user =   "User3_GroupeD";
		break;
		case '5':
		$user =   "User4_GroupeD";
		break;
		case '6':
		$user =   "User5_GroupeD";
		break;
		case '7':
		$user =   "User1_GroupeA";
		break;
		case '8':
		$user =   "User2_GroupeB";
		break;
	}
	echo ($user);
	$conn = odbc_connect($dsn, $user, $password) or die(odbc_error());
}

	// Connexion au serveur MySQL
$conn = odbc_connect($dsn, $user, $password) or die(odbc_error());

	//User1_GroupeA   azerty visiteur => connexion auto dessus 			uid:7
	// ET on les change ici 
	//User1_GroupeD    chefagence     uid:1
	//User2_GroupeD    employé			uid:3
	//User3_GroupeD    locataire		uid:4
	//User4_GroupeD    proprietaire		uid:5
	//User5_GroupeD    locprop			uid:6
	//User2_GroupeA		userco 			uid:8
?>