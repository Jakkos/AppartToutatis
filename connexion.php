<?php
	// On définit les 4 variables nécessaires à la connexion MySQL :

	$dsn = "Corail";
	$user     = "User1_GroupeD";
	$password = "azerty";
	
	// Connexion au serveur MySQL
	$conn = odbc_connect($dsn, $user, $password) or die(odbc_error());
?>