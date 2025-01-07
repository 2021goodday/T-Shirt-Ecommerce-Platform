<h1>Orders</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Order Date</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= $order['customer_id'] ?></td>
                <td><?= $order['order_date'] ?></td>
                <td><?= $order['total_price'] ?></td>
                <td><?= $order['status'] ?></td>
                <td>
                    <form action="<?= base_url('admin/orders/updateStatus/' . $order['id']) ?>" method="post">
                        <select name="status">
                            <option <?= $order['status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
                            <option <?= $order['status'] === 'Processing' ? 'selected' : '' ?>>Processing</option>
                            <option <?= $order['status'] === 'Shipped' ? 'selected' : '' ?>>Shipped</option>
                            <option <?= $order['status'] === 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                            <option <?= $order['status'] === 'Canceled' ? 'selected' : '' ?>>Canceled</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
