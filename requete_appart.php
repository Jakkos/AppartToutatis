<?php
function get_appart($id) {
	$req = 'SELECT IDAPPARTEMENT, URLPHOTO, NOMTYPE, appartement.IDTYPE FROM appartement 
   INNER JOIN type ON appartement.IDTYPE = type.IDTYPE WHERE appartement.IDAPPARTEMENT = '.$id;
	  return $req;
}

function get_type($type) {
  $req = 'SELECT IDAPPARTEMENT, URLPHOTO FROM appartement 
   WHERE appartement.IDTYPE = '.$type;
    return $req;

}

function get_loyer($conn, $id) {
	$req = "SELECT MONTANT FROM appartement 
	INNER JOIN loyer ON appartement.IDLOYER = loyer.IDLOYER;";
	  $result=odbc_exec($conn,$req);
  return odbc_result($result, 1);
}

function get_description_titre ($conn, $id) {
  $req = 'SELECT VAL FROM description WHERE NOMDESCRIPTION= "titre" AND IDAPPARTEMENT='.$id;
  $result=odbc_exec($conn,$req);
  return odbc_result($result, 1);
}

function get_description_total ($conn, $id) {
  $req = 'SELECT VAL FROM description WHERE NOMDESCRIPTION= "description" AND IDAPPARTEMENT='.$id;
  $result=odbc_exec($conn,$req);
  return odbc_result($result, 1);
}

function find_appart($type) {
  if ($type==0) {
    $req = 'SELECT IDAPPARTEMENT, URLPHOTO 
    FROM appartement WHERE ESTDISPONIBLE=1';
    return $req;
  }
  else {
    $req = 'SELECT IDAPPARTEMENT, URLPHOTO FROM
    appartement INNER JOIN type ON appartement.IDTYPE = type.IDTYPE 
    WHERE ESTDISPONIBLE=1 AND appartement.IDTYPE='.$type;
    return $req;
  }
}
function find_appart_loc($idLoc)
{
  $req = 'SELECT contratlocation.IDAPPARTEMENT FROM
    contratlocation INNER JOIN appartement ON appartement.IDAPPARTEMENT = contratlocation.IDAPPARTEMENT 
    WHERE contratlocation.IDUTILISATEUR='.$idLoc.' AND contratlocation.DATEDEBUTLOC > convert(datetime,"01/01/1970",103) AND contratlocation.DATEFINLOC > getdate()';
    return $req;
}
//trouver le contrat de location correspondant à un numéro d'utilisateur


function find_appart_prop($idProp)
{
  $req = 'SELECT appartement.IDAPPARTEMENT, URLPHOTO FROM
    appartement WHERE IDUTILISATEUR='.$idProp;
    return $req;
}

//INNER JOIN contratlocation ON paiement.IDCONTRAT = contratlocation.IDCONTRAT // INNER JOIN paiement ON plage.IDPLAGE = paiement.IDPLAGE 
function ddlPlage($conn,$id){
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
}

function ddlPlage2($conn,$id){
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
}

function findtype($conn,$id) {
  $req = "SELECT IDTYPE FROM appartement";
  $res = odbc_exec($conn,$req);
  return odbc_result($res, 1);
}
?>