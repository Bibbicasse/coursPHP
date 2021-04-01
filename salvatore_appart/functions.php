<?php
/* ***********************************************/
/*             Mes fonctions Débug               */
/* ***********************************************/
function jevardump($maVariable) {
    echo "<br> <small class=\"bg-warning text-white\">... var_dump </small><pre class=\"alert alert-warning w-75\">";
        var_dump($maVariable);//une variable à laquelle on appelle la fonction var_dump
    echo "</pre>";
}
//création d'une fonction pour "print_r" une variable (très utile pour un tableau)
function jePrintR($maVariable) {
    echo "<br> <small class=\"bg-danger text-white\">... print_r </small><pre class=\"alert alert-danger w-75\">";
        var_dump($maVariable);//une variable à laquelle on appelle la fonction var_dump
    echo "</pre>";
}

function executeRequete($requete, $parametres = array ()) { //utile pour toutes les requêtes du site
    foreach ($parametres as $indice => $valeur) {//foreach
               
        $parametres[$indice] = htmlspecialchars($valeur); //on evite les injections SQL
        global $pdoWebforce; //"global" nous permet d'accéder à la variable $pdoSITE dans l'espace global du fichier init.php

        $resultat = $pdoWebforce->prepare($requete); //puis on prépare la requête

        $succes = $resultat->execute($parametres); //puis on l'exécute

        if ($succes === false) {
            return false; // si la requête  n'a pas marché je renvoie false
        } else {
            return $resultat;
        }// fin if else 
    }
}// fermeture fonction executeRequete

?>