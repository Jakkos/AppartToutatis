<?php
include 'dynamic.js';

	function put_header(){
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
			  <link href="../css/bootstrap.css" rel="stylesheet">

			  <!-- Custom CSS -->
			  <link href="../css/mine.css" rel="stylesheet">
			</head>
			<body>
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
END;
	}
	
	function menu(){
		echo <<<END
			<div class="container">
			  <nav class="navbar navbar-default" role="navigation" id="topmenu">
				<ul class="nav navbar-nav">
				  <li class="dropdown">
					<a href="#" data-toggle="collapse" data-target="#one" onclick="toggle_div('emp', 'stat');">Employés</a>
				  </li>
				  <li class="dropdown">
					<a href="#" data-toggle="collapse" data-target="#two" onclick="toggle_div('stat', 'emp');">Statistiques</a>
				  </li>
				</ul>
			  </nav>
			</div>
END;
	}
	
	function onglet_employe(){
		echo <<<END
			<div id="emp" class="container" style="display:none;">
				<div class="row">
					<div class="col-md-8" style="border: 1px solid black">
						<h4>Ajouter un Employé</h4>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-3" style="border: 1px solid black">
						<h4>Fermer un compte</h4>
					</div> 
				</div> 
			</div>
			<div id="stat" class="container" style="display:none;">
				<div class="row">
					<div class="col-md-12" style="border: 1px solid black;">
						<h4>Statistiques</h4>
					</div>
				</div> 
			</div>
END;
	}
?>