<?php
require_once "../config.php";
session_start();
require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use mdb\Search;

$search = new Search();
$films = $search->getAllFilms();
$actors = $search->getAllActors();
$directors = $search->getAllDirectors();
$categories = $search->getAllTags();

ob_start()
?>
<div class="text-white w-10/12 mx-auto">
    <p class="text-6xl text-center font-bold mb-16">Welcome To Our Mystery Search</p>
    <ul class="flex space-x-20 justify-center uppercase" id="options">
        <a href="search.php?content=films">
            <li id="films" class="flex space-x-2  px-4 py-2  justify-center items-center border-b-2 border-secondary shadow-lg cursor-pointer shadow-gray-700">
                <i class="fas fa-film text-2xl"></i>
                <p class="text-lg">Our films</p>
            </li>
        </a>
        <a href="search.php?content=actors">
            <li id="actors" class="flex space-x-2  px-4 py-2 justify-center items-center border-b-2 border-secondary shadow-lg cursor-pointer shadow-gray-700">
                <i class="fas fa-user text-2xl"></i>
                <p class="text-lg">Our actors</p>
            </li>
        </a>
        <a href="search.php?content=directors">
            <li id="directors" class="flex space-x-2  px-4 py-2 justify-center items-center border-b-2 border-secondary shadow-lg cursor-pointer shadow-gray-700">
                <i class="fas fa-user-tie text-2xl"></i>
                <p class="text-lg">Our directors</p>
            </li>
        </a>
        <a href="search.php?content=categories">
            <li id="categories" class="flex space-x-2  px-4 py-2 justify-center items-center border-b-2 border-secondary shadow-lg cursor-pointer shadow-gray-700">
                <i class="fas fa-tags text-2xl"></i>
                <p class="text-lg">Our categories</p>
            </li>
        </a>
    </ul>
    <div class=" w-10/12 mx-auto p-10 mt-24" id="views">
        <section id="films" class="view flex flex-wrap justify-around">
            <?php if (!empty($films)) : ?>
                <?php foreach ($films as $r) : ?>
                    <?= $r->getHTML(); ?>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No films films found.</p>
            <?php endif; ?>
        </section>
        <section id="actors" class="view flex flex-wrap justify-around">
            <?php if (!empty($actors)) : ?>
                <?php foreach ($actors as $r) : ?>
                    <?= $r->getHTML(); ?>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No actors found.</p>
            <?php endif; ?>
        </section>
        <section id="directors" class="view flex flex-wrap justify-around">
            <?php if (!empty($directors)) : ?>
                <?php foreach ($directors as $r) : ?>
                    <?= $r->getHTML(); ?>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No directors found.</p>
            <?php endif; ?>
        </section>
        <section id="categories" class="view flex flex-wrap justify-around">
            <?php if (!empty($categories)) : ?>
                <?php foreach ($categories as $r) : ?>
                    <?= $r->getHTML(); ?>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No categories found.</p>
            <?php endif; ?>
        </section>
    </div>
</div>

<!-- Loading Screen -->
<div class="loading-screen">
    <div class="loading-spinner"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get URL content parameter
        const urlParams = new URLSearchParams(window.location.search);
        const content = urlParams.get("content");
        const views = document.querySelectorAll("#views section.view");
        const options = document.querySelectorAll("#options li");
        const loadingScreen = document.querySelector(".loading-screen");

        const displayContent = (content) => {
            views.forEach(view => {
                if (view.id === content) {
                    view.classList.remove("hidden");
                } else {
                    view.classList.add("hidden");
                }
            });
            options.forEach(option => {
                if (option.id === content) {
                    option.classList.add("selected");
                } else {
                    option.classList.remove("selected");
                }
            });
        };

        if (content) {
            displayContent(content);
        } else {
            displayContent("films");
        }

        // Add click event listener to options to show the loading screen
        options.forEach(option => {
            option.addEventListener("click", function(e) {
                e.preventDefault();
                loadingScreen.classList.add("active");
                const href = this.closest("a").getAttribute("href");
                setTimeout(() => {
                    window.location.href = href;
                }, 1000); // Adjust the delay time if needed
            });
        });
    });
</script>

<?php $content = ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>
