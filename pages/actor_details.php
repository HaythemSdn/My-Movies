<?php
require_once "../config.php";
session_start();
require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use mdb\Actor;
use mdb\Film;

$actor_name = $_GET['name'];
if (!$actor_name) {
    die("No actor name provided in the URL.");
}

$actor = new Actor();
$actor_info = $actor->getActorInfo($actor_name);

if (!$actor_info) {
    die("Failed to retrieve actor information. Actor name: $actor_name");
}

$film = new Film();
$films = $film->getFilmsByActor($actor_name);

ob_start();
?>

<div class="w-full 2xl:w-9/12 xl:10/12 mx-auto space-y-4 flex flex-col justify-center items-center">
    <?php if ($actor_info): ?>
        <h1 class="text-3xl font-bold mb-4 text-white"><?= $actor_info->nom ?></h1>
        <img src="<?= $actor_info->photo ?>" alt="<?= $actor_info->nom ?>" class="w-40 h-40 object-cover mb-2">
        <h2 class="text-2xl text-white">Films</h2>
        <ul>
            <?php if (!empty($films)): ?>
                <?php foreach ($films as $film): ?>
                    <li><a href="film.php?titre=<?= urlencode($film->titre) ?>" class="text-white"><?= $film->titre ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="text-white">No films found for this actor.</li>
            <?php endif; ?>
        </ul>
    <?php else: ?>
        <p class="text-white">Actor not found. Actor name: <?= htmlspecialchars($actor_name) ?></p>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
Template::render($content);
?>
