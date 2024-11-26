<!DOCTYPE html>
<html>

<head>
    <title>New Event | SVTickets</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="node_modules/ol/ol.css">
    <link rel="stylesheet" href="style.css">
    <script src="src/new-event.ts" type="module"></script>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SVTickets</a>
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="new-event.html">New event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.html">My profile</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <form action="#" class="mt-4" id="newEvent">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                <div class="invalid-feedback">Title is required and can only contain letters and spaces.</div>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date">
                <div class="invalid-feedback">Date is required.</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                <div class="invalid-feedback">Description is required.</div>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price (in €)</label>
                <input type="number" class="form-control" id="price" name="price" min="0.00" step="0.01" />
                <div class="invalid-feedback">Price must be a positive number.</div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <div class="invalid-feedback">An image is required.</div>
            </div>
            <img src="" alt="" id="imgPreview" class="img-thumbnail mb-3 d-none">
            <div id="autocomplete" class="autocomplete-container"></div>
            <div id="map" class="mb-3"></div>
            <div>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</body>

</html>