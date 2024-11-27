<?php
    use kosmoproyecto\app\entity\Usuario;
    use kosmoproyecto\app\utils\Utils;
    // $user = new Usuario();
?>

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/?order=alphabetical">SVTickets</a>

        <?php if (!is_null($app['user'])) : ?> <!-- $app['user'] -->
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item <?= Utils::esOpcionMenuActiva('/') ? 'active' : '' ?>">
                    <a class="nav-link" href="/?order=alphabetical">Events</a>
                </li>
                <?php if ($app['user']->getRole() === 'ROLE_ADMIN') : ?>
                    <li class="nav-item <?= Utils::esOpcionMenuActiva('/new-event') ? 'active' : '' ?>">
                        <a class="nav-link" href="/new-event">New event</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item <?= Utils::esOpcionMenuActiva('/profile') ? 'active' : '' ?>">
                    <a class="nav-link" href="/profile">My profile</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/logout" id="/logout">Logout (<?= $app['user']->getUsername() ?>)</a> <!-- $app['user'] -->
                </li>
            </ul>
        <?php else : ?>
            <ul class="navbar-nav">
                <li class="nav-item <?= Utils::esOpcionMenuActiva('/login') ? 'active' : '' ?>">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item <?= Utils::esOpcionMenuActiva('/register') ? 'active' : '' ?>">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>