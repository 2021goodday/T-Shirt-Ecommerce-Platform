<form action="/inventory/edit/<?= $product['id'] ?>" method="post">
    <!-- Other fields -->
    
    <label for="status">Status:</label>
    <select name="status">
        <option value="1" <?= $product['status'] == 1 ? 'selected' : '' ?>>Active</option>
        <option value="0" <?= $product['status'] == 0 ? 'selected' : '' ?>>Deactivated</option>
    </select>
    
    <button type="submit">Update Product</button>
</form>
