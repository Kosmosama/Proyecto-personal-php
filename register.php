<!DOCTYPE html>
<html>

<head>
    <title>Register | SVTickets</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <script src="src/register.ts" type="module"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">FoodScore</a>
        </div>
    </nav>

    <div class="container">
        <form action="#" id="form-register" class="mt-4" method="POST" role="form">
            <legend>Create an account</legend>

            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="nameUser" placeholder="Name" />
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
            </div>
            <div class="mb-3">
                <label for="email2">Repeat Email:</label>
                <input type="email" class="form-control" id="email2" name="email2" placeholder="Email" />
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
            </div>
            <div class="form-row">
                <div class="mb-3 col">
                    <label for="lat">Latitude:</label>
                    <input type="text" class="form-control" id="lat" name="lat" placeholder="Geolocating..." readonly />
                </div>
                <div class="mb-3 col">
                    <label for="lng">Longitude:</label>
                    <input type="text" class="form-control" id="lng" name="lng" placeholder="Geolocating..." readonly />
                </div>
            </div>
            <div class="mb-3">
                <label for="avatar">Avatar image</label>
                <input type="file" class="form-control" id="photo" name="photo" />
            </div>
            <img src="" alt="" id="imgPreview" class="img-thumbnail d-none" />
            <p class="text-danger" id="errorInfo"></p>
            <a class="btn btn-secondary" href="login.html" role="button">Go back</a>
            <button type="submit" class="btn btn-primary">Create account</button>
        </form>
    </div>
</body>

</html>