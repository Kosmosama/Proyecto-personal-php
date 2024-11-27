<?php
    use kosmoproyecto\app\utils\Utils;
?>

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/?order=alphabetical">SVTickets</a>

        <?php if (!is_null($app['user'])) : ?> 
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= Utils::esOpcionMenuActiva('/') ? 'active' : '' ?>" href="/?order=alphabetical">Events</a>
                </li>
                <?php if ($app['user']->getRole() === 'ROLE_ADMIN') : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= Utils::esOpcionMenuActiva('/new-event') ? 'active' : '' ?>" href="/new-event">New event</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link <?= Utils::esOpcionMenuActiva('/profile') ? 'active' : '' ?>" href="/profile">My profile</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/logout" id="/logout">Logout (<?= $app['user']->getUsername() ?>)</a>
                </li>
            </ul>
        <?php else : ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= Utils::esOpcionMenuActiva('/login') ? 'active' : '' ?>" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Utils::esOpcionMenuActiva('/register') ? 'active' : '' ?>" href="/register">Register</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>