<?php

namespace rendrers\AdminForms;

use mdb\Admin;

class AddFilm
{
    private $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function generateForm()
    {
        $directors = $this->admin->getAllDirectors();
        $actors = $this->admin->getAllActors();
        $tags = $this->admin->getAllTags();
?>


                        <form id="film-form" method="POST" enctype="multipart/form-data" class="w-10/12 mx-auto text-black flex flex-col space-y-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <label for="titre" class="block text-sm font-semibold text-white mb-2 ">Title</label>
                                    <input type="text" class="block w-[220px] h-[50px] p-2  bg-white border rounded-md focus:border-secondary focus:ring-secondary focus:outline-none focus:ring focus:ring-opacity-40" id="titre" name="titre" aria-describedby="titre">
                                </div>
                                <div>
                                    <label for="date_sortie" class="block text-sm font-semibold text-white mb-2 ">Release Date</label>
                                    <input type="date" class="block w-[220px] h-[50px] p-2  bg-white border rounded-md focus:border-secondary focus:ring-secondary focus:outline-none focus:ring focus:ring-opacity-40" id="date_sortie" name="date_sortie">
                                </div>
                                <div>
                                    <label for="type" class="block text-sm font-semibold text-white mb-2 ">Type</label>
                                    <select id="type" name="type" class="block w-[220px] h-[50px] p-2  bg-white border rounded-md focus:border-secondary focus:ring-secondary focus:outline-none focus:ring focus:ring-opacity-40">
                                        <option value="film">Film</option>
                                        <option value="serie">Series</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-around items-center">
                                <div id="season-container" style="display: none;">
                                    <label for="season" class="block text-sm font-semibold text-white mb-2 ">Season</label>
                                    <input type="number" class="block w-[220px] h-[50px] p-2  bg-white border rounded-md focus:border-secondary focus:ring-secondary focus:outline-none focus:ring focus:ring-opacity-40" id="season" name="season">
                                </div>
                                <div>
                                    <label for="realisateur_id" class="block text-sm font-semibold text-white mb-2 ">Director</label>
                                    <select id="realisateur_id" name="realisateur_id" class="block w-[220px] h-[50px] p-2  bg-white border rounded-md focus:border-secondary focus:ring-secondary focus:outline-none focus:ring focus:ring-opacity-40">
                                        <?php foreach ($directors as $director) : ?>
                                            <option value="<?= $director->id ?>"><?= htmlspecialchars($director->nom) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="description" class="block text-sm font-semibold text-white mb-2 ">Description</label>
                                    <textarea class="block w-[220px] h-[50px] p-2  bg-white border rounded-md focus:border-secondary focus:ring-secondary focus:outline-none focus:ring focus:ring-opacity-40" id="description" name="description"></textarea>
                                </div>
                            </div>

                            <div class="flex justify-around items-center">
                                <div>
                                    <div class="relative inline-block w-full">
                                    <p  class="text-sm font-semibold text-white mb-2 ">Actors</p> 
                                        <div id="addActorBtn" class=" flex justify-between items-center w-[220px] h-[50px] p-2  bg-white border rounded-md cursor-pointer focus:border-secondary focus:ring-secondary focus:outline-none focus:ring focus:ring-opacity-40">
                                            <p>Add actors</p>
                                            <i id="actors-dropdown-icon" class="fas fa-caret-down"></i>
                                        </div>
                                        <div id="actors-dropdown" class="absolute z-90 hidden w-full mt-2 overflow-hidden bg-white border rounded-md shadow-lg max-h-60 overflow-y-auto">
                                            <?php foreach ($actors as $actor) : ?>
                                                <div class="px-4 py-2 border-b hover:bg-gray-200">
                                                    <label class="inline-flex items-center">
                                                        <input type="checkbox" name="actors[]" value="<?= $actor->id ?>" class="form-checkbox">
                                                        <span class="ml-2"><?= htmlspecialchars($actor->nom) ?></span>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="relative inline-block w-full">
                                    <p  class="text-sm font-semibold text-white mb-2 ">Tags</p>   
                                        <div id="addTagBtn" class=" flex justify-between items-center w-[220px] h-[50px] p-2  bg-white border rounded-md cursor-pointer focus:border-secondary focus:ring-secondary focus:outline-none focus:ring focus:ring-opacity-40">
                                        <p>Add Tags</p>
                                            <i id="tags-dropdown-icon" class="fas fa-caret-down"></i>
                                        </div>
                                        <div id="tags-dropdown" class="absolute z-90 hidden w-full mt-2 overflow-hidden bg-white border rounded-md shadow-lg max-h-60 overflow-y-auto">
                                            <?php foreach ($tags as $tag) : ?>
                                                <div class="px-4 py-2 border-b hover:bg-gray-200">
                                                    <label class="inline-flex items-center">
                                                        <input type="checkbox" name="tags[]" value="<?= $tag->id ?>" class="form-checkbox">
                                                        <span class="ml-2"><?= htmlspecialchars($tag->nom) ?></span>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div>
                                <label for="image" class="block text-sm font-semibold text-white mb-2 ">Image</label>
                                <input type="file" class="block w-full px-4 py-2 mt-2  bg-white border rounded-md focus:border-secondary focus:ring-secondary focus:outline-none focus:ring focus:ring-opacity-40" id="image" name="image" accept="image/png, image/gif, image/jpeg">
                                <div id="preview-container" class="mt-2">
                                    <img id="preview-image" src="" class="w-[400px]  h-[400px] object-cover object-center rounded-md">
                                </div>
                            </div>


                            <div class="flex justify-around items-center pt-7">
                                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Submit</button>
                                <button type="reset" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Reset</button>
                            </div>
                        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Type and season
                const typeSelect = document.getElementById("type");
                const seasonContainer = document.getElementById("season-container");
                typeSelect.addEventListener("change", function() {
                    if (this.value === "serie") {
                        seasonContainer.style.display = "block";
                    } else {
                        seasonContainer.style.display = "none";
                    }
                });

                // Image preview
                const preview = document.getElementById("preview-image");
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                }

