<!DOCTYPE html>



<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <title>AppartToutatis</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet"> 

  <!-- Custom CSS -->
  <!-- Custom CSS -->
  <link href="css/mine.css" rel="stylesheet">


</head>

<body>
  <?php include("navbar.php"); ?>
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
      <h1>Bievenue sur ApartoutAtis !</h1>
      <p>Prenez un peu de potion magique et trouvez la location de vos rêves sur AppartoutAtis.</p>
      <p><a class="btn btn-primary btn-large">Call to action!</a>
      </p>
    </header>

    <hr>

    <!-- Title -->
    <div class="row">
      <div class="col-lg-12">
        <h3>Deniers appartements disponibles</h3>
      </div>
    </div>
    <!-- /.row -->

    <!-- Page Features -->
    <div class="row text-center">;

      <?php include('test.php'); ?>

    </div>
    <hr>

    <!-- Footer -->
    <footer>
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright &copy; Your Website 2014</p>
        </div>
      </div>
    </footer>
  </div>


</body>
</html>

