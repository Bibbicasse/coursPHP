
<?php
    define("PI",3.1415926535, TRUE);//Définition insensible à la casse parce qu'on a mis TRUE
    echo"La constance PI vaut ",PI,"<br>";
    echo"La constance PI vaut ",pi,"<br>";

    if (defined("PI")) echo "la constante est déjà définie <br>";

    define("sitegravillon", "http://www.gravillon.fr",FALSE);
    echo "L'url de Gravillon est : ".sitegravillon."<br>";

    echo "Visitez le site de <a href=\" ".sitegravillon." \"target=\"_blank\">Gravillon </a>";
?>
