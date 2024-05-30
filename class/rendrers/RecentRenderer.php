<?php

namespace rendrers;
class RecentRenderer
{
    private $titre;
    private $date_sortie;
    private $affiche;
    
    public function getHTML(){ ?>
        <article class="flex  flex-shrink-0 flex-grow-0 w-[400px] justify-between items-center shadow-md shadow-gray-700">
            <img src="<?= $this->affiche ?>" alt="" class="w-60 h-40 object-cover object-center rounded-l-lg">
            <div class="px-4 ">
              <p class="text-white"><?= $this->titre ?></p>
              <p class="text-white"><?= $this->date_sortie ?></p>
            </div>
          </article>
    <?php }

}