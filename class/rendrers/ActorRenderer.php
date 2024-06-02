<?php

namespace rendrers;

class ActorRenderer
{
    private $nom;
    private $photo;
    private $film_titles;
    private $film_posters;

    public function __construct($data)
    {
        $this->nom = $data->nom;
        $this->photo = $data->photo;
        $this->film_titles = explode(',', $data->film_titles);
        $this->film_posters = explode(',', $data->film_posters);
    }

    public function getHTML()
    {
?>
        <!-- Actor details -->
        <section class="flex flex-col lg:flex-row justify-center items-center w-full p-10">
            <!-- Actor photo -->
            <div class="lg:w-1/3 h-full rounded-sm">
                <img src="<?= $this->photo ?>" alt="actor photo" class="rounded-lg object-cover object-center h-96" />
            </div>
            <!-- Actor details -->
            <div class="flex flex-col lg:w-2/3 space-y-4 lg:mx-8">
                <div class="flex py-4 lg:p-0 justify-between items-center">
                    <p class="text-3xl text-white"><?= $this->nom ?></p>
                </div>
            </div>
        </section>

        <!-- Films -->
        <section class="w-full text-white py-10">
            <div class="flex flex-col justify-center items-center w-10/12 mx-auto relative uppercase px-1">
                <p class="lg:text-4xl md:text-3xl text-2xl tracking-widest font-normal">Films</p>
                <i class="fas fa-circle mb-16 mt-3 text-yellow-400"></i>
                <div class="custom-scrollbar pb-5 flex w-full space-x-6 overflow-x-auto flex-nowrap">
                    <?php for ($i = 0; $i < count($this->film_titles); $i++) : ?>
                        <div class="flex flex-col space-y-2 flex-shrink-0 pb-3 flex-grow-0 justify-center items-center shadow-md shadow-gray-700">
                            <img src="<?= $this->film_posters[$i] ?>" alt="<?= $this->film_titles[$i] ?>" class="lg:w-60 lg:h-60 w-40 h-40 object-cover">
                            <p class="film-title"><?= $this->film_titles[$i] ?></p>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>
<?php
    }
}
?>
