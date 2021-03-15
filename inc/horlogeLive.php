<?php
/*---------------------------------------------------------------*/
/*
    Titre : Affiche l'heure en temps réel sur son site                                                                   
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=136
    Date édition     : 31 Juil 2005                                                                                       
    Date mise à jour : 06 Sept 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/?>
    <!--  Code à placer dans la partie HEAD  -->

    <head>

    <?php
    // Récupère l'heure du serveur

       $localtime = localtime();

       $seconde =  $localtime[0];
       $minute =  $localtime[1];
       $heure =  $localtime[2];

    ?>

    <script>
          
          bcle=0;

          function clock()
          {
            if (bcle == 0)
            {
              heure = <?php echo $heure ?>;
              min = <?php echo $minute ?>;
              sec = <?php echo $seconde ?>;
            }
            else
            {
              sec ++;
              if (sec == 60)
              {
                sec=0;
                min++;
                if (min == 60)
                {
                  min=0;
                  heure++;
                };
              };
            };
            txt="";
            if(heure < 10)
            {
              txt += "0";
            }
            txt += heure+ ":";
            if(min < 10)
            {
              txt += "0"
            }
            txt += min + ":";
            if(sec < 10)
            {
              txt += "0"
            }
            txt += sec ;
            timer = setTimeout("clock()",1000);
            bcle ++;
            document.clock.date.value = txt ;
          }
    </script>


    <style type="text/css">
    form{
        display:inline;
    }
    .style {border-width: 0;background-color:#005A7B;color: #F2f2f2;}
    </style>

    </head>




    <!--  Charge la fonction dans le corps de la page  -->
    <body onLoad="clock()">

    <!--  Affiche l'heure  -->
    <form name="clock" onSubmit="0">
    <input type="text" name="date" size="5" readonly="true" class="style">
    </form>