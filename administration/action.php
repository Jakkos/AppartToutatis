<?php
	include 'requete_admin.php';
	include '../connexion.php';
	include '../repository.php';
	
	if (isset($_POST["id"])){
		$id = $_POST["id"];

		if ($_POST["etat"] == "Ouvert"){
			$req = update_user_etat(0, $id);
		} else{
			$req = update_user_etat(1, $id);
		}

		$result = odbc_exec($conn,$req);
	}

	if (isset($_POST['ins_emp'])) { 
	  $idville = (is_numeric($_POST['ville']) ? (int)$_POST['ville'] : 0);
	  $numrue = (is_numeric($_POST['num']) ? (int)$_POST['num'] : 0);
	  $nomrue = trim($_POST["adr"]);
	  $idadresse = (int)Utilisateur::addAdress($conn,$idville,$numrue,$nomrue); //int
	  $nom=trim($_POST["nom"]); //chaine
	  $prenom = trim($_POST["prenom"]); //chaine
	  $mail =trim($_POST["mail"]); //chaine
	  $tel=(is_numeric($_POST['tel']) ? (int)$_POST['tel'] : 0); //int 
	  $password=trim($_POST["pass"]); //chaine
	  $estouvert=1; //int
	  $idsysuser=0; //int

	  Utilisateur::addUser($conn,$idadresse,$nom,$prenom,$mail,$tel,$password,$estouvert,$idsysuser);
	}

	header('Location: oi_admin.php');
	exit;
?>