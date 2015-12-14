<?php
if (isset($_POST['desin'])){
	$valPass = trim($_POST["vPass"]);
	$tstPass = trim($_POST["pass"]);

	if ($valPass == $tstPass){
		$req = "UPDATE utilisateur SET ESTOUVERT=0 WHERE IDUTILISATEUR=1";
		$res = odbc_exec($conn, $req);
	}
	session_destroy();
	header('Location: index.php');
}

include 'administration/c_admin.php';
include 'connexion.php';
include 'repository.php';
include 'navbar.php';

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
					<div class="col-md-8" style="border: 1px solid black">
						<h3 align="center">Modifier Informations Compte</h3>
END;
if (isset($_POST['modif'])){
	$oldPass = trim($_POST["oldPass"]); // mdp a teste
	$oldMdp = trim($_POST["oldMdp"]); // vrai old mdp

	if ($oldPass == $oldMdp){
		$idville = (is_numeric($_POST['ville']) ? (int)$_POST['ville'] : 0);
	 	$numrue = (is_numeric($_POST['num']) ? (int)$_POST['num'] : 0);
	  	$nomrue = trim($_POST["adr"]);
		$idadresse = (int)Utilisateur::addAdress($conn, $idville, $numrue, $nomrue);
		$telephone = (is_numeric($_POST['tel']) ? (int)$_POST['tel'] : 0);
		$nvPass = trim($_POST["nvPass"]);
		$num = (is_numeric($_POST['modif']) ? (int)$_POST['modif'] : 0);
		echo $idadresse;
		echo $telephone;
		echo $num;

		if ($nvPass != null){
			$req = "UPDATE utilisateur SET IDADRESSE=$idadresse, TEL=$telephone, PASSWORD=$nvPass WHERE IDUTILISATEUR=$num";
			$res = odbc_exec($conn, $req);
		}else{	
			$req = "UPDATE utilisateur SET IDADRESSE=$idadresse, TEL=$telephone WHERE IDUTILISATEUR=$num";
			$res = odbc_exec($conn, $req);
		}
	}else{
		echo '<script>alert("Mot de Passe Incorrect")</script>'; 
	}
}

$pass_util = generer_formulaire($conn);
echo '</div><div class="col-md-1"></div><div class="col-md-3" style="border: 1px solid black">
						<h3 align="center">Désinscription</h4>
						<table style="width:100%;">
				       		<form method="post" action="mon_compte.php" name="desinscription">
							    <tr style="height:50px;">
							    	<td align="center">MDP</br><input type="password" class="span3" name="pass"></td>
							    </tr>
				       			<tr style="height:50px;">
								   	<td align="center"><button type="submit" class="btn btn-primary">Désinscription</button></td>
								</tr>
							    <input type="hidden" name="desin" value="true">
								<input type="hidden" name="vPass" value="'.$pass_util.'">
							</form>
	</table></div></div></div></body>';


function generer_formulaire($conn){
	$req = 'SELECT IDUTILISATEUR, NUMRUE, NOMRUE, IDVILLE, TEL, PASSWORD FROM utilisateur, adresse WHERE adresse.IDADRESSE = utilisateur.IDADRESSE AND IDUTILISATEUR = 1';
	$result = odbc_exec($conn,$req);
	odbc_fetch_row($result);
	$usr = odbc_result($result, 1);
	$numrue = odbc_result($result, 2);
	$nomrue = odbc_result($result, 3);
	$ville = odbc_result($result, 4);
	$tel = odbc_result($result, 5); 
	$mdp = odbc_result($result, 6); 

	echo '<table style="width:100%;">
       		<form method="post" action="mon_compte.php" name="modifUser">
				<tr style="height:50px;">
				    <td align="center">n° rue</br><input type="text" class="span3" name="num" value="'.$numrue.'"></td>
				    <td align="center">nom rue</br><input type="text" class="span3" name="adr" value="'.$nomrue.'"></td>
				    <td align="center">ville<select style="width:80%;" name ="ville" class="form-control">';

		$result = odbc_exec($conn,"SELECT IDVILLE, NOMVILLE from ville;");
		while (odbc_fetch_row($result)){
		    $nomville = odbc_result($result, 2);
		    $id = odbc_result($result, 1);
			echo '<option value='.$id.'>'.$nomville.'</option>';
		}

		echo '		</select></td>
				    </tr>
				    <tr style="height:50px;">
				    	<td align="center">téléphone</br><input type="text" class="span3" name="tel" value="'.$tel.'"></td>
				    	<td align="center">nouveau MDP</br><input type="password" class="span3" name="nvPass"></td>
				    	<td align="center">ancien MDP</br><input type="password" class="span3" name="oldPass"></td>
				    </tr>
				    <tr style="height:50px;">
				    	<td align="center"><button type="submit" class="btn btn-primary">Enregistrer</button></td>
				    </tr>
			        <input type="hidden" name="modif" value="'.$usr.'">
			        <input type="hidden" name="oldMdp" value="'.$mdp.'">
        		</form>
        	</table>';
    return $mdp;
}
?>