<?php 
    //FICHIER INDISPENSABLE AU FONCIONNEMENT DU SITE

     /* ***********************************************/
     /*      1 - CONNEXION A LA BASE DE DONNEES        /
     /* ***********************************************/     
     
$pdoWebforce = new PDO('mysql:host=localhost;dbname=wf3_php_intermediaire_salvatore', 
'root', /* nom utilisateur */ 
'',//mdp
array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //erreur SQL navigateur
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //charset des échange BDD
    )
);

    /* ***********************************************/
    /*          2 - OUVERTURE DE SESSIONS             /
    /* ***********************************************/ 

session_start();

    /* ***********************************************/
    /*   3 - CHEMIN DU SITE AVEC UNE CONSTANTE        /
    /* ***********************************************/ 

    /* ***********************************************/
    /*        4 - VARIABLE POUR LES CONTENUS          /
    /* ***********************************************/ 
$contenu = '';

    /* ***********************************************/
    /*          5 - INCLUSION DES FONCTIONS           /
    /* ***********************************************/
require_once 'functions.php';



?> 