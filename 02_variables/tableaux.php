<?php 
require_once '../inc/functions.php';
?>  

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP -  Tableaux</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <?php 
        require '../inc/nav.inc.php';
    ?>
    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - Tableaux</h1>
        <p class="lead">Les tableaux représentent un type composé car ils permettent de stocker sous un même nom de variable plusieurs valeurs indépendantes d'un des types de base que vous venez de voir. C'est comme un tiroir divisé en compartiments. Chaque compartiment, que nous nommerons un élément du tableau, est repéré par un indice numérique (le premier ayant par défaut la valeur 0 et non 1). D'où l'expression de tableau indicé.
        </p>
    <hr class="my-4">
        <!-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> -->
        <a class="btn btn-primary btn-lg" href="#" role="button">Voir d'avantage</a>
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <p>Un tableau appelé array en anglais est une variable améliorée dans laquelle on stocke une multitude de valeurs. Ces valeurs peuvent être de n'importe quel type. Elle possèdent un indice dont la numération commence à 0</p>
        <blockquote>
        
        </blockquote>
    <?php 
        $tab[0] = 2004; //La variable $tab est un tableau par le simple fait que son nom est suivi de crochets
        $tab[1] = 3.14;
        $tab[2] = "PHP";
        $tab[35] = $tab[2]." et MySQL";//Les éléments indicés entre 2 et 35 n'existent pas
        $tab[] = "coucou";//il mettra 36 : avantage ajouter un élément à la fin d'in tableau sans connaître la valeur du premier indice disponible.

        echo "Nombre d'élément du tableau".count($tab); //ils ne sont donc pas compté
        echo "<hr><p> Le langage préféré de l'open source est $tab[2] <br> ";
        echo "Utilisez $tab[35]</p>";
        
        // jevardump($tab);
        // jePrintR($tab);
    
    ?> 

      </div>

      <div class="row">
        <div class="col-sm-12">
          <h2>Les tableaux associatifs</h2>
          <p>Dans un tableau associatif, nous pouvons choisir le nom des indices ou des indexes.</p>

          <?php 
            $couleurs = array (
              'b' => 'bleu',
              'bl' => 'blanc',
              'r' => 'rose',
            );

            jevardump($couleurs);
              //Pour afficher une valeur de notre tableau associatif
              echo '<p>La première couleur du tableau est' .$couleurs['b']. '</p>';//Dans des quotes il prend des quotes autour de sont indice
              

              echo "<p> La première couleur du tableau est $couleurs[b] </p>";// Dans des guillemets il y à une exeption, l'indice ne prend pus de quotes... VOIR

              //mini exo compter le nombre d'élément du tableau

              echo '<p>Nombre d\'éléments dans le tableau \$couleur : '.count($couleurs). '</p>';

              echo '<p>Nombre d\'éléments dans le tableau \$couleur : '.sizeof($couleurs). '</p>';

              jePrintR(count($couleurs));
          ?> 
        </div> <!-- fin col -->
        <div class="col-sm-12">
            <h2>Les tableaux multi-dimentionnels</h2>
            <p>Un tableau multi-dimentionnels est un tableau qui contiendra des tableaux</p>

            <?php 
            $tableau_multi = array (
              0 => array (
                'prenom'=> 'Jean',
                'nom' => 'Dujardin',
                'Telephone' => '01 25 26 36 99',
              ), 
              1 => array (
                'prenom'=> 'Alexandra',
                'nom' => 'Lamy',
                'Telephone' => '01 89 26 58 99',
              ),
              2 => array (
                'prenom'=> 'Ava',
                'nom' => 'Gardner',
                'Telephone' => '01 89 26 58 99',
              ),
            );

            jePrintR($tableau_multi);


              //echo jean
              echo $tableau_multi[0]['prenom']; //pour afficher jean on rentre d'abord l'indice 0 puis dans le sous-tableéau on va à l'indice prénom

              //pour parcourir le tableau multi-dimentionnels on peut faire une boucle for car ses indices sont numériques
              echo "<ul>";
              for ($i=0; $i < count($tableau_multi); $i++) {
                echo '<li>'.$tableau_multi[$i]['prenom'].' '.$tableau_multi[$i]['nom']. '</li>';
              }
              echo "<ul>";
            
              //ou une boucle foreach en passant en variable les congtenu de chaque indice du tableau et en ciblant les indices nommés des sous-tableau associatif
              echo "<p>";
              foreach ($tableau_multi as $indice => $acteur) {
                // jeprintR($indice);
                echo "<br>" .$acteur['prenom']." " .$acteur['nom']."<br>";
              } 
              echo "</p>";


             
            ?> 
        </div>
      </div>
            
      
    </div>
   
   
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