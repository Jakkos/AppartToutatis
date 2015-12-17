<?php 
include ("modal.php") ;
$dossierCourant = substr(getcwd(),strlen(getcwd())-14,14);
$path ="";
if ($dossierCourant != "AppartToutatis"){//csiprojectsite
  $path = "../";
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <a class="navbar-brand" href="<?php echo $path;?>index.php">Appartout'Atis</a>
    <ul class="nav navbar-nav" id="access">
      <li>
        <a href="apparttype.php?type=1">Meublés</a>
      </li>
      <li>
        <a href="apparttype.php?type=3">A l'année</a>
      </li>
      <li>
        <a href="apparttype.php?type=2">Vacances</a>
      </li>
      <?php
      genererBarreNav($path);
      ?> 
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
    <!-- /.container -->
  </nav>


  <?php

  function genererBarreNav($path){
    if (isset($_SESSION["utilisateur"]))
    { 

      echo '<li><a href="'.$path.'mon_compte.php">Mon Compte</a></li>';
      if (isset($_SESSION["idsysuser"]))
      {
        $type=$_SESSION["idsysuser"];
        switch ($type) {
          case '1':
            # ici chef d'agence
          if(substr(getcwd(),strlen(getcwd())-14,14) == "administration"){
            echo "<li><a href='oi_admin.php'>Administration</a></li>";
          }else{
            echo "<li><a href='administration/oi_admin.php'>Administration</a></li>";
          }
          break;
          case '3':
          # ici EmployeAgence
          echo <<<END
          <li>
          <a href="emp.php">Employé</a>
          </li>
END;
          break;
          case '4':
          # ici Locataire
          echo <<<END
          <li>
          <a href="locataire.php">Locataire</a>
          </li>
END;
          break; 
          case '5':
          # ici Propriétaire
          echo <<<END
          <li>
          <a href="UserPage.php">Propriétaire</a>
          </li>
END;
          break;  
          case '6':
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
          case '8':
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
      echo <<<END
      </ul>
      <ul class="nav navbar-nav" id="identification">
          <li>
          <a href="deconnexion.php">Deconnexion</a>
          </li>
      </ul>
END;
      
    }
     else
      {
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
      }
  }
  // locataire / proprietaire / locprop / employe / userco / chefagence
  ?>
