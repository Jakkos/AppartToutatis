<?php
include 'connexion.php';
include 'navbar.php';
include 'administration/dynamic.js';

if (isset($_POST['idVal'])){
	$id = (is_numeric($_POST['idVal']) ? (int)$_POST['idVal'] : 0);
	$req = "UPDATE dbo.appartement_a_valider SET ESTVALIDE = 1 WHERE IDAPPARTEMENT = $id";
	$res = odbc_exec($conn, $req);
}
if (isset($_POST['idSup'])){
	$id = (is_numeric($_POST['idSup']) ? (int)$_POST['idSup'] : 0);
	$req = "DELETE FROM dbo.description WHERE IDAPPARTEMENT = $id";
	$res = odbc_exec($conn, $req);
	$req = "DELETE FROM dbo.appartement WHERE IDAPPARTEMENT = $id";
	$res = odbc_exec($conn, $req);
}
if (isset($_POST['idValC'])){
	$idValC = (is_numeric($_POST['idValC']) ? (int)$_POST['idValC'] : 0);
	$mois = date('m');
	$annee = date('Y');
	if ($mois == 12){
		$mois = '01';
		$annee ++;
	}else{
		$mois++;
	}
	$chaine = '01/'.$mois.'/'.$annee;
	$req = "UPDATE dbo.contrat_a_valider SET DATEDEBUTLOC = convert(datetime, '$chaine', 101) WHERE IDCONTRAT = $idValC";
	$res = odbc_exec($conn, $req);
}
if (isset($_POST['idSupC'])){
	$idSupC = (is_numeric($_POST['idSupC']) ? (int)$_POST['idSupC'] : 0);
	$req = "DELETE FROM dbo.contratlocation WHERE IDCONTRAT = $idSupC";
	$res = odbc_exec($conn, $req);
}


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
			<div class="container">
			  <nav class="navbar navbar-default" role="navigation" id="topmenu">
				<ul class="nav navbar-nav">
				  <li class="dropdown">
					<a href="#" data-toggle="collapse" data-target="#one" onclick="toggle_div('app', 'con');">Appartement</a>
				  </li>
				  <li class="dropdown">
					<a href="#" data-toggle="collapse" data-target="#two" onclick="toggle_div('con', 'app');">Contrat</a>
				  </li>
				</ul>
			  </nav>
			</div>
			<div id="app" class="container" style="display:block;">
				<div class="row">
					<div class="col-md-12" style="border: 1px solid black">
						<h3 align="center">Valider Appartement</h4>
END;
	$req = "SELECT IDAPPARTEMENT, VAL, MONTANT, SURFACE, ESTVALIDE FROM dbo.appartement_a_valider";
	$result = odbc_exec($conn,$req);
	echo '<table style="width:100%;"><TR><TD align="center"><b>ID</b></TD><TD align="center"><b>Titre</b></TD><TD align="center"><b>Montant</b></TD><TD align="center"><b>Surface</b></TD><TD align="center"></TD></TR>';
	while(odbc_fetch_row($result)){
	  $id = odbc_result($result, 1);
	  $val = odbc_result($result, 2);
	  $montant = odbc_result($result, 3);
	  $surface = odbc_result($result, 4);

	  echo '<tr><td align="center">'.$id.'</td>
	  		<td align="center">'.$val.'</td>
			<td align="center">'.$montant.'</td>
			<td align="center">'.$surface.'</td>
			<td align="center">
				<form action="emp.php" method="post">
					<input type="hidden" name="idVal" value="'.$id.'">
					<input type="image" src="img/valide.ico" height="15" width="15">
				</form>
			</td>
			<td align="center">
				<form action="emp.php" method="post">
					<input type="hidden" name="idSup" value="'.$id.'">
					<input type="image" src="img/delete.png" height="15" width="15">
				</form>
			</td>
			</tr>';
	}
	echo '</table>';
echo <<<END
					</div> 
				</div> 
			</div>
			<div id="con" class="container" style="display:none;">
				<div class="row">
					<div class="col-md-12" style="border: 1px solid black;">
						<h3 align="center">Valider Contrat</h4>
END;
	$req = "SELECT IDCONTRAT, IDAPPARTEMENT, IDUTILISATEUR, DATEDEBUTLOC FROM dbo.contrat_a_valider";
	$result = odbc_exec($conn,$req);
	echo '<table style="width:100%;"><TR><TD align="center"><b>Contrat</b></TD><TD align="center"><b>Appartement</b></TD><TD align="center"><b>Locataire Potentiel</b></TD><TD align="center"></TD></TR>';
	while(odbc_fetch_row($result)){
	  $contrat = odbc_result($result, 1);
	  $appart = odbc_result($result, 2);
	  $user = odbc_result($result, 3);

	  echo '<tr><td align="center">'.$contrat.'</td>
	  		<td align="center">'.$appart.'</td>
			<td align="center">'.$user.'</td>
			<td align="center">
				<form action="emp.php" method="post">
					<input type="hidden" name="idValC" value="'.$contrat.'">
					<input type="image" src="img/valide.ico" height="15" width="15">
				</form>
			</td>
			<td align="center">
				<form action="emp.php" method="post">
					<input type="hidden" name="idSupC" value="'.$contrat.'">
					<input type="image" src="img/delete.png" height="15" width="15">
				</form>
			</td>
			</tr>';
	}
echo <<<END
					</div>
				</div> 
			</div>
END;
?>