                const fileInput = document.getElementById("image");
                fileInput.addEventListener('change', () => {
                    let file = fileInput.files[0];
                    if (file && file.type.split('/')[0] === "image") {
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = "";
                    }
                });

                // Form validation
                let form = document.getElementById("film-form");
                let titre = document.getElementById("titre");
                form.addEventListener('submit', (ev) => {
                    if (titre.value == "") {
                        ev.preventDefault();
                        titre.classList.add("border-red-500");
                    }
                });
                titre.addEventListener('keydown', () => {
                    titre.classList.remove("border-red-500");
                });

                function toggleDropdown(dropdownId) {
                    var dropdown = document.getElementById(dropdownId);
                    var DropIcon = document.getElementById(dropdownId + "-icon");
                    dropdown.classList.toggle("hidden");
                    if (dropdown.classList.contains("hidden")) {
                        DropIcon.classList.remove("fa-caret-up");
                        DropIcon.classList.add("fa-caret-down");
                    } else {
                        DropIcon.classList.remove("fa-caret-down");
                        DropIcon.classList.add("fa-caret-up");
                    }
                }
                const addActorBtn = document.getElementById("addActorBtn");
                const addTagBtn = document.getElementById("addTagBtn");

                addActorBtn.addEventListener("click", function() {
                    toggleDropdown("actors-dropdown");
                });
                addTagBtn.addEventListener("click", function() {
                    toggleDropdown("tags-dropdown");
                });

            });
        </script>
<?php
    }

    public function createFilm($titre, $date_sortie, $realisateur_id, $type, $description = null, $imgFile = null, $season = null, $actors = [], $tags = [])
    {

        $film_id = $this->admin->createFilm($titre, $date_sortie, $realisateur_id, $type, $description, $imgFile, $season);
        // Add actors to the film
        foreach ($actors as $actor_id) {
            $this->admin->addActorToFilm($film_id, $actor_id);
        }

        // Add tags to the film
        foreach ($tags as $tag_id) {
            $this->admin->addTagToFilm($film_id, $tag_id);
        }
        // header('Location: films_list.php');
        exit();
    }
}

?>
