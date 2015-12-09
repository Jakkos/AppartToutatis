 <?php

 echo 'This text is placed through <b>PHP</b>!';
 echo '<p>';
 echo '</p>';

 include("connexion.php");
 if ($conn) {
 	echo 'ok';
 }

 $req = "delete from plage";
 //$req = "alter table appartement add APPARTTITRE varchar(70) NULL";
 $result = odbc_exec($conn,$req);



 while(odbc_fetch_row($result)){
 	$name = odbc_result($result, 1);
 	$surname = odbc_result($result, 2);
 	print_r("$name $surname\n");
 }



 while ($data[] = odbc_fetch_array($result)){
 	print_r($data);
 }


//!\
 odbc_close($conn);
//!\
 ?>
<!-- /.container -->