<?php 
// <!-- php des fonctions -->
require_once '../inc/functions.php'; 

// connexion à la BASE
$pdoENT = new PDO('mysql:host=localhost;dbname=entreprise', 
'root', /* nom utilisateur */ 
'',//mdp
array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //erreur SQL navigateur
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //charset des échange BDD
    )
);
// jePrintR($_GET);
if (isset($_GET['id_employes'] ) ) { 
// jePrintR($_GET);
    $resultat = $pdoENT->prepare("SELECT * FROM employes WHERE id_employes = :id_employes");
    $resultat->execute(array(
        ':id_employes' => $_GET['id_employes']
    ));
    // jePrintR($resultat);
    // jePrintR($resultat->rowCount())
    $fiche = $resultat->fetch(PDO::FETCH_ASSOC);
    // jePrintR($fiche);

    if ($resultat->rowCount() == 0) {
        header('location:02_employes.php');
        exit();
    }
} else {
    header('location:02_employes.php');
    exit();
}

//traitement de mise à jour du formulaire

if (!empty($_POST)) {
    //pour se prémunir des failles nous faisons ceci
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']); 
    $_POST['nom'] = htmlspecialchars($_POST['nom']);
    $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
    $_POST['service'] = htmlspecialchars($_POST['service']);
    $_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']); //a commenter si NOW()
    $_POST['salaire'] = htmlspecialchars($_POST['salaire']);

    $resultat = $pdoENT->prepare("UPDATE employes SET prenom = :prenom, nom = :nom, sexe = :sexe, service = :service, date_embauche = :date_embauche, salaire = :salaire WHERE id_employes = :id_employes");

    $resultat->execute( array(
        ':prenom' => $_POST['prenom'], 
        ':nom' => $_POST['nom'],
        ':sexe' => $_POST['sexe'],
        ':service' => $_POST['service'],
        ':date_embauche' => $_POST['date_embauche'],
        ':salaire' => $_POST['salaire'],
        ':id_employes' => $_GET['id_employes'],
    ));
    header('location:02_employes.php');
    exit();
    }
?>
<!doctype html>
<html lang="fr">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<title>Cours PHP - Fiche Employés</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php 
    require '../inc/nav.inc.php';
?>
<div class="jumbotron">
    <h1 class="display-4">Cours PHP 7 - Employé  <?php echo $fiche['prenom']. " " .$fiche['nom']?> </h1>
    <p class="lead">Fiche personnel de l'employé</p>
</div>

    <!-- **********************************************-->
    <!--                CONTENU PRINCIPAL              -->
    <!-- **********************************************-->

<main class="container bg-white m-4 mx-auto">
    <div class="row">
        <div class="col-sm-6 my-auto">
            <div class="card mb-3" >
                <div class="row no-gutters">
                    <div class="col-sm-3">
                        <img src="../img/homme.png" alt="..." class="img-fluid my-auto" style="text-align: center;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <!-- < ?php $nbr_format = number_format($number, 2, ',',' '?> -->
                            <h5 class="card-title alert alert-success text-center"> <?php echo $fiche['prenom']. " " .$fiche['nom'];?></h5>

                            <p class="card-text "><?php echo "<strong> Service : </strong>" . $fiche['service']. "<br> <strong>Salaire : </strong>" .number_format($fiche['salaire']). "€". "<br><strong> Rentré le : </strong>" .date('d/m/Y', strtotime($fiche['date_embauche']));  ?></p>
                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- fin col -->
    </div>
                                <!-- FORMULAIRE -->
                                
