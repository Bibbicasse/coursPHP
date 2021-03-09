<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP -  Chaînes de caractères</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
     <?php 
        require '../inc/nav.inc.php';
    ?>
    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - Chaînes de caractères</h1>
        <p class="lead">Les chaînes de caractères sont avec les nombres les types de données les plus manipulés sur un site web. De surcroît, dans les échanges entre le client et le serveur au moyen de formulaires, toutes les données sont transmises sous forme de chaînes, d'où leur importance.
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
        <h2>1 -  Les chaînes de caractères</h2>
        <p>Une chaîne de caractères est une suite de caractères alphanumériques contenus entre des guillemets simples (apostrophes) ou doubles.</p>
        <p>Si une chaîne contient une variable, celle-ci est évaluée, et sa valeur incorporée à la chaîne uniquement si vous utilisez des guillemets et no des apostrophes</p> <br>

        <?php
        $vartest = "coucou";
        echo "je dis $vartest";
        ?>
            <ul>
                <li>$a = 'PHP';</li>
                <li>$b = 'MySQL';</li>
                <li>$c = "PHP et $b";//affiche : PHP et MySQL</li>
                <li>$d = 'PHP et $b'; //affiche PHP et $b car $ et b sont considérés comme des caractères sans signification particulière</li>
            </ul>
    </div>
    
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Séquence</th>
                <th scope="col">Signification</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">\'</th>
                    <td>Affiche une apostrophe.</td>
                </tr>
                <tr>
                    <th scope="row">\"</th>
                    <td>Affiche des guillemets.</td>
                </tr>
                <tr>
                    <th scope="row">\$</th>
                    <td>Affiche le signe $.</td>
                </tr>
                <tr>
                    <th scope="row">\\</th>
                    <td>Affiche un antislash.</td>
                </tr>
                <tr>
                    <th scope="row">\n</th>
                    <td>Nouvelle ligne (code ASCII 0x0A).</td>
                </tr>
                <tr>
                    <th scope="row">\r</th>
                    <td>Retour chariot (code ASCII 0x0D).</td>
                </tr>
                <tr>
                    <th scope="row">\t</th>
                    <td>Tabulation horizontale (code ASCII 0x09).</td>
                </tr>
                <tr>
                    <th scope="row">\[0-7] {1,3}</th>
                    <td>Séquence de caractères désignant un nombre octal (de 1 à 3 caractères 0 à 7) et affichant le caractère correspondant :
                    echo "\115\171\123\121\114"; //Affiche MySQL.</td>
                </tr>
                <tr>
                    <th scope="row">\x[0-9 A-F a-f] {1,2}</th>
                    <td>Séquence de caractères désignant un nombre hexadécimal (de 1 à 2 caractères 0 à 9 et A à F ou a à f) et affichant le caractère correspondant :<br>
                    echo "\x4D\x79\x53\x51\x4C"; // Affiche MySQL</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-12">
        <h2>Concaténer des chaînes de caractères</h2>
        <p>L'opérateur PHP de concaténation est le point(.), qui fusionne deux chaîne littérales ou contenues dans des variables en une seule chaîne</p>
        <p><?php 
            $langage1 = "PHP";
            $langage2 = "MySQL";
            $phrase = "Utilisez".$langage." et" .$langage2. " pour construire un site dynamique <br>";
            echo $phrase;
            echo "Utilisez $langage1 et $langage2 pour faire un site dynamique <br>";
            // Lors de l'affichage avec l'instruction echo, cette concaténation peut être simulée en séparant chaque chaîne ou variable par une virgule.
            // echo "Utilisez ",$langage1, " et ",$langage2, "pour construire un site dunamique<br>";
            echo "<strong>On concatene avec un (.) un point c'est tout !</strong>";
        ?> 
        </p>
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