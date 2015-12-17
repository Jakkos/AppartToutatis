<?php
include 'administration/c_admin.php';
include 'connexion.php';
include 'requete_appart.php';
require_once('navbar.php');

$loyer = get_loyer($conn,$_GET['id']);
$req = get_appart($_GET['id']);
$result = odbc_exec($conn,$req);
while(odbc_fetch_row($result)){
  $id = odbc_result($result, 1);
  $photo = odbc_result($result, 2);
  $type = odbc_result($result, 3);
  $idtype = odbc_result($result, 4);
  $titre = get_description_titre($conn, $_GET['id']);
  $description = get_description_total($conn, $_GET['id']);
}

               echo '
                   <img class="img-responsive" src="'.$photo.'" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">'.$loyer.'  €</h4>
                        <h4><a href="#">'.$titre.'</a>
                        </h4>
                        <p>'.utf8_encode($description).'</p>
                        <h3>'.$type.'</h3>
                    </div>
                    ; 
                </div>

                <div class="well">

                    <div class="text-right">';



if(isset($_POST['creerContrat'])) {
	creation_contrat($conn);
}


if (isset($_POST['plage'])) {
  creation_contrat2($conn);
}

function creation_contrat($conn){
	    $id = $_GET['id'];
    if (isset($_SESSION['utilisateur'])) {
      $user = $_SESSION['utilisateur'];  
    }
    $req = 'INSERT INTO  contratlocation (IDAPPARTEMENT,IDUTILISATEUR,DATEDEBUTLOC,DATEFINLOC)
VALUES ('.$id.','.$user.',CONVERT(DATETIME,"01/01/1970",103),CONVERT(DATETIME,"01/01/1970",103))';
odbc_exec($conn,$req);
}

function creation_contrat2($conn){
      $id = $_GET['id'];
      $plage = $_POST['plage'];
      if (isset($_SESSION['utilisateur'])) {
        $user = $_SESSION['utilisateur'];  
    }
    $req = 'INSERT INTO  contratlocation (IDAPPARTEMENT,IDUTILISATEUR,DATEDEBUTLOC,DATEFINLOC)
VALUES ('.$id.','.$user.',CONVERT(DATETIME,"01/01/1970",103),CONVERT(DATETIME,"01/01/1970",103))';
odbc_exec($conn,$req);

  $req = 'SELECT @@IDENTITY FROM contratlocation';
  $res = odbc_exec($conn,$req);
  $idcont = odbc_result($res, 1);  
    $req = 'INSERT INTO paiement (IDCONTRAT,IDPLAGE,DATEPAIEMENT) VALUES ('.$idcont.','.$plage.',NULL)';
    //odbc_exec($conn,$req);
}


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
?>

<div id="mod-contrat" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reservez votre appartement ! </h4>
      </div>
      <div class="modal-body">
        <form method="post" action='' name="login_form">
           <p><button type="submit" class="btn btn-primary">Joindre dossiers</button></p>
          <p><button type="submit" class="btn btn-primary">Valider</button>
            <input type="hidden" name="creerContrat" value="true">
          </p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" action = "index.php">Close</button>
      </div>
    </div>

  </div>
</div>