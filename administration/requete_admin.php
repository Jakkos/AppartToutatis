<?php
function get_user(){
    $req = 'SELECT IDUTILISATEUR, NOM, PRENOM, ESTOUVERT 
    FROM dbo.utilisateur';
    return $req;
}

function update_user_etat($etat, $id){
	$id = (is_numeric($_POST["id"])?(int)$_POST["id"]:0);
    $req = "UPDATE dbo.utilisateur 
    SET ESTOUVERT=$etat
	WHERE IDUTILISATEUR=$id";
    return $req;
}
?>