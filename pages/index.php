<?php
require_once "../config.php";
session_start();
require $GLOBALS['PHP_DIR'] . "class/Autoloader.php";
Autoloader::register();

use mdb\Film;

$film = new Film();
$trending = $film->getTrending();
$recent = $film->getRecent();
$newFilms = $film->getNewFilms();
ob_start()
?>
<!-- crousel -->
<section>
  <div class="w-full bg-primary 2xl:h-[600px] xl:h-[500px] md:h-[400px] h-[300px]">
    <div class="flex justify-between w-full h-5/6">
      <img class="object-cover h-full xl:w-2/12 w-1/12 opacity-30" id="prevSlide" src="" alt="">
      <div class="h-full hidden lg:flex items-center w-1/12 justify-center">
        <div id="prevButton" class="group h-14 w-14 hover:bg-secondary hover:border-transparent cursor-pointer rounded-full border border-white flex justify-center items-center">
          <i class="fas fa-chevron-left text-xl text-secondary group-hover:text-white"></i>
        </div>
      </div>
      <img class="object-cover xl:w-6/12 lg:w-8/12 w-9/12 shadow-lg shadow-secondary" id="mainSlide" src="" alt="">
      <div class="h-full hidden lg:flex items-center w-1/12 justify-center">
        <div id="nextButton" class="group h-14 w-14 hover:bg-secondary hover:border-transparent cursor-pointer rounded-full border border-white flex justify-center items-center">
          <i class="fas fa-chevron-right text-xl text-secondary group-hover:text-white"></i>
        </div>
      </div>
      <img class="object-cover xl:w-2/12 w-1/12 opacity-30" id="nextSlide" src="" alt="">
    </div>
    <!-- <div class="h-1/6 hidden lg:flex justify-center items-center text-xl lg:text-lg 2xl:space-x-24 xl:space-x-16 lg:space-x-6 pt-5">
          <div class="flex items-center">
            <i class="fas fa-gift text-secondary px-2 border-r border-white h-5 w-5"></i>
            <p class="hover:text-secondary text-white px-2 cursor-pointer">Emballage cadeau 1€</p>
          </div>
          <div class="flex items-center">
            <i class="fas fa-truck text-secondary px-2 border-r border-white h-5 w-5"></i>
            <p class="hover:text-secondary text-white px-2 cursor-pointer">Livraison offerte</p>
          </div>
          <div class="flex items-center">
            <i class="fas fa-percent text-secondary px-2 border-r border-white h-5 w-5"></i>
            <p class="hover:text-secondary text-white px-2 cursor-pointer">5% Remise sur votre prochaine commande</p>
          </div>
          <div class="flex items-center">
            <i class="fas fa-lock text-secondary px-2 border-r border-white h-5 w-5"></i>
            <p class="hover:text-secondary text-white px-2 cursor-pointer">Paiements sécurisés</p>
          </div>
        </div> -->
  </div>
