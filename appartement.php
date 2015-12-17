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
  $type = odbc_result($result, 3);
  $idtype = odbc_result($result, 4);
  $titre = get_description_titre($conn, $_GET['id']);
  $description = get_description_total($conn, $_GET['id']);
}

               echo '
                   <img class="img-responsive" src="'.$photo.'" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">'.$loyer.'  €</h4>
                        <h4><a href="#">'.$titre.'</a>
                        </h4>
                        <p>'.utf8_encode($description).'</p>
                        <h3>'.$type.'</h3>
                    </div>
                    '; ?>
                </div>

                <div class="well">

                    <div class="text-right">
                    <?php 
                    if ($idtype==2) {
    echo '<table style="width:100%"><form method="post" action="contrat.php?id='.$id.'" name="plage_choix">';
echo '<tr><td><select name ="plage" class="form-control">';

$req = "SELECT plage.IDPLAGE, PLAGE 
    FROM plage WHERE plage.IDPLAGE < 53 AND IDPLAGE NOT IN (SELECT IDPLAGE FROM paiement
      INNER JOIN contratlocation ON paiement.IDCONTRAT = contratlocation.IDCONTRAT
      WHERE IDAPPARTEMENT=".$id.");";
  $result = odbc_exec($conn,$req);
  while (odbc_fetch_row($result))
  {
    $plage = odbc_result($result, 2);
    $id = odbc_result($result, 1);
    echo '<option value='.$id.'>'.$plage.'</option>';
}


//.ddlPlage($conn,$id).

echo
'</select></td>      
                        <td><button class="btn btn-success" type="submit" href="contrat.php?id='.$id.'">Louer pour les vacances !</button></td>
</form> 
                        <td><a class="btn btn-success" id="louer">Contacter lagence</a></td></tr></table>';
}
elseif ($idtype==3) {
    echo '
                        <a class="btn btn-success data-toggle="modal" data-target="#mod-contrat" href="contrat.php?id='.$id.'">Louer à lannée !</a><p></p>';

    echo '<table style="width:100%"><form method="post" action="contrat.php?id='.$id.'" name="plage_choix2">';
echo '<tr><td><select name ="plage" class="form-control">';

$req = "SELECT plage.IDPLAGE, PLAGE 
    FROM plage WHERE plage.IDPLAGE BETWEEN 25 AND 32 AND IDPLAGE NOT IN (SELECT IDPLAGE FROM paiement
      INNER JOIN contratlocation ON paiement.IDCONTRAT = contratlocation.IDCONTRAT
      WHERE IDAPPARTEMENT=".$id.");";
  $result = odbc_exec($conn,$req);
  while (odbc_fetch_row($result))
  {
    $plage = odbc_result($result, 2);
    $id = odbc_result($result, 1);
    echo '<option value='.$id.'>'.$plage.'</option>';
}


//.ddlPlage($conn,$id).

echo
'</select></td>      
                        <td><button class="btn btn-success" type="submit" href="contrat.php?id='.$id.'">Louer pour les vacances !</button></td>
</form> 
                        <td><a class="btn btn-success" id="louer">Contacter lagence</a></td></tr></table>';
} else {
echo '<table style="width:100%">
        <tr><td><a class="btn btn-success data-toggle="modal" data-target="#mod-contrat" href="contrat.php?id='.$id.'">Louer!</a></td>
        <td><a class="btn btn-success" id="louer">Contacter lagence</a></td></tr></table>';
}?>
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

    <script src="js/function.js"></script>



</body>

</html>
