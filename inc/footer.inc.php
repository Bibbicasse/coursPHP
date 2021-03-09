<footer class="footer mt-auto py-3 bg-secondary">
  <div class="container">
    <span class="text-white">Cours PHP 7 -
    <?php
        setlocale(LC_ALL, 'fr_FR');
        echo strftime("%A %e %B %Y");
        echo(' - ');
        date_default_timezone_set("Europe/Paris");
        echo date ('H: i: s');
    ?>
    </span>
  </div>
</footer>
<!-- cf. https://www.php.net/manual/fr/function.date.php -->
<!-- cf. https://www.php.net/manual/fr/datetime.format.php-->
<!-- cf. https://www.php.net/manual/fr/timezones -->

