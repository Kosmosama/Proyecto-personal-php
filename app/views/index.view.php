<div class="container">
    <nav class="navbar navbar-light bg-light justify-content-between mt-3">
        <div class="container-fluid justify-content-start">
            <span>Order:</span>
            <ul class="nav flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link" href="?order=alphabetical<?= $search ? '&search=' . urlencode($search) : '' ?>">Alphabetically</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?order=price<?= $search ? '&search=' . urlencode($search) : '' ?>">By price</a>
                </li>
            </ul>
            <div class="d-flex mb-0">
            <form class="d-flex mb-0" method="GET">
                <input type="hidden" name="order" value="<?= htmlspecialchars($order ?? '') ?>">
                <input class="form-control me-2" type="text" name="search" id="searchInput" placeholder="Search" value="<?= htmlspecialchars($search ?? '') ?>" aria-label="Search">
                <button type="submit" class="btn btn-outline-primary border-0" id="searchBtn"><i class="bi bi-search"></i></button>
            </form>
            </div>
        </div>
    </nav>

    <div class="text-muted" id="filterInfo">
        Order: <?= htmlspecialchars($order ?? 'none') ?>. Searching by: <?= htmlspecialchars($search ?? 'none') ?>.
    </div>

    <div id="eventsContainer" class="mb-4 mt-4 row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
        <?php foreach ($eventos as $evento) : ?>
            <?php
            include __DIR__ . '/event.part.php';
            ?>
        <?php endforeach; ?>
    </div>
</div>
