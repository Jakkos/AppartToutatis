<?php
function get_appart($id) {
	$req = 'SELECT IDAPPARTEMENT, URLPHOTO FROM appartement 
	 WHERE appartement.IDAPPARTEMENT = '.$id;
	  return $req;
}

function get_loyer($conn, $id) {
	$req = "SELECT MONTANT FROM appartement 
	INNER JOIN loyer ON appartement.IDLOYER = loyer.IDLOYER;";
	  $result=odbc_exec($conn,$req);
  return odbc_result($result, 1);
}

function get_description_titre ($conn, $id) {
  $req = 'SELECT VAL FROM dbo.description WHERE NOMDESCRIPTION= "titre" AND IDAPPARTEMENT='.$id;
  $result=odbc_exec($conn,$req);
  return odbc_result($result, 1);
}

function get_description_total ($conn, $id) {
  $req = 'SELECT VAL FROM dbo.description WHERE NOMDESCRIPTION= "description" AND IDAPPARTEMENT='.$id;
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

function find_appart_prop($idProp)
{
  $req = 'SELECT appartement.IDAPPARTEMENT,appartement.URLPHOTO FROM
    appartement WHERE appartement.IDUTILISATEUR='.$idProp ;
    return $req;
}

function find_appart_loc($idLoc)
{
  $req = 'SELECT contratlocation.IDAPPARTEMENT FROM
    contratlocation INNER JOIN appartement ON appartement.IDAPPARTEMENT = contratlocation.IDAPPARTEMENT 
    WHERE contratlocation.IDUTILISATEUR='.$idLoc.'AND contratlocation.DATEDEBUTLOC < convert(datetime,"01/01/1970",103)';
    return $req;
}
?>