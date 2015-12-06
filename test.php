 <?php
 try {


 	echo 'This text is placed through <b>PHP</b>!';
 	echo '<p>';
 	echo '</p>';

 	include("connexion.php");

<<<<<<< HEAD
 	if ($conn) {
 		//echo 'Connexion OK';
 		//$req = "sp_help";


//$req = "DELETE FROM adresse";
$req = "SELECT NUMRUE,NOMRUE from adresse";
//$req = "alter table adresse modify NOMRUE varchar(100)"; 
//$req = "SELECT NOMDEP FROM departement";
//$req = "delete from utilisateur";
//$req=  "ALTER TABLE utilisateur modify TEL int NULL";
// $req = "drop table utilisateur";	

$req = "INSERT INTO utilisateur (IDUTILISATEUR, IDADRESSE, NOM, PRENOM, MAIL, TEL, PASSWORD) VALUES
(1, 1, 'Alain', 'Guillaume', 'utynnattenn-1521@yopmail.', 6, 'Azarius');
INSERT INTO utilisateur (IDUTILISATEUR, IDADRESSE, NOM, PRENOM, MAIL, TEL, PASSWORD) VALUES
(2, 3, 'Alexis', 'Lucien', 'Anteponat@gmail.com', 00, 'Théogone');
INSERT INTO utilisateur (IDUTILISATEUR, IDADRESSE, NOM, PRENOM, MAIL, TEL, PASSWORD) VALUES
(3, 2, 'André', 'Damien', 'esdf@yahoo.fr', 00, 'Claudian');
INSERT INTO utilisateur (IDUTILISATEUR, IDADRESSE, NOM, PRENOM, MAIL, TEL, PASSWORD) VALUES
(4, 4, 'Antoine', 'Joseph', 'filll@yahoo.com', 00, 'Stéphanus');";
$req = "SELECT IDUTILISATEUR from utilisateur";
$req = "delete from utilisateur";
$result = odbc_exec($conn,$req);



 /*while(odbc_fetch_row($result)){
  $name = odbc_result($result, 1);
  $surname = odbc_result($result, 2);
  print_r("$name $surname\n");
}*/



  while ($data[] = odbc_fetch_array($result));
  print_r($data);

 
=======
if ($conn) {
 	echo 'Connexion OK';
 	$req="select NOMRUE from adresse ";
 	$result = odbc_exec($conn, $req);
 	while ($data[]=odbc_fetch_array($result));
 	print_r($data);
>>>>>>> origin/site
 	//$query = file_get_contents("appartements.sql");
	//odbc_exec($conn, $query)or die(odbc_error());
}
else {
	echo 'TMLC';
}
//!\
odbc_close($conn);
//!\
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '.$e->getMessage());

}
?>