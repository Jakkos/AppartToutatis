<?php
include 'administration/c_admin.php';
include 'connexion.php';
include 'repository.php';
include 'navbar.php';

if (isset($_POST['add'])){
	$titre = trim($_POST['titre']);
	$type = (is_numeric($_POST['type']) ? (int)$_POST['type'] : 0);
	$numApp = (is_numeric($_POST['numApp']) ? (int)$_POST['numApp'] : 0);
	$ville = (is_numeric($_POST['ville']) ? (int)$_POST['ville'] : 0);
	$numRue = (is_numeric($_POST['numRue']) ? (int)$_POST['numRue'] : 0);
	$adr = trim($_POST['adr']);
	$loyer = (is_numeric($_POST['loyer']) ? (int)$_POST['loyer'] : 0);
	$surface = (is_numeric($_POST['surface']) ? (int)$_POST['surface'] : 0);
	$desc = trim($_POST['desc']);
	$photo = trim($_POST['photo']);

	$annee = date('Y');

	$idadresse = (int)Utilisateur::addAdress($conn, $ville, $numRue, $adr);
	$loy = "INSERT INTO loyer(MONTANT, ANNEE) VALUES ($loyer, $annee)";
	$resLoy = odbc_exec($conn, $loy);
	$idLoy = (int)odbc_exec($conn, "SELECT @"."@IDENTITY AS Ident");
	$app = "INSERT INTO appartement(IDTYPE, IDLOYER, IDUTILISATEUR, IDADRESSE, NUMAPPARTEMENT, SURFACE, URLPHOTO, ESTDISPONIBLE, ESTVALIDE) 
			VALUES ($type, $idLoy, 1, $idadresse, $numApp, $surface, '$photo', 0, 0)";
	$resApp = odbc_exec($conn, $app);
	$idApp = (int)odbc_exec($conn, "SELECT @"."@IDENTITY AS Ident");
	$descTitre = "INSERT INTO description(IDAPPARTEMENT, NOMDESCRIPTION, VAL) VALUES ($idApp, 'titre', '$titre')";
	$resDescTitre = odbc_exec($conn, $loy);
	$descTitre = "INSERT INTO description(IDAPPARTEMENT, NOMDESCRIPTION, VAL) VALUES ($idApp, 'description', '$desc')";
	$resDescTitre = odbc_exec($conn, $loy);
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
			<div id="emp" class="container" style="display:block;">
				<div class="row">
					<div class="col-md-12" style="border: 1px solid black">
						<h3 align="center">Demander Ajout Un Appartement</h3>

END;

	
	echo '<table style="width:100%;">
       		<form method="post" action="ajout_appart.php" name="addAppart">
				<tr style="height:50px;">
				    <td align="center">type<select style="width:30%;" name ="type" class="form-control">';

		$result = odbc_exec($conn,"SELECT IDTYPE, NOMTYPE from type;");
		while (odbc_fetch_row($result)){
		    $nomtype = odbc_result($result, 2);
		    $id = odbc_result($result, 1);
			echo '<option value='.$id.'>'.$nomtype.'</option>';
		}

		echo '		</select></td>
					<td align="center">titre</br><input type="text" class="span3" name="titre"></td>
				</tr>
				<tr style="height:50px;">
				    <td align="center">n° appartement</br><input type="text" class="span3" name="numApp"></td>	
				    <td align="center">ville<select style="width:50%;" name ="ville" class="form-control">';

		$result = odbc_exec($conn,"SELECT IDVILLE, NOMVILLE from ville;");
		while (odbc_fetch_row($result)){
		    $nomville = odbc_result($result, 2);
		    $id = odbc_result($result, 1);
			echo '<option value='.$id.'>'.$nomville.'</option>';
		}

		echo '		</select></td>
				</tr>
				<tr style="height:50px;">
				    <td align="center">n° rue</br><input type="text" class="span3" name="numRue"></td>
				    <td align="center">nom rue</br><input type="text" class="span3" name="adr"></td>
				</tr>
				<tr style="height:50px;">
					<td align="center">loyer</br><input type="number" class="span3" name="loyer"></td>		
					<td align="center">surface</br><input type="number" class="span3" name="surface"></td>
				</tr>
				<tr style="height:100px;">
					<td align="center">description</br><TEXTAREA name="desc" rows=4 cols=40></TEXTAREA></td>
					<td align="center">URL photo</br><input type="text" class="span3" name="photo"></td>
				</tr>
				<tr>
					<td align="center"><button type="submit" class="btn btn-primary">Envoyer</button></td>
				</tr>
			        <input type="hidden" name="add" value="true">
        	</form>
        </table>';

echo <<<END
	</div></div></div></body>
END;
?>