<?php
require_once "../config.php";
session_start();
require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use mdb\Actor;

$actor = new Actor();
$allActors = $actor->getAllActors();

ob_start();
?>

<div class="w-full 2xl:w-9/12  xl:10/12 mx-auto space-y-4 flex flex-col justify-center items-center">
<h1 class="text-3xl font-bold mb-4 text-white">All Actors</h1>
    <div class="flex flex-wrap justify-center">
        <?php if (!empty($allActors)): ?>
            <?php foreach ($allActors as $actor): ?>
                <div class="actor-card m-4 p-4 border rounded-lg flex flex-col items-center text-white " >
                    <img src="<?= $actor->photo ?>" alt="<?= $actor->nom ?>" class="w-40 h-40 object-cover mb-2 text-white">
                    <p class="text-xl"><?= $actor->nom ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No actors found.</p>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
Template::render($content);
?>
