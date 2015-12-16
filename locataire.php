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



$req = find_appart_loc(2);
$result = odbc_exec($conn,$req);
while(odbc_fetch_row($result)){
  $id = odbc_result($result, 1);
  $photo = odbc_result($result, 2);
  $titre = get_description_titre($conn, $id);
  $description = get_description_total($conn, $id);
  imprimer($id, $titre, $photo, $description);
}
odbc_close($conn);

function imprimer($id, $titre, $photo, $description)  {
  echo '
  <div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
      <img src="'.$photo.'" alt="">
      <div class="caption">
        <h3>'.utf8_decode($titre).'</h3>
        <p>
        <a href="appartement.php?id='.$id.'" class="btn btn-primary">Louer</a> <a href="#" class="btn btn-default">More Info</a>           
        </p>
      </div>
    </div>
  </div>
  ';
}
// affichage de sa liste d'appartement
// bouton payer
// déposer contrat assurance et entretien chaudière
?>
</div>
<div class="row text-right">
	 <p><button type="button" class="btn btn-default" data-dismiss="modal">Payer</button></p>
	 <p><button type="button" class="btn btn-default" data-dismiss="modal">Entretien chaudière </button></p>
</div>
</div>
</body>