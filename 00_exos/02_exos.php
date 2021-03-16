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

    <title>Cours PHP -  Exos Tableaux</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <?php 
        require '../inc/nav.inc.php';
    ?>
  

    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - Exos Tableau</h1>
        <!-- <p class="lead">PHP signifie aujourd'hui PHP Hypertext Preprcessor.</p> -->
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">
        <div class="row">
            <div class="col-sm-12">
                <?php 
                    $tableau1 = array('Dalio', 'Gabin','Arletty', 'Fermand1', 'Pauline Carton', 2020);
                    // echo $tableau1 ; erreur de type "array to string conversion" on ne peux pas afficher directement un tableau

                    echo "<pre>";
                        var_dump($tableau1); //var_dump affiche le contenu du tableau et les types de données et les valeurs.
                    echo "</pre>";

                    echo "<pre>";
                        print_r($tableau1); //print_r affiche sans les types
                    echo "</pre>";

                    //autre façon de déclarer un array

                    $tableau2 = ['France', 'Espagne', 'Italie', 'Portugal'];

                    $tableau2[] = 'Roumanie';
                    echo "<pre>";
                        var_dump($tableau2);
                    echo "</pre>";

                    echo "<pre>";
                        print_r($tableau2);
                    echo "</pre>";

                    jevardump($tableau1);
                    jePrintR($tableau1);
                    

                    // /mini exo avec une boucle foreach parcourez les deux tableaux de cette page et affichez-les dans deux ul
                    echo "<ul class=\"w-50 bg-warning\">";
                    //On parcourt le tableau $tableau1 par ses valeurs, la variable $acteur prend les valeurs du tableau successivement à chaque tour de boucle, le mot clef "as" est obligatoire
                    foreach ($tableau1 as $acteur) {
                        // echo "<li>";
                        // echo $acteur;
                        // echo "</li>";
                        echo "<li> $acteur </li>";
                    }
                    echo "</ul>";

                    echo "<ul class=\"w-50 bg-danger\">";
                    //On parcourt le tableau $tableau1 par ses valeurs, la variable $acteur prend les valeurs du tableau successivement à chaque tour de boucle, le mot clef "as" est obligatoire
                    foreach ($tableau2 as $pays) {
                        // echo "<li>";
                        // echo $pays;
                        // echo "</li>";
                        echo "<li class=\"text-white\"> $pays </li>";
                    }
                    echo "</ul>";

                    echo "<ul>";
                    foreach ($tableau1 as $indice => $acteur) {
                        echo "<li> pour $indice, la valeur est $acteur </li>";
                    }
                    echo "</ul>";

                    //mini exo 
                    //1 - déclarez un tableau assocatif $contacts avec les indices suivant: prenom, nom email et téléphone et vous y mettez les valeurs correspondant à un seul contact

                    $contacts = array(
                        'prenom'=> 'Victor', 
                        'nom' => 'Hugo',
                        'Email' =>'victor@hugo.fr',
                        'Numéro tél' => '01 56 89 74 52',
                    ); 

                    // $contacts = [
                    //     'prenom'=> 'Victor', 
                    //     'nom' => 'Hugo',
                    //     'Email' =>'victor@hugo.fr',
                    //     'Numéro té l' => '01 56 89 74 52',
                    // ]; 

                    // jevardump($contacts)


                    
                    //2 - puis avec une foreach vous affichez les valeurs
                    
                    echo '<ul>';
                        foreach ($contacts as $infoscontact) {
                            echo "<li> $infoscontact </li>";
                        }
                    echo '</ul>';

                    //3- Faites une boucle qui récupère les indices
                    
                    echo '<ul>';
                        foreach ($contacts as $indice => $infoscontact) {
                            echo "<li>Pour $indice la valeur est : $infoscontact </li>";
                        }
                    echo '</ul>';

                    // 3bis - Puyis dans une autre boucle vous affichez les valeurs dans des p sauf le prénom qui dois être dans un h3 
                    
                    foreach ($contacts as $indice => $infoscontact) {
                        if ($indice == 'prenom') {
                            echo "<h3> $infoscontact </h3>";
                        } else {
                            echo "<p>$indice : $infoscontact </p>";
                        }
                    }
                    //1 - Exo faire un tableau $tailles avec des tailles de vêtements du small au xl et les afficher avec une boucle foreach dans une ul
                    //2 - puis les afficher dans un select avec une boucle foreach

                   
                    $taille = array(
                        's'=> 'petit', 
                        'm' => 'medium',
                        'l' =>'large',
                        'xl' => 'extra large',
                    );
                  
                    echo "<ul>";
                        foreach ($taille as $indice => $type) {
                            echo "<li>";
                                echo $type;
                            echo "</li>";
                    }
                    echo "</ul>";


                    //Tableau standard numéroté automatiquement
                    $tailles = ['small', 'medium', 'large', 'xlarge'];

                    // jevardump($tailles);

                    echo "<ul>";
                        foreach ($tailles as $indice => $size) {
                            echo "<li> $indice pour $size </li>"; 
                        }
                    echo "</ul>";

                    //tableau associative avec indice personnalisé
                    $taille2 = [
                        "s" => "s-small",
                        "m" => "m-medium",
                        "l" => "l-large",
                        "xl" => "xl-xlarge",
                    ];

                    // jevardump($taille2);
                    // echo "<ul>";
                    // foreach ($tailles2 as $indice => $size) {
                    //     echo "<li> $indice pour $size </li>"; 
                    // }
                    // echo "</ul>";

                    echo " <label for=\"taille\">Taille</label>
                            <select class\"form-control w-25 mb-4\">";

                    foreach ($taille2 as $indice => $size) {
                        echo "<option value=\"$indice\">$size</option>"; 
                    }
                    echo "</select>";
                    
                ?> 
            
       
            </div><!-- fin col -->     
        </div><!-- fin row -->
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