<?php

class DB
{
    private $db;

    public function __construct()
    {
        $this->db = new SQLite3('shop.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
    }

    public function init()
    {
        $this->db->enableExceptions(true);

        $this->db->query('CREATE TABLE IF NOT EXISTS "items" (
            "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            "name" TEXT,
            "price" INTEGER,
            "stock" INTEGER
        )');
    }

    public function getItems()
    {
        $statement = $this->db->prepare('SELECT * FROM "items"');
        $result = $statement->execute();

        $items = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $items[] = $row;
        }

        return $items;
    }

    public function getTotalPrice()
    {
        $statement = $this->db->prepare('SELECT SUM(price) FROM items');
        $result = $statement->execute();

        return $result->fetchArray(SQLITE3_NUM)[0];
    }

    public function getTotalStock()
    {
        $statement = $this->db->prepare('SELECT SUM(stock) FROM items');
        $result = $statement->execute();

        return $result->fetchArray(SQLITE3_NUM)[0];
    }

    public function insert(array $item): void
    {
        if (!isset($item['name'], $item['price'], $item['stock'])) {
            throw new InvalidArgumentException('Missing required fields in $item array.');
        }

        $statement = $this->db->prepare('INSERT INTO items (name, price, stock) VALUES (:name, :price, :stock)');
        $statement->bindValue(':name', $item['name']);
        $statement->bindValue(':price', $item['price']);
        $statement->bindValue(':stock', $item['stock']);

        try {
            $statement->execute();
        } catch (Exception $exception) {
            die('Failed to add items: ' . $exception->getMessage());
        }
    }
}
