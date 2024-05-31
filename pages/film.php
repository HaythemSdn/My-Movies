<?php
require_once "../config.php";
session_start();
require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use mdb\Film;

$film = new Film();
$titre= $_GET['titre'];
$CurrentFilm = $film->getFilm($titre);

ob_start()
?>


    <div class="w-full 2xl:w-9/12  xl:10/12 mx-auto space-y-4 flex flex-col justify-center items-center">

     <?php $CurrentFilm->getHTML()   ?>
    </div>
  </body>

</html>
<?php $content = ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>