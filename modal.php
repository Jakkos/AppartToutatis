<?php
session_start();
require_once("repository.php");

require_once("connexion.php");

if (isset($_POST['Inscription'])) {
  
  addUser($conn);
}

function ddlVille($conn){
  $result = odbc_exec($conn,"SELECT IDVILLE, NOMVILLE from ville;");
  while (odbc_fetch_row($result))
  {
    $nomville = odbc_result($result, 2);
    $id = odbc_result($result, 1);
    echo '<option value='.$id.'>'.$nomville.'</option>';
  }
}

function addUser($conn){
  // ajout de l'adresse avec retour id
  // ajout utilisaeur avec id adresse
  $idville = (is_numeric($_POST['ville']) ? (int)$_POST['ville'] : 0);
  $numrue = (is_numeric($_POST['num']) ? (int)$_POST['num'] : 0);
  $nomrue = trim($_POST["adr"]);
  $idadresse = (int)Utilisateur::addAdress($conn,$idville,$numrue,$nomrue); //int
  $nom=trim($_POST["nom"]); //chaine
  $prenom = trim($_POST["prenom"]); //chaine
  $mail =trim($_POST["mail"]); //chaine
  $tel=(is_numeric($_POST['tel']) ? (int)$_POST['tel'] : 0); //int 
  $password=trim($_POST["pass"]); //chaine
  $estouvert=1; //int
  $idsysuser=0; //int

  Utilisateur::addUser($conn,$idadresse,$nom,$prenom,$mail,$tel,$password,$estouvert,$idsysuser);
}

if (isset($_POST['Connexion']))
{
  connexion();
}

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
          <p><input type="password" class="span3" name="passwd" placeholder="Password"></p>
          <p><button type="submit" class="btn btn-primary">Connexion</button>
            <input type="hidden" name="Connexion" value="true">
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

<div id="mod-ins" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inscrivez vous ! </h4>
      </div>
      <div class="modal-body">
        <form method="post" action='' name="login_form">
          <p><input type="text" class="span3" name="nom" placeholder="Nom"></p>
          <p><input type="text" class="span3" name="prenom" placeholder="Prénom"></p>
          <p><input type="text" class="span3" name="mail" id="email" placeholder="Email"></p>
          <p><input type="text" class="span3" name="tel" placeholder="Telephonne"></p>
          <p><input type="password" class="span3" name="pass" placeholder="Mot de passe"></p>

          <p><input type="text" class="span3" name="num" placeholder="n°"><input type="text" class="span3" name="adr" placeholder="rue"></p>
          <p><select name ="ville" class="form-control"><?php ddlVille($conn); ?></select></p>          
          <p><button type="submit" class="btn btn-primary">Sign in</button>
            <input type="hidden" name="Inscription" value="true">
            <a href="#">Forgot Password?</a>
          </p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