</section>
<!-- main -->
<main class=" w-10/12 mx-auto text-white">
  <!-- recent movies -->
  <section class="pt-16 pb-10  w-full">
    <div class="flex flex-col justify-center items-center  w-10/12  mx-auto relative uppercase">
      <p class="lg:text-4xl md:text-3xl self-start text-2xl tracking-widest font-normal mb-16">
        recent movies
      </p>
      <div class="custom-scrollbar pb-5 flex w-full space-x-4 overflow-x-auto flex-nowrap">
        <?php if (!empty($recent)) : ?>
          <?php foreach ($recent as $r) : ?>
            <?= $r->getHTML(); ?>
          <?php endforeach; ?>
        <?php else : ?>
          <p>No recent films found.</p>
        <?php endif; ?>

        <!-- <div class="flex  flex-shrink-0 flex-grow-0 justify-center items-center shadow-md shadow-gray-700">
            <img src="../images/1.jpeg" alt="" class="w-60 h-40 object-cover rounded-l-lg">
            <div class="px-4 ">
              <p class="text-white">The Conjuring</p>
              <p class="text-white">2021</p>
            </div>
          </div> -->

      </div>
      <span class="px-3 py-2 sm:absolute static sm:top-0 mt-10 sm:m-0 sm:right-0 border-2 border-white cursor-pointer hover:bg-white rounded-md hover:text-primary hover:border-transparent">Voir
        <i class="fas fa-plus ml-3 text-secondary"></i>
      </span>
    </div>
  </section>

  <!-- popular movies -->
  <section class="pt-16 pb-10 w-full">
    <div class="flex flex-col justify-center items-center  w-10/12  mx-auto relative uppercase">
      <p class="lg:text-4xl md:text-3xl self-start text-2xl tracking-widest font-normal mb-16">
        Trending
      </p>
      <div class="flex flex-wrap justify-around ">
        <!-- <div class="cart flex flex-col items-center  relative rounded-xl shadow-lg  pb-3 mb-10 w-[400px] bg-white">
          <div class="relative group">
            <img src="../images/1.jpeg" alt="Food Image" class=" w-full h-8/12 rounded-t-lg object-cover hover:scale-105 transition-all duration-300 ease-in-out" />
            <div class="hidden group-hover:flex absolute bg-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg shadow-lg">
              <div class="px-3 py-2 border-r">
                <i id="heart-icon" class="fa-regular fa-heart w-5 h-5 text-primary cursor-pointer"></i>
              </div>
              <div class="px-3 py-2">
                <i class="fa-regular fa-eye w-5 h-5 text-primary cursor-pointer"></i>
              </div>
            </div>
          </div>
          <p class="name text-primary py-2">The pirats of caribiean</p>
          <div class="desc flex">
            <div class="tags flex justify-center items-center space-x-1 ">
              <span class="tag bg-secondary px-2 py-1 rounded-lg ">Action</span>
              <span class="tag bg-secondary px-2 py-1 rounded-lg">Adventure</span>
              <span class="tag bg-secondary px-2 py-1 rounded-lg">Fantasy</span>

            </div>
          </div>
          <span class="absolute top-0 left-0 bg-red-500 text-white px-4 py-1 rounded-tl-xl rounded-br-xl">-44%</span>
          <i id="heart-icon-top" class="fa-regular fa-heart absolute top-0 right-0 w-5 h-5 text-white cursor-pointer"></i>
        </div> -->

        <?php if (!empty($trending)) : ?>
          <?php foreach ($trending as $t) : ?>
          <?= $t->getHTML(); ?>
        <?php endforeach; ?>
        <?php else : ?>
          <p>No trending films found.</p>
        <?php endif; ?>

      </div>

    </div>
  </section>

  <!-- new release movies -->
  <section class="pt-16 pb-10 w-full">
    <div class="flex flex-col justify-center items-center  w-10/12  mx-auto relative ">
      <p class="lg:text-4xl md:text-3xl self-start  tracking-widest font-normal mb-16 uppercase">
        New Release - Movies
      </p>
      <div class="flex flex-wrap justify-around w-full">
        <!-- <div class="cart flex flex-col items-center  relative rounded-xl shadow-lg  pb-3 mb-10 w-[250px] ">
          <div class="relative group">
            <img src="../images/1.jpeg" alt="Food Image" class=" w-full h-[300px] rounded-t-lg object-cover " />
            <div class="hidden group-hover:flex absolute bg-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg shadow-lg">
              <div class="px-3 py-2 border-r">
                <i id="heart-icon" class="fa-regular fa-heart w-5 h-5 text-primary cursor-pointer"></i>
              </div>
              <div class="px-3 py-2">
                <i class="fa-regular fa-eye w-5 h-5 text-primary cursor-pointer"></i>
              </div>
            </div>
          </div>
          <div class="desc flex justify-between w-full text-sm">
            <p class="name text-pwhite font-bold py-2 ">The pirats of caribiean</p>
            <div class="resolution flex justify-center items-center space-x-1 ">
              <span class="tag bg-secondary px-1  ">HD</span>
              <span class="time border border-secondary px-1">3:10:48</span>
            </div>
          </div>
          <span class="absolute top-0 left-0 bg-red-500 text-white px-4 py-1 rounded-tl-xl rounded-br-xl">-44%</span>
          <i id="heart-icon-top" class="fa-regular fa-heart absolute top-0 right-0 w-5 h-5 text-white cursor-pointer"></i>
        </div> -->
        <?php if (!empty($newFilms)) : ?>
          <?php foreach ($newFilms as $n) : ?>
          <?= $n->getHTML(); ?>
        <?php endforeach; ?>
        <?php else : ?>
          <p>No New Release Movies films found.</p>
        <?php endif; ?>

      </div>

    </div>
  </section>

  <!-- new release series -->
  <section class="pt-16 pb-10 w-full">
    <div class="flex flex-col justify-center items-center  w-10/12  mx-auto relative ">
      <p class="lg:text-4xl md:text-3xl self-start  tracking-widest font-normal mb-16 uppercase">
        New Release - Series
      </p>
      <div class="flex flex-wrap justify-around ">
        <div class="cart flex flex-col items-center  relative rounded-xl shadow-lg  pb-3 mb-10 w-[250px] ">
          <div class="relative group">
            <img src="../images/1.jpeg" alt="Food Image" class=" w-full h-[300px] rounded-t-lg object-cover " />
            <div class="hidden group-hover:flex absolute bg-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg shadow-lg">
              <div class="px-3 py-2 border-r">
                <i id="heart-icon" class="fa-regular fa-heart w-5 h-5 text-primary cursor-pointer"></i>
              </div>
              <div class="px-3 py-2">
                <i class="fa-regular fa-eye w-5 h-5 text-primary cursor-pointer"></i>
              </div>
            </div>
          </div>
          <div class="desc flex justify-between w-full text-sm">
            <p class="name text-pwhite font-bold py-2 ">The pirats of caribiean</p>
            <div class="resolution flex justify-center items-center space-x-1 ">
              <span class="tag bg-secondary px-1  ">HD</span>
              <span class="season border border-secondary px-1">season 1</span>
            </div>
          </div>
          <span class="absolute top-0 left-0 bg-red-500 text-white px-4 py-1 rounded-tl-xl rounded-br-xl">-44%</span>
          <i id="heart-icon-top" class="fa-regular fa-heart absolute top-0 right-0 w-5 h-5 text-white cursor-pointer"></i>
        </div>
      </div>

    </div>
  </section>
</main>
<script src="../crousel/crousel.js"></script>
<?php $content = ob_get_clean() ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content) ?>