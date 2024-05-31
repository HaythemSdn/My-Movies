<?php

namespace rendrers;

class FilmRenderer
{
    private $titre;
    private $tags;
    private $date_sortie;
    private $affiche;
    private $realisateur;
    private $acteurs_noms;
    private $acteurs_photos;
    private $synopsis;

    public function __construct($data)
    {
        $this->titre = $data->titre;
        $this->tags = explode(',', $data->tags);
        $this->date_sortie = $data->date_sortie;
        $this->affiche = $data->affiche;
        $this->realisateur = (object) [
            'nom' => $data->realisateur_nom,
            'photo' => $data->realisateur_photo
        ];
        $this->synopsis = $data->synopsis;
        $this->acteurs_noms = explode(',', $data->acteur_noms);
        $this->acteurs_photos = explode(',', $data->acteur_photos);
    }


    public function getHTML()
    {
?>
        <!-- video trailer -->
        <section class="flex flex-col items-center space-y-4 justify-center">
            <p class="lg:text-4xl md:text-3xl text-2xl uppercase text-white">Trailer</p>
            <div class="relative rounded-sm border-2 border-secondary">
                <iframe class="2xl:h-[480px] 2xl:w-[900px] w-[400px] h-[250px] md:w-[700px] md:h-[400px]" src="https://www.youtube.com/embed/KPLWWIOCOOQ" frameborder="0" allowfullscreen></iframe>
            </div>
        </section>

        <!-- movie details -->
        <section class="flex flex-col lg:flex-row justify-center items-center w-full p-10">
            <!-- movie poster -->
            <div class="lg:w-1/3 h-full rounded-sm">
                <img src="<?= $this->affiche ?>" alt="movie poster" class="rounded-lg object-cover object-center h-96" />
            </div>
            <!-- movie details -->
            <div class="flex flex-col lg:w-2/3 space-y-4 lg:mx-8">
                <div class="flex py-4 lg:p-0 justify-between items-center">
                    <p class="text-3xl text-white"><?= $this->titre ?></p>
                    <span class="px-3 py-2 bg-secondary text-white cursor-pointer hover:animate-pulse rounded-md">Add to Favourites
                        <i class="fas fa-plus ml-3 text-white"></i>
                    </span>
                </div>
                <div class="flex space-x-4 items-center text-white">
                    <div class="tags flex space-x-3 font-bold text-primary">
                        <?php foreach ($this->tags as $tag) : ?>
                            <span class="tag bg-white px-2 py-1 rounded-lg"><?= $tag ?></span>
                        <?php endforeach; ?>
                    </div>

                </div>
                <div class="flex space-x-4 items-center text-white">
                    <div class="date">
                        <i class="fas fa-calendar mr-1"></i>
                        <span><?= $this->date_sortie ?></span>
                    </div>
                    <div class="time">
                        <i class="fas fa-clock mr-1"></i>
                        <span>2h 30m</span>
                    </div>
                    <div class="rating">
                        <i class="fas fa-star mr-1"></i>
                        <span>8.5</span>
                    </div>
                </div>
                <div class="description w-full">
                    <p class="text-white"><?= $this->synopsis ?></p>
                </div>
                <!-- other details -->
                <div class="flex flex-col  text-white font-bold">
                    <p>Country : <span class="font-normal country">United States</span></p>
                    <p>Genre : <span class="font-normal genre"><?= implode(', ', $this->tags) ?></span></p>
                    <p>Release date : <span class="font-normal release-date"><?= $this->date_sortie ?></span></p>
                    <p>Production : <span class="font-normal production">AMC studio</span></p>
                </div>
            </div>
        </section>

        <!-- cast -->
        <section class="w-full text-white py-10">
            <div class="flex flex-col justify-center items-center w-10/12 mx-auto relative uppercase px-1">
                <p class="lg:text-4xl md:text-3xl text-2xl tracking-widest font-normal">Actors</p>
                <i class="fas fa-circle mb-16 mt-3 text-yellow-400"></i>
                <div class="custom-scrollbar pb-5 flex w-full space-x-6 overflow-x-auto flex-nowrap">
                    <?php for($i=0; $i<count($this->acteurs_noms);$i++) : ?>
                        <div class="flex flex-col space-y-2 flex-shrink-0 pb-3 flex-grow-0 justify-center items-center shadow-md shadow-gray-700">
                            <img src="<?= $this->acteurs_photos[$i] ?>" alt="<?= $this->acteurs_noms[$i] ?>" class="lg:w-60 lg:h-60 w-40 h-40 object-cover">
                            <p class="actor-name"><?= $this->acteurs_noms[$i] ?></p>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>

        <!-- director -->
        <section class="w-10/12 mx-auto flex flex-col justify-center items-center text-white py-10 uppercase">
            <p class="lg:text-4xl md:text-3xl text-2xl tracking-widest font-normal mb-16">
                <i class="fas fa-star text-yellow-400"></i> Director <i class="fas fa-star text-yellow-400"></i>
            </p>
            <div class="flex flex-col space-y-2 pb-3 w-[300px] h-[300px] justify-center items-center shadow-inner shadow-yellow-400">
                <img src="<?= $this->realisateur->photo ?>" alt="<?= $this->realisateur->nom ?>" class="lg:h-60 w-[290px] h-40 object-cover">
                <p class="actor-name"><?= $this->realisateur->nom ?></p>
            </div>
        </section>
<?php
    }
}
