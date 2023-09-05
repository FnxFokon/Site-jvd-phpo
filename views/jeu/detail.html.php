<!-- <h1 class="text-primary"><?= $title_tag ?></h1>
<div>
    <div class="card d-flex flex-row justify-content-between m-3">
        <img src="/images/games/<?= $jeu->image_path ?>" class="card-img-top col-3" style="width: 24rem; height: 24rem;" alt="<?= $jeu->titre ?>">
        <div class="card-body align-items-start col-6">
            <h5 class="card-title"><?= $jeu->titre ?></h5>
            <p class="card-text"><?= $jeu->description ?></p>
            <div class="d-flex flex-row align-items-center py-3">
                <p class="card-text">PEGI: <?= $jeu->age->label ?>+</p>
                <img src="/images/pegi/<?= $jeu->age->image_path ?>" class="card-img-top" style="width: 35px; height: 35px" alt="PEGI: <?= $jeu->age->label ?>">
            </div>
            <div class="d-flex flex-column">
                <p class="card-text">
                    <i class="bi bi-star-fill text-warning"></i> Note Presse: <?= $jeu->note->note_media ?>/20
                </p>
                <p class="card-text">
                    <i class="bi bi-star-fill text-warning"></i> Note Utilisateur: <?= $jeu->note->note_utilisateur ?>/20
                </p>
            </div>
            <a href="/detail/<?= $jeu->id ?>" class="btn btn-primary mt-5">Acheter</a>
        </div>
    </div>
</div> -->

<div class="d-flex flex-column">
    <div><?= $jeu->titre ?></div>
    <div>
        <a href="/pegi/<?= $jeu->age->id ?>"> <!-- <?php echo $jeu->age_id ?> -->
            <img src="/images/pegi/<?= $jeu->age->image_path ?>" class="card-img-top" style="width: 35px; height: 35px" alt="PEGI: <?= $jeu->age->label ?>">
        </a>
    </div>
    <div><?= $jeu->description ?></div>
    <div><?= $jeu->age->label ?> +</div>
    <div><?= $jeu->note->note_media ?></div>
    <div><?= $jeu->note->note_utilisateur ?></div>
    <div>
        <img src="/images/games/<?= $jeu->image_path ?>" class="card-img-top col-3" style="width: 24rem; height: 24rem;" alt="<?= $jeu->titre ?>">
    </div>
    <div><?= $jeu->date_sortie ?></div>

</div>