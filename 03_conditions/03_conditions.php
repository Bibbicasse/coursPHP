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

    <title>Cours PHP - les instruction conditionnelles</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

  <?php 
        require '../inc/nav.inc.php';
    ?>
  
  <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - Exos Pratiques</h1>
        <p class="lead">On retrouve dans PHP la plupart des instructions de contrôle des scripts. Indispensables à la gestion du déroulement d'un algorithme quelconque, ces instructions sont présentes dans tous les langages. PHP utilise une syntaxe très proche de celle du langage C. Ceux qui ont déjà pratiqué un langage tel que le C ou plus simplement JavaScript seront en pays de connaissance.</p>
    </div>
     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <h2>if</h2>
                <p>L'instruction <code>if</code> est la plus simple et la plus utilisée des instructions conditionnelles. Présente dans tous les langages de programmation, elle est essentielle en ce qu'elle permet d'orienter l'exécution du script en fonction de la valeur booléenne d'une expression</p>

                <?php
                $a = 100;
                $b = 55;
                $c =25;

                if ($a > $b && $b > $c) {
                  echo "<p class=\"alert alert-success w-75 mx-auto text-center\"> les 2 condition sont ok </p>";

                };
                
                ?> 
            </div><!-- fin col -->
            <div class="col-sm-12 col-md-4">
            <h2>if ... Else</h2>
            <p>L'instruction <code>if ...else</code> permet de traiter le cas où l'expression conditionnelle est TRUE et en même temps d'écrire un traitement de rechange quand elle est évalué à FALSE, ce qui ne permet pas une instruction if seule. L'instruction ou le bloc qui suite <code>else</code> est alors le seul à être exécuté. L'exécution continue ensuite normalement après le bloc <code>else</code>.</p>

            <?php 
              if ($a > $b) {
                echo "$a est supérieur à $b";
              } else {
                echo "$b est supérieur à $a";
              }

              echo "</p>";
            ?>
            <p>Le bloc qui suit les instructions if ou else peut contenir toute sorte d'instructions, y compris d'autres instruction <code>if... else</code>. Nous obtenons dans ce cas une syntaxe plus complexe, de la forme : VOIR</p>
            
            
            <?php 
              echo "<p class=\"alert alert-success w-75 mx-auto text-center\">";
              $e = 10;
              $f = 5;
              $g = 2;
      
              if ($e == 9 || $f > $g) {
                echo "Au moins ue des deux conditions est remplie";
              } else {
                echo "les deux conditions sont fausse";
              }
              echo "</p>"
              ?>
              <p>Le bloc qui suit les instructions if ou else peut contenir toute sortes d'instruction, y compris d'autre instruction <code>if else</code></p>

              <p>Il existe une autre mani-re d'écrire un if... else ; la conditon ternaire</p>
              <p>Dans le ternaire le <code>?</code> remplace le <code>if</code> et le <code>:</code> remplace le <code>else</code>.</p>

              <?php
                $h = 10;
                // if ($h == 10) {
                //   echo"$h est égale à 10";
                // } else {
                //   echo "$h est différent de 10";
                // }
                //la même en ternaire

                echo($h == 10) ? "$h est égal à 10" : "$h est différent de 10";//si $h est égal à 10, on affiche la première expression sinon la seconde.

              ?>

              
            </div><!-- fin col -->

            <div class="col-sm-12 col-md-4">
              <h2>if else if...else</h2>
              <p>Nous obtenons dans ce cas une syntaxe plus complexe, de la forme suivante :</p>
              <?php 
                $d = 8;
                echo "<p class=\"alert alert-success w-75 mx-auto text-center\">";
                if ( $d == 8 ) {
                  echo "Réponse 1 : \$d est égale à 8";
                } else if ( $d != 10 ) {
                  echo "Réponse 2 : \$d est différent de 10";
                } else {
                  echo "Réponse 3 : les deux conditions sont fausses";
                }
                echo "</p>";
              ?>
            </div><!-- fin col -->
        
        </div><!-- fin row -->
        <div class="row">
          <div class="col-sm-12 col-md-6 border border-success">
                <h2>Switch ... case</h2>
                <p>Switch permet de comparer à une multitude de valeur comme l'instruction if ... else if ... else</p>

                <?php
                  $dept = 75;
                    switch ($dept) {
                      case 75:
                        echo "Paris";
                        break;

                      case 41:
                        echo "Loir-et-Cher";
                        break;

                      case 92;
                        echo  "Hauts-de-Seine";
                        break;

                      default:
                        echo "Département inconnu !";
                        break;
                    }
                  echo ''
                ?> 
          
          </div>
          <div class="col-sm-12 col-md-6 border border-success">
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