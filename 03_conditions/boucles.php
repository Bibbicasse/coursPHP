<?php 
require_once '../inc/functions.php';

//Des variables pour tester plus bas
$chaine = "Longtemps je me suis couché ... dans le temps";
$decimal = 18.74;
$entier = 500;

?>  

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP -  Boucles</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <?php 
        require '../inc/nav.inc.php';
    ?>
  

    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - Boucles</h1>
        <p class="lead">Les boucles permettent de répéter des opérations élémentaires un grand nombre de fois sans avoir à réécrire le même code.</p>
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            <h2>La boucle while</h2>
                <p>La boucle while permet d'affiner le comportement d'une boucle en réalisant une action de manière répétitive tant qu'une condition est vérifiée ou qu'une expression quelconque est évaluée à TRUE et donc de l'arrêter quand elle n'est plus vérifiée, évaluée à FALSE.</p>
            </div>

                <?php 
                    $n = 1;
                    while ($n%7 != 0) { //Le script s'arrête une fois un multiple de 7 trouvé parmis les nombre au hasard
                        $n = rand(1,100);//rand() fait un tirage de nombre aléatoires compris entre 1 et 100 rand() pour random
                        echo $n. "&nbsp; - ";// non breaking space espace insécable
                    }
                ?> 

            <div class="col-sm-12 col-md-6">
                <h2>La boucle do... while</h2>
                <p>Avec l'instruction do ... while, la condition n'est évaluée qu'après une première exécution des instructions du bloc compris entre do et while.</p>
                <?php

                    $r2d2 = 1;//initialisation de la variable 7
                    var_dump($r2d2);

                    do {
                       $r2d2 = rand (1,100); //
                        echo $r2d2 . "&nbsp; *";
                    }
                    while ($r2d2%7 != 0);// la condition n'est testé qu'après avoir trouver un multiple de 7
                ?> 
            </div><!-- fin col -->
        </div><!-- fin row -->
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>La boucle for</h2>
                <p>La boucle <code>FOR</code> est plus concise, plus ramassé que la boucle <code>WHILE</code></p>
                <?php 
                //on va afficher les puissance de 2 jusqu'à
                for ($i=0; $i<=8; $i++) {//création d'un tableau avec 9 élements
                    $tab[$i] = pow(2,$i);//à l'aide d'une boucle et de la fonction pow()
                    // $tab[$i] = $i;
                    // var_dump($tab);
                } 
                ?> 
            </div>
            <div class="col-sm-12 col-md-6">
                <h2>La boucle forEach </h2>
                <p>La boucle <code>forEach</code> (pour chaque) est efficace pour lister les élements d'un tableau.</p>
                
                <?php
                $val = "une valeur de notre tableau";
                // echo $var . "<br>";
                echo "Les puissance de 2 sont :";
                foreach ($tab as $val) {
                    echo $val. " - ";
                }
                ?>
                <p>Lecteur des indices et des valeurs d'un tableau</p>
                <?php 
                    //création d'un autre tableau

                for ($i=0; $i<=5; $i++) {
                    $tab[$i] = pow(2,$i);
                    //lecteur des indiece et des valeurs du tableau
                } 
                    foreach ($tab as $ind=>$val) {
                        echo "2 puissance $ind vaut $val <br>";
                    }
                    echo "le dernier indice de mon tableau est $ind et la dernière valeur est $val.";

                
                ?> 
            </div>
            <div class="col-sm-12 col-md-6">
                <h2></h2>
            </div>
        </div>




    </main>

    <?php 
        require '../inc/footer.inc.php';
    ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>