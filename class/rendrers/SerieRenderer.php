<?php

namespace rendrers;
class SerieRenderer
{
    private $name;
    private $description;
    private $image;
    
    public function getHTML(){ ?>
        <article class="game neon">
            <h1><?= $this->name ?></h1>
            <div class="game-content">
                <?php if($this->image != null) : ?>

                <img src="<?= $this->image ?>">

                <?php endif; ?>
                <div class="game-description">
                    <?= $this->description ?>
                </div>
            </div>
        </article>
    <?php }

}