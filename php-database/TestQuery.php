<?php

use Config\Database;

require_once __DIR__ . "/Config/Database.php";

$connection = Database::getConnection();

$sql = "SELECT id, name, email FROM customers";

$statement = $connection->query($sql);

foreach ($statement as $row) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];

    echo "id : $id <br>" . PHP_EOL;
    echo "name : $name <br>" . PHP_EOL;
    echo "email : $email <br>" . PHP_EOL;
}
