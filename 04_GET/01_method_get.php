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

    <title>Cours PHP -  Method GET</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

  <?php 
        require '../inc/nav.inc.php';
    ?>
  

    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - Method GET</h1>
        <p class="lead"><code>$_GET[]</code> représente les données qui transitent par l'URL</p>
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <h2>1_GET[]</h2>
            <p>Il s'agit d'une superglobale et comme toutes superglobal, c'est un tableau.</p>
            <p>Superglobale signifie que cette variable est disponible partout dans le script, y compris au sein de fonctions.</p>
            <p>les informations transitent dans l'url selon la syntaxe suivante <code>mapage.php?indice1=valeur1&indiceN=valeurN</code></p>
            et enfin quand on récupère les données, <code>1_GET[] </code> se remplit selon le schéma suivant : <pre>1_GET = array('indice1' => 'valeur1', 'indiceN' => 'valeurN')</pre></p>
        </div> <!-- fin col -->
        <div class="col-sm-12 col-md-6 ">
        <!-- à partir du ? on envoie des informations via l'url à la page 02_method_get.php et elles sont receptionnée par la superglobale -->
            <a href="02_method_get.php?article=jean&couleur=bleu&prix=55">Jean bleu</a> -
            <a href="02_method_get.php?article=robe&couleur=rouge&prix=75">Robe rouge</a> -
            <a href="02_method_get.php?article=pull&couleur=blanc&prix=45">Pull Blanc</a> -
        </div>
    </div> <!-- fin row -->
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