<div class="container">
    <div class="row mt-4" id="profile">
        <div class="col-3">
            <div>
                <img class="w-100" id="avatar" src="<?= $app['user']->getUrlPerfil() ?>" alt="" />
                <label class="btn btn-sm btn-danger">
                    <i class="bi bi-image"></i>
                    <input type="file" id="photoInput" class="d-none" />
                </label>
            </div>
        </div>

        <div class="col-9" id="profileInfo">
            <!--  Cambiar h4 por inputs con un botón -->
            <h4 id="name"><?= $app['user']->getUsername() ?></h4>
            <!-- <h4 id="email">
                <small class="text-muted">email</small>
            </h4> -->
            <!-- Añadir campo de modificar password que muestre 2 campos -->
            <div>
                <button class="btn btn-primary" id="editProfile">
                    <i class="fa-regular fa-pen-to-square"></i>
                    Edit profile
                </button>
                <button class="btn btn-success" id="editPassword">
                    <i class="fa-solid fa-lock"></i>
                    Edit password
                </button>
            </div>
        </div>

        <div class="col-9 d-none" id="profileForm">
            <form>
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email2" placeholder="Email" />
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name2" placeholder="Name" />
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" id="cancelEditProfile">Cancel</button>
            </form>
        </div>

        <div class="col-9 d-none" id="passwordForm">
            <form>
                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                    <label for="password2">Repeat password:</label>
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat password" />
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" id="cancelEditPassword">Cancel</button>
            </form>
        </div>
    </div>

    <!-- <div class="mt-4" id="map"></div> -->

</div>