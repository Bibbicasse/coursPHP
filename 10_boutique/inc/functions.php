<?php 
 /* ***********************************************/
 /*             1 - FONCTION PRINT_R              */
 /* ***********************************************/
function jeprint_r($maVariable) {
    echo "<br> <small class=\"bg-danger text-white\">... print_r </small><pre class=\"alert alert-danger w-75\">";
        var_dump($maVariable);
    echo "</pre>";
}

    /* ***********************************************/
    /*    2 - FONCTION POUR EXÉCUTER Les prepare()   */
    /* ***********************************************/

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