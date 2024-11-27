<div class="container">
    <?php include __DIR__ . '/show-error.part.view.php' ?>
    <form action="/check-register" id="form-register" class="mt-4" method="POST" role="form" enctype="multipart/form-data">
        <legend>Create an account</legend>

        <!-- <div class="mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="nameUser" placeholder="Name" />
        </div>
        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
        </div> -->
        <div class="mb-3">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
        </div>
        <div class="mb-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
        </div>
        <div class="mb-3">
            <label for="repassword">Repeat password:</label>
            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Repeat password" />
        </div>
        <!-- <div class="form-row">
            <div class="mb-3 col">
                <label for="lat">Latitude:</label>
                <input type="text" class="form-control" id="lat" name="lat" placeholder="Geolocating..." readonly />
            </div>
            <div class="mb-3 col">
                <label for="lng">Longitude:</label>
                <input type="text" class="form-control" id="lng" name="lng" placeholder="Geolocating..." readonly />
            </div>
        </div> -->
        <div class="mb-3">
            <label for="avatar">Avatar image</label>
            <input type="file" class="form-control" id="avatar" name="avatar" />
        </div>
        <!-- <img src="" alt="" id="imgPreview" class="img-thumbnail d-none" />
        <p class="text-danger" id="errorInfo"></p> -->
        <a class="btn btn-secondary" href="/login" role="button">Go back</a>
        <button type="submit" class="btn btn-primary">Create account</button>
    </form>
</div>