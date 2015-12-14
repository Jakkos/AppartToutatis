<?php
include 'administration/c_admin.php';
include 'connexion.php';

echo <<<END
			<!DOCTYPE html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <meta name="description" content="">
			  <meta name="author" content="">
			  <title>Appartt</title>

			  <!-- Bootstrap Core CSS -->
			  <link href="css/bootstrap.css" rel="stylesheet">

			  <!-- Custom CSS -->
			  <link href="css/mine.css" rel="stylesheet">
			</head>
			<body>
END;
include 'navbar.php';

$req = "select * from sysusers;";



$result = odbc_exec($conn,$req);
while(odbc_fetch_row($result)){
  $id = odbc_result($result, 1);
  $photo = odbc_result($result, 2);
  $a = odbc_result($result, 3);
  $b = odbc_result($result, 4);
echo '<p>'.$id.'</p>';
echo '<p>'.$photo.'</p>';
echo '<p>'.$a.'</p>';
echo '<p>'.$b.'</p>';
echo '<p></p>';
}
// affichage de sa liste d'appartement
// bouton payer
// déposer contrat assurance et entretien chaudière
?>