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

	if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['mdp']) > 20) { //caractère entre 4 et 20 caractère
		$contenu .='<div class="alert alert-danger">Le nom doit contenir entre 2 et 20 caractères.</div>'; // affiche ce message si condition n'est pas respecté.
	}//fin isset nom

	if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['mdp']) > 20) { //caractère entre 4 et 20 caractère
		$contenu .='<div class="alert alert-danger">Le prénom doit contenir entre 2 et 20 caractères.</div>'; // affiche ce message si condition n'est pas respecté.
	}//fin isset prénom

	if (!isset($_POST['email']) || strlen($_POST['email']) > 50 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
        $contenu .='<div class="alert alert-danger">Votre email n\'est pas conforme.</div>';//filtre de variable, dans ce filtre on passe la fonction prédéfinie FILTER_VALIDATE_EMAIL (c'est une constante  elle est écrite en MAJUSCULE) cette fonction vérifie que le format est bien de format email
    }// fin if !isset($_POST['email']

	if (!isset($_POST['civilite']) || ($_POST['civilite']) !="m" && ($_POST['civilite']) !="f") { 
		$contenu .='<div class="alert alert-danger">>la civilité n\'est pas validé</div>'; // affiche ce message si condition n'est pas respecté.
	}//fin isset civilité

	if (!isset($_POST['adresse']) || strlen($_POST['adresse']) < 2 || strlen($_POST['adresse']) > 60) { //caractère entre 2 et 20 caractère
		$contenu .='<div class="alert alert-danger">Verifiez l\'adresse</div>'; // affiche ce message si condition n'est pas respecté.
	}//fin isset adresse

	if (!isset($_POST['code_postal']) || !preg_match('#^[0-9]{5}$#', $_POST['code_postal']) ) {
        $contenu .='<div class="alert alert-danger">le code postal n\'est pas valable.</div>';
    }// Est ce que le code postal correspond à l'expression régulière précisée : la "regex" régular expression

	if (!isset($_POST['ville']) || strlen($_POST['ville']) < 2 || strlen($_POST['ville']) > 20) { //caractère entre 2 et 20 caractère
		$contenu .='<div class="alert alert-danger">Verifiez la ville</div>'; // affiche ce message si condition n'est pas respecté.
	}//fin isset ville

	if(empty($contenu)) {//si la variable est vide c'est qu'il n'y a pas d'erreurs sur le form
		$membre = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo",
			array(':pseudo' => $_POST['pseudo']));
		if ($membre->rowCount() > 0) { // si la requête retourne des lignes c'est que le pseudo existe déjà
			$contenu .= '<div class="alert alert-danger">le pseudo est indisponible veuillez en choisir un autre</div>';
		} else { // si on inscirt le membre dans la BDD
			$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);// cette fonction prédéfinie permet de hasher (crypté) le mot de passe selon l'algorithme actuel "bcrypt".  Il faudra lors de la connexion comparer le hash de la BDD avec celui du mdp de l'intérieur
			
			$succes = executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, adresse, code_postal, ville,  statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :adresse, :code_postal, :ville,  0)", 
                array(
                    ':pseudo' => $_POST['pseudo'],
                    ':mdp' => $mdp, //on prend le mot de passe hashé
                    ':nom' => $_POST['nom'],
                    ':prenom' => $_POST['prenom'],
                    ':email' => $_POST['email'],
                    ':civilite' => $_POST['civilite'],
                    ':adresse' => $_POST['adresse'],
                    ':code_postal' => $_POST['code_postal'],
                    ':ville' => $_POST['ville'],
            ));
			if ($succes) {
                $contenu .= '<div class="alert alert-success">Vous êtes inscrit cliquez ici pour vous <a href="connexion.php">connecter</a></div>'; 
            } else {
                $contenu .= '<div class="alert alert-danger">Erreur lors de l`\enregistrement !</div>';
            }//fin du if if if ($succes)
		}//fin du if else vérification du membre ou inscription

	}//fin empty contenu
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
            <div class="col-12 col-md-6 col-lg-8 mx-auto border border-success">
                <h1 class="text-center">La Boutique - Inscrivez-vous
				</h1>

			<form method="POST" action="" class="p-4  mx-auto">
				<div class="form-group mt-2">
					<label for="pseudo">Choisissez un pseudo *</label>
					<input type="text" name="pseudo" id="pseudo" value="<?php echo $_POST['pseudo'] ?? ''; ?>" class="form-control border border-success"> 
				</div>
				<div class="form-group mt-2">
					<label for="mdp">Mot de passe *</label>
					<input type="password" name="mdp" id="mdp" value="" class="form-control border border-success">
					<small class=""><em> Votre mot de passe doit contenir entre 4 et 20 caractères </em></small>
				</div>
				<div class="form-group mt-2">
					<label for="nom">Nom *</label>
					<input type="text" name="nom" id="nom" value="<?php echo $_POST['nom'] ?? ''; ?>" class="form-control border border-success">
				</div>
				<div class="form-group mt-2">
					<label for="prenom">Prénom *</label>
					<input type="text" name="prenom" id="prenom" value="<?php echo $_POST['prenom'] ?? ''; ?>" class="form-control border border-success"> 
				</div>
				<div class="form-group mt-2">
					<label for="email">Email *</label>
					<input type="email" name="email" id="email" value="<?php echo $_POST['email'] ?? ''; ?>" class="form-control border border-success">
					<small class=""><em>Dois comporter une adresse conforme (exemple@email.fr) </em></small>
				</div>
				<div class="form-group mt-2">
					<label for="civilite">Civilité *</label>
					<br>
					<input type="radio" name="civilite" value="m" checked> Homme
					<input type="radio" name="civilite" value="f"<?php if (isset($_POST['civilite']) && $_POST['civilite'] =='f') echo 'checked';?>> Femme            
				</div>
				<div class="form-group mt-2">
					<label for="adresse">Adresse</label>
					<textarea name="adresse" id="adresse" class="form-control border border-success"><?php echo $_POST['adresse'] ?? ''; ?></textarea>
				</div>
				<div class="form-group mt-2">
					<label for="code_postal">Code postal</label>
					<input type="text" name="code_postal" id="code_postal" value="<?php echo $_POST['code_postal'] ?? ''; ?>" class="form-control border border-success">
					<small class=""><em>Format français (ex: 75016)</em></small>
				</div>
				<div class="form-group mt-2">        
					<label for="ville">Ville</label>
					<input type="text" name="ville" id="ville" value="<?php echo $_POST['ville'] ?? ''; ?>" class="form-control border border-success"> 
				</div>
				<div class="form-group mt-2">
					<input type="submit" value="Inscrivez-vous" class="btn btn-sm btn-success">
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