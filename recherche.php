<?php


    if(isset($_GET['region'])) $region=$_GET['region'];
    else $region = "";
	
	if(isset($_POST['idville']))      $idville=$_POST['idville'];
	else  $idville="";
	
	if(isset($_POST['idtype']))      $idtype=$_POST['idtype'];
	else  $idtype="";
	
	
	
?>
	<script type="text/javascript">
				function test2(){
				    
				    var ville = document.getElementById('idville').value;
					
					if (ville == ''){
				      alert ("erreur");
					   return false;
				    }
					else 
					{
					  return true;
					  
					}
				 }
				 
			  </script>
<?php


	

	echo '</p>selectionnez une ville pour le département de '.$region.'';
	//DEBUT DU FORMULAIRE
	echo'<form action="" onSubmit="return test2();" method="POST">';
	//MENU DEROULANT POUR LES VILLES
	echo'<label for="idville">Ville</label>';
	echo '<SELECT size="1" id="idville" name="idville" style="width: 252px";>';
	echo "<option></option>";
	$db = mysql_connect ('localhost', 'root', '' )  or die('Erreur de connexion '.mysql_error());  
	mysql_select_db('appart',$db)  or die('Erreur de selection '.mysql_error()); 

	$requete2 = mysql_query ('SELECT v.IDVILLE, v.NOMVILLE from ville v, departement d where v.`IDDEP`= d.`IDDEP` and d.nomdep like "'.$region.'"') ;

	while ($result = mysql_fetch_array($requete2)) {
	echo '<option value="'.$result['IDVILLE'].'" >'.$result['NOMVILLE'].'</option>';				
	}
	echo '</SELECT>';
	 
	  //MENU DEROULANT POUR LES TYPES DE LOGEMENT
	  echo'<label for="type">Type logement</label>';
	  echo '<SELECT size="1" name="type" style="width: 150px;">';
	  echo "<option> indifférent </option>";
	 
	$requete3 = mysql_query ('SELECT IDTYPE, NOMTYPE FROM type ');
	while ($resultat = mysql_fetch_array($requete3)) {
	echo '<option value="'.$resultat['IDTYPE'].'">'.$resultat['NOMTYPE'].'</option>';				
	 }
	echo '</SELECT>';
	 
	mysql_close($db);
	echo'<input type="submit" value="rechercher" name="val" onclick = ""/> ';
	echo '</form>';
	
	
	//--------------------AFFICHAGE DE LA LISTE DES APPARTEMENTS------------------------
   if(isset($_POST['val'])){
     //LE CAS OU LA VILLE N'EST PAS RENSEIGNEE
	  if (empty($_POST['idville'])){
	      echo'<script type="text/javascript">'; 
	      echo'alert("Le champ ville doit être renseigné")';
		  echo'</script>';
	    }
		
		else
		//DANS LE CAS OU LA VILLE EST RENSEIGNEE 
		{
		//ON FAIT UNE CONNEXION UNIQUE A LA BASE
		$dbase = mysql_connect ('localhost', 'root', '' )  or die('Erreur de connexion '.mysql_error());  
	    mysql_select_db('appart',$dbase)  or die('Erreur de selection '.mysql_error()); 
		
		//QUAND LE TYPE EST INDIFFERENT
		if ($_POST['type'] == "indifférent"){
		   
			$requete4 = mysql_query ('SELECT  ad.numrue,ad.nomrue, v.nomville, d.nomdep,ap.numappartement, ap.surface,l.montant, des.nomdescription,t.nomtype,t.arretbail,t.dureepreavis
									FROM `appartement` ap, adresse ad,ville v, departement d, loyer l, description des ,type t
									WHERE ap.idadresse=ad.idadresse and ad.idville=v.idville and v.iddep = d.iddep and l.idloyer =ap.idloyer
									and des.idappartement = ap.idappartement and ap.idtype = t.idtype and ap.`ESTDISPONIBLE` = 1 and v.idville = '.$idville.' and ap.idappartement not in (select `IDAPPARTEMENT` from contratlocation)') ;
		  //echo 'la ville est '.$idville.' ';
		   
		
		if ($requete4){
		   $nbVille = mysql_num_rows($requete4);
		   
		   if ($nbVille > 0){
		      //AFFICHAGE DE LA LISTE DES APPARTEMENT POUR UNE VILLE RENSEIGNEE
			  echo 'Resultat de votre recherche ';
			  echo "<table>\n";
			   echo"<tr>\n";
			   echo"<td><strong>Adresse</strong></td>\n";
			   echo"<td><strong>Ville</strong></td>\n";
			   echo"<td><strong>Departement</strong></td>\n";
			   echo"<td><strong>Numéro Appartement</strong></td>\n";
			   echo"<td><strong>Superficie</strong></td>\n";
			   echo"<td><strong>Loyer</strong></td>\n";
			   echo"<td><strong>Description</strong></td>\n";
			   echo"<td><strong>Type Logement</strong></td>\n";
			   echo"<td><strong>Arret du bail</strong></td>\n";
			   echo"<td><strong>Durée du préavis</strong></td>\n";
			   
			  echo"</tr>\n"; 
			  while ($ligne = mysql_fetch_array($requete4))
			  {
			  echo "<tr>\n";

			  echo"<td>" .$ligne[0] ; 
			  echo " ".$ligne[1] ;
			  echo "</td>\n";
			  
			  echo"<td>" .$ligne[2] ;
			  echo "</td>\n"; 

			  echo"<td>" .$ligne[3] ;
			  echo "</td>\n"; 
			  
			  echo"<td>" .$ligne[4] ;
			  echo "</td>\n";  
			  
			  echo"<td>" .$ligne[5];
			  echo" m2";
              echo "</td>\n";  

			  echo"<td>" .$ligne[6];
              echo  "</td>\n"; 
			  
			  echo"<td>" .$ligne[7];
              echo  "</td>\n";
			  	
			  echo"<td>" .$ligne[8];
              echo  "</td>\n"; 
			  
			  echo"<td>" .$ligne[9] ;
			  echo "</td>\n";  
			  
			  echo"</tr>\n"; 
			  }
			  echo "</table>\n";
			  
			 
			}
			else
			{
		     //LORSQUE LA REQUETE NE CONTIENT AUCUNE LIGNE
		     echo "Votre recherche n'a pas abouti";	
			 
			}
			
			//DECONNEXION A LA BASE DE DONNEES 
			mysql_close($dbase);
		}
		
		//TESTER SI LA REQUETE FONCTIONNE OU PAS
		
	   }			
	    else{
		   //LORSQUE LE TYPE EST RENSEIGNE ET LA VILLE AUSSI
		   $requete4 = mysql_query ('SELECT  ad.numrue,ad.nomrue, v.nomville, d.nomdep,ap.numappartement, ap.surface,l.montant, des.nomdescription,t.nomtype,t.arretbail,t.dureepreavis
									FROM `appartement` ap, adresse ad,ville v, departement d, loyer l, description des ,type t
									WHERE ap.idadresse=ad.idadresse and ad.idville=v.idville and v.iddep = d.iddep and l.idloyer =ap.idloyer
									and des.idappartement = ap.idappartement and ap.idtype = t.idtype  and t.IDTYPE = '.$idtype.' and ap.`ESTDISPONIBLE` = 1 and  v.idville = '.$idville.' 
									and ap.idappartement not in (select `IDAPPARTEMENT` from contratlocation)') ;


		   }
		}
       
    }
?>