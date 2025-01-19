CREATE TABLE sqlite_sequence(name,seq);
CREATE TABLE IF NOT EXISTS "items" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "name" TEXT,
    "price" INTEGER,
    "stock" INTEGER
);
CREATE TABLE IF NOT EXISTS "checkout" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "item_id" INTEGER,
    "amount" INTEGER,
    "total_price" INTEGER
);