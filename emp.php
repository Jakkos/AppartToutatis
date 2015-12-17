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
	$deb = '01/'.$mois.'/'.$annee;
	$req = "SELECT IDTYPE FROM dbo.appartement app, dbo.contratlocation con WHERE con.IDAPPARTEMENT = app.IDAPPARTEMENT AND con.IDCONTRAT = $idValC";
	$res = odbc_exec($conn, $req);
	$type = odbc_result($res, 1);

	$fin = '31/06/';
	if($type == 1){
		$annee = $annee + 3;
		$fin = '01/'.$mois.'/'.$annee;
	}else if ($type == 3){
		$annee = $annee + 1;
		$fin = $fin = '31/06/'.$annee;
	}
	$req = "UPDATE dbo.contrat_a_valider SET DATEDEBUTLOC = convert(datetime, '$deb', 101) WHERE IDCONTRAT = $idValC";
	$res = odbc_exec($conn, $req);
	$req = "UPDATE dbo.contrat_a_valider SET DATEFINLOC = convert(datetime, '$fin', 101) WHERE IDCONTRAT = $idValC";
	$res = odbc_exec($conn, $req);
}
if (isset($_POST['idSupC'])){
	$idSupC = (is_numeric($_POST['idSupC']) ? (int)$_POST['idSupC'] : 0);
	$req = "DELETE FROM dbo.contratlocation WHERE IDCONTRAT = $idSupC";
	$res = odbc_exec($conn, $req);
}
if (isset($_POST['idValP'])){
	$idValP = (is_numeric($_POST['idValP']) ? (int)$_POST['idValP'] : 0);
	$req = "UPDATE dbo.contrat_a_prolonger SET DATEFINLOC = dateadd(yy, 3, DATEFINLOC), DMDPROLONG = 0 WHERE IDCONTRAT = $idValP";
	$res = odbc_exec($conn, $req);
}
if (isset($_POST['idSupP'])){
	$idSupP = (is_numeric($_POST['idSupP']) ? (int)$_POST['idSupP'] : 0);
	$req = "UPDATE dbo.contrat_a_prolonger SET DMDPROLONG = 0 WHERE IDCONTRAT = $idSupP";
	$res = odbc_exec($conn, $req);
}
if (isset($_POST['idValO'])){
	$idValO = (is_numeric($_POST['idValO']) ? (int)$_POST['idValO'] : 0);
	$mois = date('m');
	$annee = date('Y');
	if ($mois == 12){
		$mois = '01';
		$annee ++;
	}else{
		$mois++;
	}
	$deb = '01/'.$mois.'/'.$annee;
	$req = "SELECT IDTYPE FROM dbo.appartement app, dbo.contratlocation con WHERE con.IDAPPARTEMENT = app.IDAPPARTEMENT AND con.IDCONTRAT = $idValO";
	$res = odbc_exec($conn, $req);
	$type = odbc_result($res, 1);

	$fin = '31/06/';
	if($type == 1){
		$annee = $annee + 3;
		$fin = '01/'.$mois.'/'.$annee;
	}else if ($type == 3){
		$annee = $annee + 1;
		$fin = $fin = '31/06/'.$annee;
	}
	$req = "UPDATE dbo.contrat_a_valider SET DATEDEBUTLOC = convert(datetime, '$deb', 101) WHERE IDCONTRAT = $idValO";
	$res = odbc_exec($conn, $req);
	$req = "UPDATE dbo.contrat_a_valider SET DATEFINLOC = convert(datetime, '$fin', 101) WHERE IDCONTRAT = $idValO";
	$res = odbc_exec($conn, $req);
}
if (isset($_POST['idSupO'])){
	$idSupO = (is_numeric($_POST['idSupO']) ? (int)$_POST['idSupO'] : 0);
	$req = "DELETE FROM dbo.contratlocation WHERE IDCONTRAT = $idSupO";
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
					<a href="#" data-toggle="collapse" data-target="#one" onclick="toggle_div('app', 'con', 'bail', 'opt');">Appartement</a>
				  </li>
				  <li class="dropdown">
					<a href="#" data-toggle="collapse" data-target="#two" onclick="toggle_div('con', 'app', 'bail', 'opt');">Contrat</a>
				  </li>
				   <li class="dropdown">
					<a href="#" data-toggle="collapse" data-target="#two" onclick="toggle_div('bail', 'app', 'con', 'opt');">Bail</a>
				  </li>
				  <li class="dropdown">
					<a href="#" data-toggle="collapse" data-target="#two" onclick="toggle_div('opt', 'bail', 'app', 'con');">Option</a>
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
						</table>
					</div>
				</div> 
			</div>
			<div id="bail" class="container" style="display:none;">
				<div class="row">
					<div class="col-md-12" style="border: 1px solid black;">
						<h3 align="center">Prolonger Bail</h4>
END;
	$req = "SELECT IDCONTRAT, IDAPPARTEMENT, IDUTILISATEUR, DATEDEBUTLOC FROM dbo.contrat_a_prolonger";
	$result = odbc_exec($conn,$req);
	echo '<table style="width:100%;"><TR><TD align="center"><b>Contrat</b></TD><TD align="center"><b>Appartement</b></TD><TD align="center"><b>Locataire Potentiel</b></TD><TD align="center"></TD></TR>';
	while(odbc_fetch_row($result)){
	  $contrat1 = odbc_result($result, 1);
	  $appart1 = odbc_result($result, 2);
	  $user1 = odbc_result($result, 3);

	  echo '<tr><td align="center">'.$contrat1.'</td>
	  		<td align="center">'.$appart1.'</td>
			<td align="center">'.$user1.'</td>
			<td align="center">
				<form action="emp.php" method="post">
					<input type="hidden" name="idValP" value="'.$contrat1.'">
					<input type="image" src="img/valide.ico" height="15" width="15">
				</form>
			</td>
			<td align="center">
				<form action="emp.php" method="post">
					<input type="hidden" name="idSupP" value="'.$contrat1.'">
					<input type="image" src="img/delete.png" height="15" width="15">
				</form>
			</td>
			</tr>';
	}
	echo <<<END
						</table>
					</div>
				</div> 
			</div>
			<div id="opt" class="container" style="display:none;">
				<div class="row">
					<div class="col-md-12" style="border: 1px solid black;">
						<h3 align="center">Poser Option</h4>
END;
	$req = "SELECT IDCONTRAT, IDAPPARTEMENT, IDUTILISATEUR, DATEDEBUTLOC FROM dbo.option_a_valider";
	$result = odbc_exec($conn,$req);
	echo '<table style="width:100%;"><TR><TD align="center"><b>Contrat</b></TD><TD align="center"><b>Appartement</b></TD><TD align="center"><b>Locataire Potentiel</b></TD><TD align="center"></TD></TR>';
	while(odbc_fetch_row($result)){
	  $contrat2 = odbc_result($result, 1);
	  $appart2 = odbc_result($result, 2);
	  $user2 = odbc_result($result, 3);

	  echo '<tr><td align="center">'.$contrat2.'</td>
	  		<td align="center">'.$appart2.'</td>
			<td align="center">'.$user2.'</td>
			<td align="center">
				<form action="emp.php" method="post">
					<input type="hidden" name="idValO" value="'.$contrat2.'">
					<input type="image" src="img/valide.ico" height="15" width="15">
				</form>
			</td>
			<td align="center">
				<form action="emp.php" method="post">
					<input type="hidden" name="idSupO" value="'.$contrat2.'">
					<input type="image" src="img/delete.png" height="15" width="15">
				</form>
			</td>
			</tr>';
	}
?>