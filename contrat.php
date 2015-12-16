<?php
include 'administration/c_admin.php';
include 'connexion.php';

if ($conn)  {
	echo 'ok';
}
if(isset($_POST['creerContrat'])) {

	creation_contrat();

}

function creation_contrat(){
	
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
include 'navbar.php';



?>

<div id="mod-con" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Connectez vous ! </h4>
      </div>
      <div class="modal-body">
        <form method="post" action='' name="login_form">
          <p><input type="text" class="span3" name="eid" id="email" placeholder="Email"></p>
           <p><button type="submit" class="btn btn-primary">Joindre dossiers</button></p>
          <p><button type="submit" class="btn btn-primary">Valider</button>
            <input type="hidden" name="creerContrat" value="true">
            <a href="https://www.youtube.com/watch?v=PWgvGjAhvIw">Forgot Password?</a>
          </p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



?>