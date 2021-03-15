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

    <title>Cours PHP -  Exos Pratiques</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <?php 
        require '../inc/nav.inc.php';
    ?>
  

    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - Exos Pratiques</h1>
        <!-- <p class="lead">PHP signifie aujourd'hui PHP Hypertext Preprcessor.</p> -->
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">
       <h2>Coucou !</h2>
       <?php 
       minPap();

       echo "<hr>";

       quelJour();

       dateDuJourFr();

       dateDuJourFr2();

    //cette fonction permet d'analyser dans le navigateur le contenu et le type d'une variables si c'est une string
        var_dump($decimal);

        echo "<hr>";

        print_r("<p>Affiche du contenu avec la fonction print_r</p>");

        //gettype()

        echo gettype($chaine);

        //mini exo : écrire la phrase suivante la devise de la république est liberté, égalité, fraternité (mettre les termes en variables)
        $lib = "liberté";
        $egal = "égalité";
        $frat = "fraternité";
        echo "<p>la devise de la république est \"$lib, $egal, $frat\".</p>";

        //mini exo if else si le prix est supérieur à 100 euros la remise est de 10% sinon la remise est 5% et donnez le montant du prix net
        // $prix = 55;
        // $discount1 = 0.05;
        // $discount2 = 0.1;
        // $reduc5 = 5/100;
        // $reduc10 = 10/100;

        // $_5pourCent = $prix * $discount1;
        // $_10pourCent = $prix * $discount2;

        // if ($prix > 100) {
        //   echo "Vous aurez une remise de $reduc10";
        // } else {
        //   echo "Vous avez une remise de $_5pourCent";
        // };

        $prix = 55;
        $remise10 = $prix * 0.9;
        $remise5 = $prix * 0.95;

        if ($prix > 100) {
          echo "Pour un achat de $prix € vous avez une remise de 10% : Prix net $remise10";
        } else {
          echo "Pour un achat de $prix € vous avez une remise de 10% : Prix net $remise5";
        }
        
        echo "<hr>";
          //exo 
          //Si vous acheter un PC à plus de 1000€, la remise est de 15%
          //Pour un PC de 1000€ et moins la remise est de 10%
          //si c'est un livre la remise est de 5%
          //pour tous les autres articles, la remise est de 2%
        //   $prixPC = 1000;
        //   $prixLivre = 19.5;
        //   $prixAutre = 45;
          
        //   $reduc15 = 15/100;
        //   $reduc10 = 10/100;
        //   $reducLivre = 5/100;
        //   $reducAutre = 2/100;

        //   $achatPCSup = $prix * $reduc15;
        //   $achatPCinf = $prix * $reduc10;
        //   $achatLivre = $prixLivre * $reducLivre;
        //   $achatAutre = $prixAutre * $reducAutre;



        //   if ($prixPC > 1000) {
        //     echo "Vous avez droit à 15% à votre achat, cela vous fait $achatPCSup";
        //   } else { echo "Vous avez droit à 10% à votre achat, cela vous fait $achatPCInf";

        // } elseif {
        //   "Vous avez droit à 5% à votre achat, cela vous fait $achatLivre";
        // } else {
        //   "vous avez droit à 2% à votre achat, cela vous fait $achatAutre";
        // }

        $cat = "PC";
        $prix = 500;
    if ($cat == "PC") {
        if ($prix >= 1000) {
          echo "Prix du produit $prix € : la remise est de 15% : prix net de votre commande : " .$prix*0.85. " €" ;
        } else {
          echo "Prix du produit $prix € : la remise est de 10% : prix net de votre commande : " .$prix*0.90. " €";
        } 
      }
      else if ($cat == "Livre") {
          echo "Prix du produit $prix € : livre remise 5% : prix net de votre commande : " .$prix*0.95. " €";
        } else {
          echo "Prix du produit $prix € : remise 2 % : prix net de votre commande : " .$prix*0.98. " €";
        }
       ?>


       <?php 
       //boucle WHILE
       //les boucles sont destinées à répéter du code de façon automatique

       $i = 0;
       while ($i<25) {
         //tant que c'est inférieur à 25 on incrémente $i
         echo $i. '  ';
        $i++;
       }
       echo '<br>';

       //mini exo 5
       //dans une boucle faire les options d'un élément SELECT en démarrant en démarrant à 1920 et en s'arrêtant 2021

      $annee = 1920;
      echo "<label for=\"annee\">Année</label> <select name=\"annee\">";
          while ($annee <= 2021) {
        echo "<option value=\"\">". $annee. "</option>";
          $annee++;
        }
      echo "</select>";

      $annee2 = 2021;
      echo "<label for=\"annee2\">Année</label> <select name=\"annee\">";
          while ($annee2 >= 1920) {
        echo "<option value=\"\">". $annee2. "</option>";
          $annee2--;
        }
      echo "</select>";
      

      echo "<hr>";

      //do WHILE

      $nesquik = 0; //valeur de la boucle

      do {
        echo "<p> nesquik avec du lait c'est MIAM </p>";
        $nesquik++;
      }

      while ($nesquik > 10);
      ?> 

      <?php 
        //mini exo 7
        //si la variable $langue contient vous dites hola, si c'est anglais vous dites hello, si c'est francais bonjour

        $langue = 'francais';
          switch ($langue) {
            case "francais":
              echo "Bonjour";
              break;

            case "anglais":
              echo "hello";
              break;

            case "espagnol";
              echo  "hola";
              break;

            default:
              echo "alien ?";
              break;
          }

          //re-écrire ce switch avec if else if ...

          $langue2 = "francais";
            echo "<div>";
              if ($langue2 == 'francais') {
                echo "<p>Bonjour</p>";

              } else if ($langue2 == 'anglais') {
                echo "<p>Hello</p>";

              } else if ($langue2 == 'espagnol') {
                echo "<p>Holà</p>";

              } else { 
                echo "<p>ALIEN ?</p>";
              }
            echo "</div>";

      ?> 

              
      <?php 
        //la boucle FOR
        //Mini exercice
        //Afficher les mois de 1 a 12 à l'aide d'une boucle for
        $mois = 1;
        echo "<label for=\"mois\">Mois</label> <select name=\"mois\">";
            while ($mois <= 12) {
          echo "<option value=\"\">". $mois. "</option>";
            $mois++;
          }
        echo "</select>";

        echo "<hr>";
        
        echo "<select>";
          for ($mois2=1; $mois2<=12; $mois2++) {
         echo "<option>" .$mois2. "</option>";
        }
        echo "</select>";

        //mini exo
        //faire une boucle for qui affiche 0 à 9 sur la même ligne
        //compléter cette boucle pour mettre les chiffres dans un tableau html
        echo '<br><br>';
        echo "<table class=\"table table-striped w-50 mx-auto bg-success border border-dark\"><tr>";
        for ($z=0; $z<=9; $z++) {
          echo '<td>'.$z.'</td>';
        } 
        echo "</tr></table>";
         
      ?> 
       


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