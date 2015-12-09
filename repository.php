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
	
	public static function crateUser($conn,$utilisateur,$idadresse, $nom, $prenom, $mail, $tel, $password, $estouvert,$idsysuser){
		$requete = odbc_exec($conn,"INSERT INTO utilisateur (IDUTILISATEUR,IDADRESSE, NOM,PRENOM,MAIL,TEL,PASSWORD,ESTOUVERT,IDSYSUSER)	
			VALUES(
				$utilisateur,$idadresse,'$nom','$prenom','$mail',$tel,'$password',$estouvert,$idsysuser)");
		
		
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