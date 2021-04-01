<?php 
//require à placer sur toutes les pages.
require_once 'inc/init.php';

// jeprint_r($_SESSION);
if(!empty($_POST)) { //si forme n'est pas vide
	
	// jeprint_r($_POST);

	if (!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) { //caractère entre 4 et 20 caractère
		$contenu .='<div class="alert alert-danger">Le pseudo doit contenir entre 4 et 20 caractères.</div>'; // affiche ce message si condition n'est pas respecté.
	} //fin isset pseudo

	if (!isset($_POST['mdp']) || strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) { //caractère entre 4 et 20 caractère
		$contenu .='<div class="alert alert-danger">Le mot de passe doit contenir entre 4 et 20 caractères.</div>'; // affiche ce message si condition n'est pas respecté.
	}//fin isset mot de passe

}//fin empty POST
?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Mes styles -->
    <link rel="stylesheet" href="css/style.css" >


    <title>La Boutique -  Inscription </title>
  </head>

  <body>
     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->
     <main class="container mx-auto m-4 p-4">
	<?php 
	echo $contenu;
	?> 
    <div class="row">
      <div class="col-sm-12 col-md-10 mx-auto border border-success border-5 rounded-3 bg-light">
          <h1 class="text-center">La Boutique - Se connecter <br>
          <small class="text-center"><em>Espace Adminitrateur</em></small></h1>
          
			<form method="POST" action="" class="p-4 mx-auto row">
				<div class="form-group mt-2 col-sm-6">
					<label for="pseudo">Ton Pseudo *</label>
					<input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>" class="form-control border border-success border-2 rounded-3"> 
				</div>
				<div class="form-group mt-2 col-sm-6">
					<label for="mdp">Mot de passe *</label>
					<input type="password" name="mdp" id="mdp" value="" class="form-control border border-success border-2 rounded-3 ">
					<small class=""><em> Votre mot de passe doit contenir entre 4 et 20 caractères </em></small>
				</div>

				<div class="form-group">
					<input type="submit" value="Se connecter" class="btn btn-sm btn-success">
					<a href="01_inscription.php" class="btn btn-sm btn-primary">S'inscrire</a>
				</div>
    		</form>
		</div>
    </main>

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