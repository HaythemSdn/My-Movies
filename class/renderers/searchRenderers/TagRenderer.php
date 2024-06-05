<?php

namespace renderers\searchRenderers;

class TagRenderer
{
    private $nom;
    public function getHTML()
    {
?>
        <article class="flex  w-[300px] h-[100px] mb-6 justify-center items-center shadow-inner shadow-white bg-secondary">
            <p class="director-name text-4xl"><?= $this->nom ?></p>
        </article>
<?php }
}
