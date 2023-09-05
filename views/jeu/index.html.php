<h1 class="text-primary">Page d'accueil</h1>
<div class="d-flex flex-row flex-wrap">
    <?php foreach ($jeux as $jeu) : ?>
        <div class="card m-3" style="width: 18rem;">
            <img src="/images/games/<?= $jeu->image_path ?>" class="card-img-top" alt="<?= $jeu->titre ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $jeu->titre ?></h5>
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
                <a href="/detail/<?= $jeu->id ?>" class="btn btn-primary mt-5">Voir Détails</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>