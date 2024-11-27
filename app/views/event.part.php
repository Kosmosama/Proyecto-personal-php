<div class="col">
    <div class="card h-100 shadow">
        <a href="/event/<?= $evento->getId() ?>">
            <img class="card-img-top" src="<?= $evento->getUrlSubidas() ?>" alt="Imagen del evento">
        </a>
        <div class="card-body">
            <h4 class="card-title">
                <a class="text-decoration-none" href="/event/<?= $evento->getId() ?>">
                    <?= htmlspecialchars($evento->getNombre()) ?>
                </a>
            </h4>
            <p class="card-text"><?= htmlspecialchars($evento->getDescripcion()) ?></p>
        </div>
        <div class="card-footer text-muted row m-0">
            <div class="col-auto text-end text-muted">
                <div class="price small"><?= number_format($evento->getPrecio(), 2)?> €</div>
            </div>
        </div>
    </div>
</div>