<?php

use Config\Database;

require_once __DIR__ . "/Config/Database.php";

$connection = Database::getConnection();

$sql = "SELECT id, name, email FROM customers";

$statement = $connection->query($sql);

var_dump($statement->fetchAll());

$connection = null;
