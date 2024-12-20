<div class="container">
    <?php include __DIR__ . '/show-error.part.php' ?>
    <form action="/add-event" method="POST" class="mt-4" id="newEvent" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label">Title</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Enter title">
            <div class="invalid-feedback">Title is required and can only contain letters and spaces.</div>
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
        <div>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>