<body>
  <div class="container">
  	<div class="row text-center">
<?php
include 'administration/c_admin.php';
include 'connexion.php';
include ('requete_appart.php');
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
END;
include 'navbar.php';



$req = find_appart_prop($_SESSION['utilisateur']);
$result = odbc_exec($conn,$req);
while(odbc_fetch_row($result)){
  $id = odbc_result($result, 1);
  $photo = odbc_result($result, 2);
  $titre = get_description_titre($conn, $id);
  imprimer($conn,$id, $titre, $photo);
}
odbc_close($conn);

function imprimer($conn, $id, $titre, $photo)  {
  echo '
  <div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
      <img src="'.$photo.'" alt="">
      <div class="caption">
        <h3>'.utf8_decode($titre).'</h3>
        <p>
        ';
        $res = louerpar($conn,$id);
        $nom = odbc_result($res, 1);
        $prenom = odbc_result($res, 2);
        if ($nom) {
        echo 'Appartement loué par : '.$prenom.'  '.$nom;
      }
      else {
        echo 'Appartement Libre';
      if (isAvailable($conn,$id)) {

        echo '<a class="btn btn-primary" href="proprietaire_fonction.php?a=0&id='.$id.'" >Rendre Indisponible</a>';
      }
      else {
       echo '<a class="btn btn-primary" href="proprietaire_fonction.php?a=1&id='.$id.'" >Rendre Disponible</a>'; 
      }
    }
       echo '
        </p>
      </div>
    </div>
  </div>
  ';
}

function louerpar($conn,$id) {
  $req = 'SELECT PRENOM,NOM from utilisateur INNER JOIN contratlocation ON contratlocation.IDUTILISATEUR = contratlocation.IDUTILISATEUR WHERE IDAPPARTEMENT='.$id;
  return odbc_exec($conn,$req);
}

function isAvailable($conn,$id) {
   $req = 'SELECT ESTDISPONIBLE FROM appartement WHERE IDAPPARTEMENT='.$id;
   $res = odbc_exec($conn,$req);
   if (odbc_result($res,1)) {
    return true;
   }
   else {
    return false;
   }
}
// affichage de sa liste d'appartement
// bouton payer
// déposer contrat assurance et entretien chaudière
?>
</div>
<div class="row text-right">
	 
</div>
</div>
</body>