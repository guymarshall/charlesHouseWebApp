<?php
// TODO: change to database lookup
$items = [
    ['name' => 'Apple', 'price' => 1.50, 'stock' => 5],
    ['name' => 'Banana', 'price' => 0.75, 'stock' => 0],
    ['name' => 'Milk', 'price' => 2.30, 'stock' => 2],
    ['name' => 'Bread', 'price' => 1.80, 'stock' => 2],
];

$totalPrice = array_reduce($items, function ($carry, $item) {
    return $carry + $item['price'];
}, 0);

$totalStock = array_reduce($items, function ($carry, $item) {
    return $carry + $item['stock'];
}, 0);
?>

<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Item List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 style="text-align: center;">Shop Items</h1>

    <a href="add.php"><button type="button">Add new item</button></a>

    <table>
        <thead>
        <tr>
            <th>Item Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td>£<?= number_format($item['price'], 2) ?></td>
                <td><?= $item['stock'] ?></td> <!-- TODO: add increment/decrement buttons to change stock -->
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th>Total</th>
            <th>£<?= number_format($totalPrice, 2) ?></th>
            <th><?= $totalStock ?></th>
        </tr>
        </tfoot>
    </table>
</body>
</html>