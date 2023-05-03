<?php

use Config\Database;

require_once __DIR__ . "/Config/Database.php";

$connection = Database::getConnection();

$connection->exec("INSERT INTO comments (name,comment) VALUES ('Mizz', 'santai dulu gak sih')");

$id = $connection->lastInsertId();

echo $id . PHP_EOL;


$connection = null;
