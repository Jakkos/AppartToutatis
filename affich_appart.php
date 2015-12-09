<link href="css/heroic-features.css" rel="stylesheet">
<?php 
/*
//$req = "update appartement set URLPHOTO='http://www.bauvey-immobilier.com/site/images/normal/l-ours-blanc-interieur-final-bd%20JALIS.jpg' WHERE IDAPPARTEMENT=2";
$req = "select IDAPPARTEMENT,URLPHOTO from appartement";
//$req = sp
//$req = "select IDAPPARTEMENT, NUMAPPARTEMENT, URLPHOTO from appartement";
  $result = odbc_exec($conn,$req);
  
  while(odbc_fetch_row($result)){
  $name = odbc_result($result, 1);
  $surname = odbc_result($result, 2);
  print_r("$name $surname\n");
}

odbc_close($conn);/*
*/
include ('connexion.php');

$req = find_appart(0);

$result = odbc_exec($conn,$req);
while(odbc_fetch_row($result)){
  $titre = odbc_result($result, 1);
  $surname = odbc_result($result, 2);
  $photo = odbc_result($result, 3);  
  imprimer($titre, $photo);
}
odbc_close($conn);

function find_appart($type) {
  if ($type==0) {
    $req = 'SELECT APPARTTITRE, NUMAPPARTEMENT, URLPHOTO 
    FROM appartement WHERE ESTDISPONIBLE=1';
    return $req;
  }
  else {
    $req = 'SELECT APPARTTITRE, NUMAPPARTEMENT, URLPHOTO FROM
    appartement INNER JOIN type ON appartement.IDTYPE = type.IDTYPE 
    WHERE ESTDISPONIBLE=1 AND appartement.IDTYPE='.$type;
    return $req;
  }
}

function imprimer($titre, $photo)  {
  echo '
    <div class="col-md-3 col-sm-6 hero-feature">
      <div class="thumbnail">
        <img src="'.$photo.'" alt="">
        <div class="caption">
          <h3>'.$titre.'</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          <p>
            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
          </p>
        </div>
      </div>
    </div>
  ';
}
?>

