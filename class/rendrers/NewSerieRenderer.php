<?php

namespace rendrers;

class NewSerieRenderer
{
    private $titre;
    private $date_sortie;
    private $affiche;
    private $season;

    public function getHTML()
    { ?>
        <article class="cart flex flex-col items-center  relative rounded-xl shadow-lg  pb-3 mb-10 w-[250px] hover:scale-105 transition-all duration-300 ease-in-out ">
            <div class="relative group">
                <img src="<?= $this->affiche?>" alt="Food Image" class=" w-[250px] h-[300px] rounded-t-lg object-cover object-center" />
                <div class="hidden group-hover:flex absolute bg-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg shadow-lg">
                    <div class="px-3 py-2 border-r">
                        <i id="heart-icon" class="fa-regular fa-heart w-5 h-5 text-primary cursor-pointer"></i>
                    </div>
                    <div class="px-3 py-2">
                    <a href="film.php?titre=<?=$this->titre?> "><i class="fa-regular fa-eye w-5 h-5 text-primary cursor-pointer"></i> </a>
                    </div>
                </div>
            </div>
            <div class="desc flex justify-between w-full text-sm">
                <p class="name text-pwhite font-bold py-2 "><?= $this->titre?></p>
                <div class="resolution flex justify-center items-center space-x-1 ">
                    <span class="tag bg-secondary px-1  ">HD</span>
                    <span class="time border border-secondary px-1">season<?= $this->season ?> </span>
                </div>
            </div>
            <span class="absolute top-0 left-0 bg-red-500 text-white px-4 py-1 rounded-tl-xl rounded-br-xl"><?= $this->date_sortie?></span>
            <i id="heart-icon-top" class="fa-regular fa-heart absolute top-0 right-0 w-5 h-5 text-white cursor-pointer"></i>
    </article>
<?php }
}
