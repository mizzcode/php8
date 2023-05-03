<?php

use Config\Database;

require_once __DIR__ . "/Config/Database.php";

$connection = Database::getConnection();

$sql = "SELECT username, password FROM admin";

$statement = $connection->query($sql);

// mengambil 1 row data
if ($row = $statement->fetch()) {
    echo "Berhasil Login : " . $row['username'] . PHP_EOL;
} else {
    echo "Gagal Login" . PHP_EOL;
}

var_dump($statement->fetch());

$connection = null;
