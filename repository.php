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
		$result = odbc_exec($conn, "SELECT @"."@IDENTITY AS Ident");
		return $result;
		odbc_close($conn);
	}

	public static function connexion($conn,$mail,$pass){
		$requete = odbc_exec($conn, "SELECT IDUTILISATEUR FROM utilisateur WHERE MAIL LIKE '$mail';");
		if($requete!=null) // utilisateur existant
		{
			$requete = odbc_exec($conn, "SELECT IDUTILISATEUR FROM utilisateur WHERE MAIL LIKE '$mail' AND PASSWORD LIKE '$pass';");
			if($requete!=null)
				return $requete;
			else return false;
		}
		else
			return false;
		// return groupe utilisateur pour la connexion
		
	}

	public static function getIdSysUser($conn,$mail){
		$requete = odbc_exec($conn, "SELECT IDSYSUSER FROM utilisateur WHERE MAIL LIKE '$mail';");
		return $requete;
	}

	




	public static function addAdress($conn, $idville, $numrue, $nomrue)
	{
		$requete = odbc_exec($conn, "INSERT INTO adresse (IDVILLE,NUMRUE,NOMRUE) VALUES ($idville,$numrue,'$nomrue');");
		$result = odbc_exec($conn, "SELECT @"."@IDENTITY AS Ident");
		return $result;
		odbc_close($conn);
	}
	
	public static function get_mail($p, $pseudo){
		$requete = $p->prepare("SELECT mail FROM users WHERE pseudo = :pseudo;");
		$requete->bindParam('pseudo', $pseudo);
		$requete->execute();
		$res = $requete->fetch(PDO::FETCH_OBJ);

		return $res->mail;
	}
	
	public static function pass_existe($p, $username){
		$requete = $p->prepare("SELECT per_mdp FROM personne WHERE per_mail = :username;");
		$requete->bindParam('username', $username);
		$requete->execute();
		$res = $requete->fetch(PDO::FETCH_OBJ);

		return $res->per_mdp;
	}

	//******************************************************************************************************************************//
	
	
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