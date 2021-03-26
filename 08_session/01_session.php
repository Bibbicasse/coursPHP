<?php 
//Création ou ouverture d'une session
echo '<h1> Cours PHP 7 - <code>$_SESSION</code></h1>';
echo '<p>Les données du fichier de session sont accessibles et manipulables à partir de la superglobale $_SESSION. </p>';

session_start();//permet de créer un fichier de session avec son identifiant ou de l'ouvrir s'il existe déjà et que l'on a reçu un cookie avec l'id dedant.

//Principe des sessions : Un fichier temporaire appelé "session" est crée sur le serveur, avec un identifiant unique. Cette session est lié à un internaute, dans le même temps un cookie est déposé sur le poste de l'internaute avec l'identifiant (ou nom de PHPSESSID), Même si ce cookie se détruit quand on quitte le navigateur, le fichier de session peut contenir des informations sensible !!! Il n'est pas accessible par l'internaute

$_SESSION['pseudo'] = 'tintin';
$_SESSION['mdp'] = 'vol474';
$_SESSION['email'] = 'tintin@moulinsart.be';

echo "<p>La session est remplie. </p>";
echo '<pre>';
    print_r($_SESSION);
echo '</pre>';

//il est possible de vider une partie de la session avec unset();
unset($_SESSION['mdp']);

echo '<pre>';
    print_r($_SESSION);
echo '</pre>';

session_destroy();

// echo 'La session est détruite'; //Nous avons effectué un session-destroy() mais il n'est pas exécuté qu'à la fin de notre script. Nous voyons encore ici le contenu de la session, mais le fichier temporaire dans le dossier temp a bien été supprimé

//Ce fichier contient les informations de session et elles sont accessibles grâce session_start()

// echo '<pre>';
//     print_r($_SESSION);
// echo '</pre>';




?> 