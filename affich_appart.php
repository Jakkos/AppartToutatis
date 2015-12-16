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

$req = 'INSERT INTO  contratlocation (IDAPPARTEMENT,IDUTILISATEUR,DATEDEBUTLOC,DATEFINLOC)
VALUES (1,1,CONVERT(DATETIME,"01/12/2015",101),CONVERT(DATETIME,"14/12/2015",101))';


//$req = "sp_adduser User2_GroupeB";

$result = odbc_exec($conn,$req);
ECHO 'ok';




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
        <a href="appartement.php?id='.$id.'" class="btn btn-primary">Louer</a> <a href="#" class="btn btn-default">More Info</a>           
        </p>
      </div>
    </div>
  </div>
  ';
}
?>

