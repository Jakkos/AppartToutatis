<?php
session_start();


session_destroy();
echo'ko';

header ('Location: index.php');
?>