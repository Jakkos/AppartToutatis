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



$req = find_appart_loc(1);
$result = odbc_exec($conn,$req);
while(odbc_fetch_row($result)){
  $id = odbc_result($result, 1);
  //$photo = odbc_result($result, 2);
  $titre = get_description_titre($conn, $id);
  $description = get_description_total($conn, $id);
  imprimer($conn, $id, $titre, $description);
}
odbc_close($conn);

function imprimer($conn, $id, $titre , $description)  {
  echo '
  <div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
      
      <div class="caption">
        <h3>'.utf8_decode($titre).'</h3>
        <p>
        <a href="appartement.php?id='.$id.'" class="btn btn-primary">Louer</a> <a href="#" class="btn btn-default">More Info</a>   
        <a href="payer.php?id='.$id.'" class="btn btn-default">Payer</a>
        <a href="etretienChaudiere.php?id='.$id.'" class="btn btn-default">Entretien Chaudiere</a>
        <a href="assurance.php?id='.$id.'" class="btn btn-default">Assurance</a>';
echo '
        <a href="depotPreavis.php?id='.$id.'" class="btn btn-default">Préavis</a>';
        
        if (findtype($conn,$id)==1) {
        echo '<p>Votre contrat se termine le : '.getDateFL($conn,$id).'</p>';
        echo '<a href="demandeProlongation.php?id='.$id.'" class="btn btn-default">Prolongement Bail</a>';                
      }
echo '        </p>
      </div>
    </div>
  </div>
  ';
}

function getDateFL($conn,$id) {
  $req = "SELECT CONVERT(VARCHAR,DATEFINLOC,103) FROM contratlocation WHERE IDAPPARTEMENT=".$id;
  $res = odbc_exec($conn,$req);
  return odbc_result($res,1);
}
// affichage de sa liste d'appartement
// bouton payer
// déposer contrat assurance et entretien chaudière

// $req = "select IDUTILISATEUR from appartement;";



// $result = odbc_exec($conn,$req);
// while(odbc_fetch_row($result)){
//   $id = odbc_result($result, 1);

// echo '<p>'.$id.'</p>';

// echo '<p></p>';
//}
?>
</div>

</div>
</body>

