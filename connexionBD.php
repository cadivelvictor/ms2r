<!-- Script PHP pour la connexion à la base de données -->
<!-- Fichier SQL db_intra_crise.sql dans le dossier sql à importer dans phpMyAdmin -->

<?php
  //URL phpMyAdmin : http://172.28.20.151/eds-modules/phpmyadmin512x230213093616/

  // Paramètres de connexion à la base MySQL
  $dbHote        = "127.0.0.1";
  $dbNom         = "eqD_db";
  $dbUtilisateur = "root";
  $dbMotDePasse  = "";

  // Ouverture de la connexion
  try {
    $connexion = new PDO('mysql:host=' . $dbHote . '; dbname=' . $dbNom, $dbUtilisateur, $dbMotDePasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  } catch (Exception $erreur) {
    echo 'Echec de la connexion à la base de données : ' . $erreur->getMessage() . '<br/>';
    echo "N° : " . $erreur->getCode();
  }

 ?>
