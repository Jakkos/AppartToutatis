<?php
include 'dynamic.js';
include 'requete_admin.php';


	function put_header(){
		echo <<<END
			<!DOCTYPE html>
			<head>
			 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <meta name="description" content="">
			  <meta name="author" content="">
			  <title>Appartt</title>

			  <!-- Bootstrap Core CSS -->
			  <link href="../css/bootstrap.css" rel="stylesheet">

			  <!-- Custom CSS -->
			  <link href="../css/mine.css" rel="stylesheet">
			</head>
			<body>
END;
	}
	
	function menu(){
		echo <<<END
			<div class="container">
			  <nav class="navbar navbar-default" role="navigation" id="topmenu">
				<ul class="nav navbar-nav">
				  <li class="dropdown">
					<a href="#" data-toggle="collapse" data-target="#one" onclick="toggle_div('emp', 'stat');">Employés</a>
				  </li>
				  <li class="dropdown">
					<a href="#" data-toggle="collapse" data-target="#two" onclick="toggle_div('stat', 'emp');">Statistiques</a>
				  </li>
				</ul>
			  </nav>
			</div>
END;
	}
	
	function onglet_employe($conn){
		echo <<<END
			<div id="emp" class="container" style="display:block;">
				<div class="row">
					<div class="col-md-8" style="border: 1px solid black">
						<h3 align="center">Ajouter un Employé</h3>
END;
		formulaireInsEmp($conn);
		echo <<<END
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-3" style="border: 1px solid black">
						<h3 align="center">Changer Etat Compte</h3>
END;
		afficheListeUser($conn);
		echo <<<END
					</div> 
				</div> 
			</div>
			<div id="stat" class="container" style="display:none;">
				<div class="row">
					<div class="col-md-4" style="border: 1px solid black;">
						<h3 align="center">Répartition Utilisateurs</h3>
END;
		afficheRepUsr($conn);
		echo <<<END
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-4" style="border: 1px solid black;">
						<h3 align="center">Répartition Appartement</h3>
END;
		afficheRepApp($conn);
		echo <<<END
					</div>
				</div> 
			</div>
END;
	}
	
	function afficheListeUser($conn){
		$req = get_user();
		$result = odbc_exec($conn,$req);
		echo '<table style="width:100%;"><TR><TD align="center"><b>Nom</b></TD><TD align="center"><b>Prénom</b></TD><TD align="center"><b>Etat</b></TD><TD align="center"></TD></TR>';
		while(odbc_fetch_row($result)){
		  $id = odbc_result($result, 1);
		  $nom = odbc_result($result, 2);
		  $prenom = odbc_result($result, 3);
		  $estouvert = odbc_result($result, 4);  
		  
		  if ($estouvert == 0){
			  $estouvert = 'Fermé';
		  } else{
			  $estouvert = 'Ouvert';
		  }
		  echo '<tr><td align="center">'.$nom.'</td>
				<td align="center">'.$prenom.'</td>
				<td align="center">'.$estouvert.'</td>
				<td align="center">
				<form action="action.php" method="post">
					<input type="hidden" name="etat" value="'.$estouvert.'">
					<input type="hidden" name="id" value="'.$id.'">
					<input type="image" src="img/change.png" height="15" width="15"></td>
				</form></tr>';
		}
		echo '</table>';
	}

	function formulaireInsEmp($conn){
		
		echo <<<END
			<table style="width:100%;">
        		<form method="post" action="action.php" name="insEmp">
				    <tr style="height:50px;">	
				    	<td align="center"><input type="text" class="span3" name="nom" placeholder="Nom"></td>
				    	<td align="center"><input type="text" class="span3" name="prenom" placeholder="Prénom"></td>
				    	<td align="center"><input type="text" class="span3" name="mail" id="email" placeholder="Email"></td>
				    </tr>
				    <tr style="height:50px;">
				    	<td align="center"><input type="text" class="span3" name="num" placeholder="n°"></td>
				    	<td align="center"><input type="text" class="span3" name="adr" placeholder="Adresse"></td>
				    	<td align="center"><select style="width:80%;" name ="ville" class="form-control">
END;
		$result = odbc_exec($conn,"SELECT IDVILLE, NOMVILLE from dbo.ville;");
		while (odbc_fetch_row($result)){
		    $nomville = odbc_result($result, 2);
		    $id = odbc_result($result, 1);
			echo '<option value='.$id.'>'.$nomville.'</option>';
		}

		echo <<<END
					</select></td>
				    </tr>
				    <tr style="height:50px;">
				    	<td align="center"><input type="text" class="span3" name="tel" placeholder="Telephonne"></td>
				    	<td align="center"><input type="password" class="span3" name="pass" placeholder="Mot de passe"></td>
				    	<td align="center"><button type="submit" class="btn btn-primary">Sign in</button></td>
				    </tr>
			        <input type="hidden" name="ins_emp" value="true">
        		</form>
        	</table>
END;
	}

function afficheRepUsr($conn){
	$req = "SELECT vil.NOMVILLE, count(usr.IDUTILISATEUR)
		FROM dbo.utilisateur usr, dbo.adresse adr, dbo.ville vil
		WHERE usr.IDADRESSE = adr.IDADRESSE
		AND vil.IDVILLE = adr.IDVILLE
		GROUP BY vil.NOMVILLE";
	$result = odbc_exec($conn,$req);
	echo '<table style="width:90%;"><TR><TD align="center"><b>Ville</b></TD><TD align="center"><b>NB User</b></TD></TR>';
	while(odbc_fetch_row($result)){
	  $ville = odbc_result($result, 1);
	  $usr = odbc_result($result, 2);
	  echo '<tr><td align="center">'.$ville.'</td>
	  			<td align="center">'.$usr.'</td>
	  		</tr>';
	}
	echo '</table>';
}

function afficheRepApp($conn){
	$req = "SELECT typ.NOMTYPE, count(app.IDAPPARTEMENT)
		FROM dbo.type typ, dbo.appartement app
		WHERE typ.IDTYPE = app.IDTYPE
		GROUP BY typ.NOMTYPE";
	$result = odbc_exec($conn,$req);
	echo '<table style="width:90%;"><TR><TD align="center"><b>Type</b></TD><TD align="center"><b>NB Appart</b></TD></TR>';
	while(odbc_fetch_row($result)){
	  $ville = odbc_result($result, 1);
	  $usr = odbc_result($result, 2);

	  echo '<tr><td align="center">'.$ville.'</td>
	  			<td align="center">'.$usr.'</td>
	  		</tr>';
	}
	echo '</table>';
}
?>