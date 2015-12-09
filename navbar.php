<?php include ("modal.php") ;?>
<?php
function genererBarreNav(){
  if (isset($_SESSION["utilisateur"]))
  {
    if (isset($_SESSION["role"]))
    {
      $user=$_SESSION["role"];
      switch ($user) {
        case '0':
          # ici ChefAgence
        break;
        case '1':
          # ici EmployeAgence
        break;
        case '2':
          # ici Locataire
        break; 
        case '3':
          # ici Proprietaire
        break;  
        case '4':
          # ici LocataireProprietaire
        break;
        case '5':
          # ici UtilisateurConnecte
        break;
        
        default:
          # code...
        break;
      }  
    }
    else
    {

    }


  }
}

?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <a class="navbar-brand" href="index.php">Appartout'Atis</a>
    <ul class="nav navbar-nav" id="access">
      <li>
        <a href="#">Meublés</a>
      </li>
      <li>
        <a href="#">A l'année</a>
      </li>
      <li>
        <a href="#">Vacances</a>
      </li>
      <li>
        <a href="#">Locataire</a>
      </li>
      <li>
        <a href="UserPage.php">Propriétaire</a>
      </li>
      <li>
        <a href="#">About</a>
      </li>
      <li>
        <a href="#">Services</a>
      </li>
      <li>
        <a href="#">Contact</a>
      </li>
    </ul>
    <ul class="nav navbar-nav" id="identification">
      <li>
        <button class= "btn btn-default navbar-btn" data-toggle="modal" data-target="#mod-con" >Connexion</button>
      </li>
      <li>
        <button class= "btn btn-default navbar-btn" data-toggle="modal" data-target="#mod-ins">Inscription</button>
      </li>
    </ul>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
  <!-- /.container -->
</nav>


