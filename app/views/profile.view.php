<?php
$view = $_GET['view'] ?? null;
?>

<div class="container">
    <div class="row mt-4" id="profile">
        <div class="col-3">
            <div>
                <img class="w-100" id="avatar" src="<?= $app['user']->getUrlPerfil() ?>" alt="" />
                <!-- <label class="btn btn-sm btn-danger">
                    <i class="bi bi-image"></i>
                    <input type="file" id="photoInput" class="d-none" />
                </label> -->
            </div>
        </div>

        <?php if ($view === null): ?>
            <div class="col-9" id="profileInfo">
                <h4 id="name"><?= $app['user']->getUsername() ?></h4>
                <a href="?view=editProfile" class="btn btn-primary">
                    <i class="fa-regular fa-pen-to-square"></i>
                    Edit profile
                </a>
                <a href="?view=editPassword" class="btn btn-success">
                    <i class="fa-solid fa-lock"></i>
                    Edit password
                </a>
                <a href="?view=editImage" class="btn btn-info">
                    <i class="fa-solid fa-lock"></i>
                    Edit image
                </a>
            </div>
        <?php endif; ?>

        <?php if ($view === 'editProfile'): ?>
            <div class="col-9" id="profileForm">
                <form action="update-username" method="post">
                    <div class="mb-3">
                        <!-- <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email2" placeholder="Email" /> -->
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" id="username2" placeholder="Username" />
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <a href="?" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        <?php elseif ($view === 'editPassword'): ?>
            <div class="col-9" id="passwordForm">
                <form action="update-password" method="post">
                    <div class="mb-3">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                        <label for="password2">Repeat password:</label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat password" />
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <a href="?" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        <?php elseif ($view === 'editImage'): ?>
            <div class="col-9" id="imageForm">
                <form action="update-image" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" class="form-control" name="avatar" id="avatar" accept="image/jpeg, image/png, image/gif">
                    </div>
                    <button type="submit" class="btn btn-primary">Update image</button>
                    <a href="?" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        <?php endif; ?>
    </div>
    <?php include __DIR__ . '/show-error.part.php' ?>
</div>