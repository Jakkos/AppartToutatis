  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div>
        <a class="navbar-brand" href="#">Appartout'Atis</a>
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
        </ul>
        <ul class="nav navbar-nav" id="identification">
          <li>
            <button class= "btn btn-default navbar-btn" data-toggle="modal" data-target="#mod-con">Connexion</button>
          </li>
          <li>
            <button class= "btn btn-default navbar-btn" data-toggle="modal" data-target="#mod-ins">Inscription</button>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->

    </div>
    <!-- /.container -->
  </nav>

  <?php include ("modal.php") ?>;
