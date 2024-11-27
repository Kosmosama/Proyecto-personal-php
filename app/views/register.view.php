<div class="container">
    <?php include __DIR__ . '/show-error.part.php' ?>
    <form action="/check-register" id="form-register" class="mt-4" method="POST" role="form" enctype="multipart/form-data">
        <legend>Create an account</legend>

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
        <div class="mb-3">
            <label for="avatar">Avatar image</label>
            <input type="file" class="form-control" id="avatar" name="avatar" />
        </div>
        <a class="btn btn-secondary" href="/login" role="button">Go back</a>
        <button type="submit" class="btn btn-primary">Create account</button>
    </form>
</div>