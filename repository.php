<?php

class Utilisateur{
	private $IDUTILISATEUR;
	private $IDADRESSE;
	private $NOM;
	private $PRENOM;
	private $MAIL;
	private $TEL;
	private $PASSWORD;
	private $ESTOUVERT;
	private $IDSYSUSER;

	private $role;
	
	public function __construct(){
	
	
	}
	
	public static function addUser($conn,$idadresse, $nom, $prenom, $mail, $tel, $password, $estouvert,$idsysuser){
		$requete = odbc_exec($conn,"INSERT INTO utilisateur (IDADRESSE, NOM,PRENOM,MAIL,TEL,PASSWORD,ESTOUVERT,IDSYSUSER)	
			VALUES($idadresse,
				'$nom',
				'$prenom',
				'$mail',
				$tel,
				'$password'	,
				$estouvert,
				$idsysuser);");
		odbc_close($conn);
	}

	public static function addAdress($conn, $idville, $numrue, $nomrue)
	{
		$requete = odbc_exec($conn, "INSERT INTO adresse (IDVILLE,NUMRUE,NOMRUE) VALUES ($idville,$numrue,'$nomrue');");
		$result = odbc_exec($conn, "SELECT @"."@IDENTITY AS Ident");
		return $result;
		odbc_close($conn);
	}
	
	
	
	public static function getUser($p,$id)
	{
		$requete = $p->prepare("SELECT pro_nom FROM produit where pro_id = :id;");
		$requete->bindParam('id',$id);
		$requete->execute();
		$res = $requete->fetch(PDO::FETCH_OBJ);
		
		return $res->pro_nom;
	}

	public static function updateUser($p,$id)
	{
		$requete = $p->prepare("SELECT pro_nom FROM produit where pro_id = :id;");
		$requete->bindParam('id',$id);
		$requete->execute();
		$res = $requete->fetch(PDO::FETCH_OBJ);
		
		return $res->pro_nom;
	}
	
	public static function deleteUser($p,$id)
	{
		$requete = $p->prepare("SELECT pro_nom FROM produit where pro_id = :id;");
		$requete->bindParam('id',$id);
		$requete->execute();
		$res = $requete->fetch(PDO::FETCH_OBJ);
		
		return $res->pro_nom;
	}

	public static function getRoleUser($p,$id)
	{
		$requete = $p->prepare("SELECT pro_nom FROM produit where pro_id = :id;");
		$requete->bindParam('id',$id);
		$requete->execute();
		$res = $requete->fetch(PDO::FETCH_OBJ);
		
		return $res->pro_nom;
	}
	

}
?>