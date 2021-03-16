<?php 
function minPap() {
    echo "<p class=\"leed\">Minute papillon !</p>";
} 

function quelJour() {
    echo "<p class=\"border border-primary p-2 w-50\"> We are " .date('l j F Y'). "</p>";
}

function dateDuJourFr() {
    echo "<p>Aujourd'hui, nous somme le ";
    setlocale(LC_ALL, 'fr_FR');
    echo strftime("%A %e %B %Y");
    echo ".</p>";
}

function dateDuJourFr2() {
    setlocale(LC_ALL, 'fr_FR');
    echo "<p class=\"alert alert-success w-50 mx-auto text-center\"> Aujourd'hui, nous somme le ".strftime("%A %e %B %Y").".</p>";
}

//création d'une fonction pour "var_dump" une variable (très utile pour un tableau)

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
?> 