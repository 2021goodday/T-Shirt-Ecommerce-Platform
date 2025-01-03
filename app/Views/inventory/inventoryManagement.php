<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inventory Management</title>
</head>
<body>
    <h1>Inventory Management</h1>

    <!-- Add Product Button -->
    <a href="/inventory/add">
        <button>Add New Product</button>
    </a>

    <!-- Inventory List Table -->
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
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
                            <form action="/inventory/updateStatus/<?= $product['id'] ?>" method="post">
                                <?= csrf_field() ?> <!-- CSRF protection -->
                                <select name="status" onchange="this.form.submit()">
                                    <option value="1" <?= $product['status'] == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?= $product['status'] == 0 ? 'selected' : '' ?>>Deactivated</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="/inventory/edit/<?= $product['id'] ?>">Edit</a>
                            <a href="/inventory/delete/<?= $product['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No products found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
