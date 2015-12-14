<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
<?php include ('navbar.php') ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">



            <div class="col-md-9">

                <div class="thumbnail">
                <?php

include ('requete_appart.php');
include ('connexion.php');
$loyer = get_loyer($conn,$_GET['id']);
$req = get_appart($_GET['id']);
$result = odbc_exec($conn,$req);
while(odbc_fetch_row($result)){
  $id = odbc_result($result, 1);
  $photo = odbc_result($result, 2);
  $titre = get_description_titre($conn, $_GET['id']);
  $description = get_description_total($conn, $_GET['id']);
}

                
                   echo ' <img class="img-responsive" src="'.$photo.'" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">'.$loyer.'  €</h4>
                        <h4><a href="#">'.$titre.'</a>
                        </h4>
                        <p>'.$description.'</p>
                    </div>';
                    ?>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Contacter l'agence</a>
                        <a class="btn btn-success">Louer!</a>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

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
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
