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
<?php include("navbar.php") ?>

  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
      <h1>A Warm Welcome!</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
      <p><a class="btn btn-primary btn-large">Call to action!</a>
      </p>
    </header>

    <hr>

    <!-- Title -->
    <div class="row">
      <div class="col-lg-12">
        <h3>Latest Features</h3>
      </div>
    </div>
    <!-- /.row -->

    <!-- Page Features -->
    <?php include("affich_appart.php"); ?>
  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </html>
