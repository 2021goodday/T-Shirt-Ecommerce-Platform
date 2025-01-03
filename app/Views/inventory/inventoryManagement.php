<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS (Optional for further customization) -->
    <link rel="stylesheet" href="<?= base_url('css/inventory-style.css') ?>">
    <link rel="stylesheet" href="/ecommerce/public/css/navbar-style.css">
</head>

<body>
<header>
        <?php include(APPPATH . 'Views/shared/navbar.php'); ?>
    </header>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Inventory Management</h1>

        <!-- Add Product Button -->
        <div class="d-flex justify-content-end mb-3">
            <a href="<?= base_url('inventory/add') ?>" class="btn btn-primary">Add New Product</a>
        </div>

        <!-- Inventory List Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products) && is_array($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= esc($product['id']) ?></td>
                                <td><?= esc($product['name']) ?></td>
                                <td><?= esc($product['description']) ?></td>
                                <td><?= esc($product['category']) ?></td>
                                <td><?= esc($product['price']) ?></td>
                                <td><?= esc($product['stock']) ?></td>
                                <td>
                                    <!-- Status Update Form -->
                                    <form action="<?= base_url('inventory/updateStatus/' . $product['id']) ?>" method="post">
                                        <?= csrf_field() ?> <!-- CSRF protection -->
                                        <select class="form-select" name="status" onchange="this.form.submit()">
                                            <option value="1" <?= $product['status'] == 1 ? 'selected' : '' ?>>Active</option>
                                            <option value="0" <?= $product['status'] == 0 ? 'selected' : '' ?>>Deactivated</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <a href="<?= base_url('inventory/edit/' . $product['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= base_url('inventory/delete/' . $product['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">No products found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
