<form method="POST">
    <a href="index.php"><button type="button">Back</button></a>

    <h2>Add Item</h2>
    <label>
        Item Name:
        <input type="text" name="item_name" required>
    </label>
    <label>
        Price (£):
        <input type="number" step="0.01" name="item_price" required>
    </label>
    <label>
        Quantity:
        <input type="number" step="1" name="item_stock" required>
    </label>
    <button type="submit">Add Item</button>
</form>

<?php
// TODO: change to save to database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newItemName = $_POST['item_name'];
    $newItemPrice = (float)$_POST['item_price'];
    $newItemStock = (int)$_POST['item_stock'];

    $items[] = ['name' => $newItemName, 'price' => $newItemPrice, 'stock' => $newItemStock];

    echo "<p style='text-align: center; color: green;'>Item added: $newItemName (£" . number_format($newItemPrice, 2) . ")</p>";
}
?>