<?php
include 'c_admin.php';
include 'dynamic.js';
include '../connexion.php';

put_header(); // réalise le header du fichier php et met la navbar
include '../navbar.php';
menu(); // affiche le menu proposant toutes les fonctionnalités du chef d'agence
onglet_employe($conn); // gère l'affichage des fonctionnalités pour la gestion des employés
?>