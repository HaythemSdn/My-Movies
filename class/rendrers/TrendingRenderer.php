<?php

namespace rendrers;

class TrendingRenderer {
    private $titre;
    private $date_sortie;
    private $tags;
    private $affiche;
    
    public function getHTML() {
        // Split the tags string into an array
        $tagsArray = explode(',', $this->tags);
        ?>
        <article class="cart flex flex-col items-center relative rounded-xl shadow-lg pb-3 mb-10 w-[400px] h-[400px] bg-white">
            <div class="relative group">
                <img src="<?= htmlspecialchars($this->affiche) ?>" alt="film affiche"
                     class="w-[400px] h-[300px] rounded-t-xl object-cover hover:scale-105 transition-all duration-300 ease-in-out" />
                <div class="hidden group-hover:flex absolute bg-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg shadow-lg">
                    <div class="px-3 py-2 border-r">
                        <i id="heart-icon" class="fa-regular fa-heart w-5 h-5 text-primary cursor-pointer"></i>
                    </div>
                    <div class="px-3 py-2">
                        <i class="fa-regular fa-eye w-5 h-5 text-primary cursor-pointer"></i>
                    </div>
                </div>
            </div>
            <p class="name text-primary py-2"><?= htmlspecialchars($this->titre) ?></p>
            <div class="desc flex">
                <div class="tags flex justify-center items-center space-x-1">
                    <?php foreach ($tagsArray as $tag) : ?>
                        <span class="tag bg-secondary px-2 py-1 rounded-lg"><?= htmlspecialchars($tag) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <span class="absolute top-0 left-0 bg-red-500 text-white px-4 py-1 rounded-tl-xl rounded-br-xl"><?= htmlspecialchars($this->date_sortie) ?></span>
            <i id="heart-icon-top" class="fa-regular fa-heart absolute top-0 right-0 w-5 h-5 text-white cursor-pointer"></i>
        </article>
    <?php }
}
