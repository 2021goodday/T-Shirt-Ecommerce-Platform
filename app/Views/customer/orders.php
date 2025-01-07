<h1>My Orders</h1>
<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Total Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= $order['order_date'] ?></td>
                <td><?= $order['total_price'] ?></td>
                <td><?= $order['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
