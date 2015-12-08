<?php
include 'c_admin.php';
include 'dynamic.js';

put_header(); // réalise le header du fichier php et met la navbar
menu(); // affiche le menu proposant toutes les fonctionnalités du chef d'agence
onglet_employe(); // gère l'affichage des fonctionnalités pour la gestion des employés
?>