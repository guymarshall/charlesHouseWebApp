<?php

require_once 'db.php';
require_once 'utilities.php';

$db = new DB();
$db->init();
$items = $db->getItems();
$totalPrice = $db->getTotalPrice();
$totalStock = $db->getTotalStock();

// TODO: add checkout.php for choosing items from dropdowns, totalling their costs, and removing from database

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
    <a href="add.php"><button type="button">Add new item</button></a>

    <h1 style="text-align: center;">Shop Items</h1>

    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($items)): ?>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']) ?></td>
                        <td><?php echo penceToPounds($item['price']) ?></td>
                        <td><?php echo $item['stock'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align: center">No items to show</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Total</th>
                <th><?php echo penceToPounds($totalPrice) ?></th>
                <th><?php echo $totalStock ?></th>
            </tr>
        </tfoot>
    </table>
</body>

</html>