<!-- if (isset($_POST['pseudo']) { echo "..."; } else { echo '';} si il n'y a rien je mets une chaîne vide opérateur de coalescence-->

<div class="col-sm-6 mx-auto">
    <form action="" method="POST" class="border border-success border-5 m-2 px-2 py-2" >
        <div class="mb-3 form-group">
            <!-- <label for="prenom" class="form-label">Prenom</label> -->
            <input type="text" name="prenom" id="prenom" class="form-control form-group border border-success" placeholder="Votre prenom" value="<?php echo $fiche['prenom']; ?>" >
        </div>
        <div class="mb-3 form-group">
            <!-- <label for="nom" class="form-label">Nom</label> -->
            <!-- if (isset($fiche['nom']) {echo "...";} else {echo '';}) s'il n'y a rien je mets une chaîne vide : opérateur de coalescence-->
            <!-- cette opérateur avec $_POST['nom'] et if isset else "résumé" avec l'opérateur de coalescence sera utile si on tulise un seul formulaire pour INSERT et UPDATE -->
            <input type="text" name="nom" id="nom" class="form-control form-group border border-success" placeholder="Votre nom" value="<?php echo $fiche['nom']?? '' ; ?>" >
        </div>
        <div class="mb-3 form-group ">
            <!-- <label for="sexe" class="form-label">Sexe</label> <br> -->

                            <!-- VERSION SELECT -->
            <select class="form-select border border-success btn btn-outline-white" aria-label="Default select example" name="sexe" > 
                <option value="f"<?php if (!(strcmp("f", $fiche['sexe']))) {echo " selected";}?>>Femme</option>
                <option value="m"<?php if (!(strcmp("m", $fiche['sexe']))) {echo " selected";}?>>Homme</option>
                
            </select>

                            <!-- VERSION RADIO -->
            <!-- pour les bouton radio par défaut sera le  1er sera "checked" et le second le sera si on à l'info du sexe et si cette info est égale à "f"  -->

            <!-- <div class="form-group">
                <label for="sexe">Sexe</label>
                <input type="radio" name="sexe" value="m" checked> Homme
                <input type="radio" name="sexe" value="f"< ?php if (isset($fiche['sexe']) && $fiche['sexe'] =='f') echo 'checked'; ?>> Femme
            </div> -->
        </div>
        <div class="mb-3 form-group">
            <!-- <label for="service" class="form-label">Services</label> <br> -->
            <select class="form-select border border-success btn btn-outline-white" aria-label="Default select example" name="service" >
                <option value="assistant" <?php if (!(strcmp("assistant", $fiche['service']))) {echo " selected";}?>>Assistant</option>
                <option value="commercial"<?php if (!(strcmp("commercial", $fiche['service']))) {echo " selected";}?>>Commercial</option>
                <option value="communication" <?php if (!(strcmp("communication", $fiche['service']))) {echo " selected";}?>>Communication</option>
                <option value="direction" <?php if (!(strcmp("direction", $fiche['service']))) {echo " selected";}?>>Direction</option>
                <option value="informatique" <?php if (!(strcmp("informatique", $fiche['service']))) {echo " selected";}?>>Informatique</option>
                <option value="juridique" <?php if (!(strcmp("juridique", $fiche['service']))) {echo " selected";}?>>Juridique</option>
                <option value="production" <?php if (!(strcmp("production", $fiche['service']))) {echo " selected";}?>>Production</option>
                <option value="secretariat" <?php if (!(strcmp("secretariat", $fiche['service']))) {echo " selected";}?>>Secretariat</option>
            </select>
        </div>
        <div class="mb-3 form-group">
            <!-- <label for="date_embauche" class="form-label">date_embauche</label> -->
            <input type="date" name="date_embauche" id="date_embauche" class="form-control form-group border border-success" value="<?php echo $fiche['date_embauche']; ?>" >
        </div>
        <div class="mb-3 form-group">
            <!-- <label for="salaire" class="form-label">Salaire</label> -->
            <input type="number" name="salaire" id="salaire" class="form-control form-group border border-success" value="<?php echo $fiche['salaire']; ?>">
        </div>
            <input type="submit" href="#" class="submit btn btn-outline-success d-sm-block my-2 col-sm-6 mx-auto" value="Modifier" >
    </form>
    
</div>
<!-- fin col -->

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