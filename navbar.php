<?php include ("modal.php") ;?>
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
      <?php
      $_SESSION["utilisateur"] = "oui";
      $_SESSION["role"] = 8;
      genererBarreNav();
      ?> 
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
    <!-- /.container -->
  </nav>


  <?php
  function genererBarreNav(){
    if (isset($_SESSION["utilisateur"]))
    {
      if (isset($_SESSION["role"]))
      {
        $type=$_SESSION["role"];
        switch ($type) {
          case '0':
          # ici ChefAgence
          break;
          case '1':
          # ici EmployeAgence
          break;
          case '2':
          echo <<<END
          <li>
          <a href="#">Locataire</a>
          </li>
END;
          # ici Locataire
          break; 
          case '3':
          echo <<<END
          <li>
          <a href="UserPage.php">Propriétaire</a>
          </li>
END;
          # ici Proprietaire
          break;  
          case '4':
          echo <<<END
          <li>
          <a href="#">Locataire</a>
          </li>
          <li>
          <a href="UserPage.php">Propriétaire</a>
          </li>
END;
          # ici LocataireProprietaire
          break;
          case '5':
          # ici UtilisateurConnecte
          break;

          default:
          echo <<<END
          </ul>
          <ul class="nav navbar-nav" id="identification">
          <li>
          <button class= "btn btn-default navbar-btn" data-toggle="modal" data-target="#mod-con" >Connexion</button>
          </li>
          <li>
          <button class= "btn btn-default navbar-btn" data-toggle="modal" data-target="#mod-ins">Inscription</button>
          </li>
          </ul>
END;
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