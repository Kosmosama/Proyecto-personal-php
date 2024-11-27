<div class="container">
    <?php include __DIR__ . '/show-error.part.view.php' ?>
    <form action="/check-login" id="form-login" class="mt-4" method="POST" role="form">
        <legend>Welcome to SVTickets!</legend>

        <div class="mb-3">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required />
        </div>
        <div class="mb-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
        </div>
        <!-- <p class="text-danger" id="errorInfo"></p> -->
        <a class="btn btn-secondary" href="/register" role="button">Create account</a>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
