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
include ('requete_appart.php');

$req = find_appart(0);
$result = odbc_exec($conn,$req);
while(odbc_fetch_row($result)){
  $id = odbc_result($result, 1);
  $photo = odbc_result($result, 2);
  $titre = get_description_titre($conn, $id);
  $description = get_description_total($conn, $id);
  imprimer($id, $titre, $photo, $description);
}
odbc_close($conn);

function imprimer($id, $titre, $photo, $description)  {
  echo '
  <div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
      <img src="'.$photo.'" alt="">
      <div class="caption">
        <h3>'.utf8_decode($titre).'</h3>
        <p>
        <a href="appartement.php?id='.$id.'" class="btn btn-primary">Voir Infos</a> <a href="#"</a>           
        </p>
      </div>
    </div>
  </div>
  ';
}
?>

