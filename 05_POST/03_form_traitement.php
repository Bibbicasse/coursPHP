<?php 
require_once "../inc/functions.php";
// jevardump($_POST);

if (!empty($_POST)) {
  echo "<p><strong>Prenom : </strong>" .$_POST["prenom"]. "</p>";
  echo "<p><strong>Nom : </strong>". $_POST["nom"]. "</p>";
  echo "<p><strong>Adresse : </strong>". $_POST["adresse"]. "</p>";
  echo "<p><strong>Code postal : </strong>". $_POST["code_postal"]. "</p>";
  echo "<p><strong>Ville : </strong>". $_POST["ville"]. "</p>";

//on va écrire le contenu de la superglobale dans un fichier texte en l"absence de base de donnée


$fichier = fopen("formulaire.txt", "a"); //fopen() en mode "a" permet de créer un fichier s"il n"existe pas encore sinon cela permet de l"ouvrir

$donneeformulaire = $_POST["prenom"]. " " .$_POST["nom"]. 
" // email : ".$_POST["email"]. 
"adresse : ".$_POST["adresse"]. " " .$_POST["code_postal"]. " " .$_POST["ville"]. "\n"; //\n pour faire des saut de ligne dans le .txt

fwrite($fichier, $donneeformulaire);
} /* fin de empty */
?>