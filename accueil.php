<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<?PHP
if(isset($_GET['region']))      $region=$_GET['region'];
	else  $region="";
	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Appartout'atis</title>
		<!--lien vers le css-->
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" -->
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>
	   <!-- Debut de La page entiere-->
		 <div id="main_container">
		 
		 <!-- En_tete de la page -->
			 <div id="header">
		 
			
			 </div>
			 
			  <!--Debut du contenu de la page-->
			 <div id="main_content">
			 
			   <!-- Le Menu -->
			    <div id="menu_tab">
				
			    </div>
				
			 </div>
			 
			 <!--Debut de la consultation-->
			  <div class="center_content">
					<div class="center_title_bar"> VEUILLEZ ENTRER UNE REGION </div>
					<div class="prod_box_big">
				<div class="center_prod_box_big">

				<script type="text/javascript">
				function test(){
				    
				    var region = document.getElementById('reg').value;
					
					if (region == ''){
				      alert ("erreur");
					   return false;
				    }
					else 
					  return true;
				 }
				 
			  </script>
					<!--Formulaire de renseignement de la region-->
					
					<form action="recherche.php" method="GEt" class ="formulaire" onSubmit="return test()">
					<div class="information_form">
					
					  <p>
					  
					<div class="form_row">
					  <label class="champ"><strong>Région :</strong></label>
					  <input type="text" id="reg" name="region" class="champ_input" value="<?php (!empty($region) ? print $region : NULL); ?>" />
					
					</div>
					
		
					</p>
					</div>
				

					<input type="submit" value="valider" name="validation" onclick = ""/> 
				</form>
				
					
					</div>
					</div>
					</div>
			  </div>
			   
		 </div>
	</body>
</html>