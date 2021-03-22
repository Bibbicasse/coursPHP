<?php 
require_once '../inc/functions.php';

//2 vérification de l'url ou si l'internaute visite pour la 1e fois ou si on a déjà une langue dans un cookie 

if (isset($_GET['langue'])) { //Si une langue est passé dans l'URL, l'internaute à cliquer un des liens, on enverra cette langue dans le cookie
  // jevardump($_GET['langue']);
  $langue = $_GET['langue'];
    jevardump($langue);

} elseif (isset($_COOKIE['langue'])) { //sinon si on a recu un cookie "langue" alors la valeur du site sera la valeur du cookie 
    $langue = $_COOKIE['langue'];
    jevardump($langue);
    
  } else { //sinon si l'internaute n'a pas choisi de langue, il arrive pour la première fois, on va attribuer une langue par défaut donc FR
    $langue = "fr";
    jevardump($langue);
}

//3 - envoie du cookie avec l'information sur la langue
  
  $expiration = time() + 365*24*60*60;
  setcookie('langue', $langue, $expiration); //fonction qui fabrique le cookie appelé "langue" avec la valeur de $langue et pour une date d'expiration la valeur $expiration
  
  //il n'existe pas de fonction prédéfinie qui permette de supprimer un cookie, pour rendre un cookie invalide, on utilise setcookie() avec le nom concerné et en mettant une date d'expiration à 0 ou antérieur à aujourd'hui

  //Firefox > Inspecteur > stockage
  //Chrome > Inspecteur > Application > stockage
?>  

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP -  COOKIES</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

  <?php 
        require '../inc/nav.inc.php';
    ?>
    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - COOKIES</h1>
        <p class="lead">La super globale $_COOKIE : un cookie est un petit fichier de 4ko maxi déposé par le serveur web sur le poste de l'internaute et qui contient des informations.</p>
      
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">
    <div class="row">
      <div class="col-sm-12">
        <p>Les cookies sont automatiquement renvoyés au serveur web par le navigateur, lorsque l'internaute navigue dans les pages concernées par les cookies, PHP permet de récupérer très facilement les données contenues dans un cookie. Car les informations sont stocker dans une superglobal <code>$_COOKIE</code></p>
        <p class="alert alert-danger">Un cookie étant sauvegardé sur le poste de l'internaute, il peut être modifié, détourné ou volé !!! On n'y met donc aucune informations sensible : réf bancaire, n°sécuritéSocial, mot de passe, panier d'achat</p>

        <!-- 1 - On envoi la langue choisi par l'URL, la valeur "fr" pour exemple, est récupérée dans la superglobale $_GET -->

        <h2></h2>
        <a href="?langue=fr" class="btn btn-outline-primary">français</a>
        <a href="?langue=es" class="btn btn-outline-warning">Espagnol</a>
        <a href="?langue=it" class="btn btn-outline-success">Italien</a>
        <a href="?langue=ru" class="btn btn-outline-danger">Russe</a>

          <?php 
          
          echo "<h3>Langue du site $langue </h3>";
          echo "<p>". time(). " La date du jour ou le timestamp exprimée en secondes depuis le 1er janvier 1970. </p>";
          ?> 
      </div> <!-- fin col -->

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