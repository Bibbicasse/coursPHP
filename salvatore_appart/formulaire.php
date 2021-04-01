<?php
require_once 'inc/init.php'; //fichier d'initialisation

    /* ***********************************************/
    /*           1 - CONDITIONS FORMULAIRE            /
    /* ***********************************************/ 
    
    if(!empty($_POST)) {

        if (!isset($_POST['title']) || strlen($_POST['title']) < 4 || strlen($_POST['title']) > 100) {
            $contenu .='<div class="alert alert-danger">Le titre doit contenir moins de 100 caractères.</div>'; // affiche ce message si condition n'est pas respecté.
        } //fin isset title

        if (!isset($_POST['description']) || strlen($_POST['description']) > 500) {
            $contenu .='<div class="alert alert-danger">Le titre doit contenir moins de 100 caractères.</div>'; // affiche ce message si condition n'est pas respecté.
        } //fin isset description

        if (!isset($_POST['postal_code']) || !preg_match('#^[0-9]{5}$#', $_POST['postal_code']) ) {
            $contenu .='<div class="alert alert-danger">le code postal est vide ou possède une erreur</div>';
        }// Est ce que le code postal correspond à l'expression régulière précisée : la "regex" régular expression

        if (!isset($_POST['type']) || ($_POST['type']) !="location" && ($_POST['type']) !="vente") { 
            $contenu .='<div class="alert alert-danger">>le type de votre annonce n\'est pas validé</div>'; // affiche ce message si condition n'est pas respecté.
        }//fin isset civilité

        // if (!isset($_POST['city']) || strlen($_POST['city']) < 2 || strlen($_POST['city']) > 50) { //caractère entre 2 et 50 caractère
        //     $contenu .='<div class="alert alert-danger">Verifiez la ville</div>'; // affiche ce message si condition n'est pas respecté.
        //}//fin isset ville

        if(empty($contenu)) {//si la variable est vide c'est qu'il n'y a pas d'erreurs sur le form
            $advert = executeRequete("SELECT * FROM advert",
                array(':title' => $_POST['title']));
                if ($advert->rowCount() > 0) { // si la requête retourne des lignes c'est que le pseudo existe déjà
                    $contenu .= '<div class="alert alert-danger">le titre est indisponible</div>';
                 }  else {
                    $succes = executeRequete("INSERT INTO advert (id,title, description, postal_code, type, price,) VALUES (:id,:title, :description, :postal_code, :type, :price)", 
                    array(
                        ':title' => $_POST['title'],
                        ':description' => $_POST['description'],
                        ':postal_code' => $_POST['postal_code'],
                        // ':city' => $_POST['city'],
                        ':type' => $_POST['type'],
                        ':price' => $_POST['price'],
                        ':id' => $_GET['id'],
                        
                        // ':reservation_message' => $_POST['reservation_message'],            
                    ) //fin de array
                    ); //fin de INSERT INTO

                    if ($succes) {
                        $contenu .= '<div class="alert alert-success">Votre réservation à bien été enregistré</div>'; 
                    } else {
                        $contenu .= '<div class="alert alert-danger">Erreur lors de l\'enregistrement !</div>';
                    }//fin du if if if ($succes)
                }//fin executeRequete else    
            }// fin  if(empty($contenu
    }// if(!empty($_POST))

?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>WEBFOCE 3 - PHP EVALUATION </title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <?php 
	echo $contenu;
	?> 
  <body>
  <?php 
        require 'inc/nav.inc.php';
    ?>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container mx-auto m-4 p-4"> 
    
        <h1 class="text-center">WEBFORCE 3 - PHP EVALUATION</h1>
        <h2 class="text-center">Ajout d'une annonce</h2>

        <form action="" method="POST" class="p-4 mx-auto row border border-primary border-3 rounded-3">

            <div class="form-group mt-2 col-sm-12">
                <label for="title">Titre de votre annonce</label>
                <input type="text" name="title" id="title" value="<?php echo $_POST['title'] ?? ''; ?>" class="form-control border border-primary border-2 rounded-3"> 
            </div>

            <div class="form-group mt-2 col-sm-6">
                <label for="description">Décrivez votre annonce</label>
                <textarea name="description" id="description" class="form-control border border-primary border-2 rounded-3"><?php echo $_POST['description'] ?? ''; ?></textarea>
            </div>
            <div class="form-group mt-2 col-sm-2">
                <label for="postal_code">Votre code postal</label>
                <input type="text" name="postal_code" id="postal_code" value="<?php echo $_POST['postal_code'] ?? ''; ?>" class="form-control border border-primary border-2 rounded-3" placeholder="(ex: 75016)">
            </div>
            <br>
            <div class="form-group col-sm-4 mt-2 border border-primary border-2 rounded-3" style="width:15%; margin-left:1%;">
                <label for="type">Type d'annonce *</label>
                <br>
                <input type="radio" name="type" value="location" checked> Location
                <input type="radio" name="type" value="vente"<?php if (isset($_POST['type']) && $_POST['type'] =='vente') echo 'checked';?>> Vente            
            </div>

            <div class="form-group mt-2 col-sm-12" style="width:15%; margin-left:1%;">
                <label for="price">Prix souhaité</label>
                <input type="text" name="price" id="price" value="<?php echo $_POST['price'] ?? ''; ?>" class="form-control border border-primary border-2 rounded-3" placeholder="Exprimé en €">
            </div>
            <div class="form-group mt-2 text-center">
					<input type="submit" value="Envoyer" class="btn btn-sm btn-primary border-2 rounded-3">
                    <input type="reset" value="Reset">
            </div>
        </form>
    </main>


         <!-- **********************************************-->
         <!--               BOOSTRAP 5 SCRIPT               -->
         <!-- **********************************************-->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>