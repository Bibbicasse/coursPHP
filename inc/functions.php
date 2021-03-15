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
    echo "<p>Aujourd'hui, nous somme le ".strftime("%A %e %B %Y").".</p>";
}
?> 