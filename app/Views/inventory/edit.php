<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS (Optional for further customization) -->
    <link rel="stylesheet" href="<?= base_url('css/inventory-style.css') ?>">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Product</h1>

        <!-- Edit Product Form -->
        <form action="<?= base_url('inventory/edit/' . $product['id']) ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <?= csrf_field() ?> <!-- CSRF protection -->

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= esc($product['name']) ?>" required>
                <div class="invalid-feedback">Please enter the product name.</div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?= esc($product['description']) ?></textarea>
                <div class="invalid-feedback">Please provide a description.</div>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?= esc($product['category']) ?>" required>
                <div class="invalid-feedback">Please enter a category.</div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= esc($product['price']) ?>" step="0.01" required>
                <div class="invalid-feedback">Please enter the price.</div>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?= esc($product['stock']) ?>" required>
                <div class="invalid-feedback">Please enter the stock quantity.</div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <div class="form-text">Leave blank to keep the current image.</div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="1" <?= $product['status'] == 1 ? 'selected' : '' ?>>Active</option>
                    <option value="0" <?= $product['status'] == 0 ? 'selected' : '' ?>>Deactivated</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="<?= base_url('inventory') ?>" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS for Form Validation -->
    <script>
        // Bootstrap form validation
        (function () {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>
