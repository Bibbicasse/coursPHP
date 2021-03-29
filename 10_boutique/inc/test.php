<!-- < ?php 
require_once '../inc/functions.php';
?>   -->
<?php 

$pdoSITE = new PDO('mysql:host=localhost;dbname=site', 
'root', /* nom utilisateur */ 
'',//mdp
array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //erreur SQL navigateur
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //charset des échange BDD
    )
);
// print_r($pdoSITE);
// print_r(get_class_methods($pdoSITE));

//j'affiche une info

$requete = $pdoSITE->query("SELECT * FROM membre");
// jevardump($requete);

$test = $requete->fetch(PDO::FETCH_ASSOC);
// jevardump($test);

echo "<p>Prenom :".$test['prenom']." <br> Nom:".$test['nom']."<br> Email: ".$test['email']."</p>";
// ?> 