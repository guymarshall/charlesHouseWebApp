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
require_once 'db.php';

$db = new DB();
$db->init();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

$newItem = [
    'name' => $_POST['item_name'],
    'price' => (int)$_POST['item_price'],
    'stock' => (int)$_POST['item_stock'],
];

$db->insert($newItem);

header('Location: index.php');
exit;
