<?php

require_once __DIR__ . "/Config/Database.php";

use Config\Database;

$connection = Database::getConnection();

$sql = "INSERT into customers (id, name, email) VALUES ('2', 'mizz', 'mizz@gmail.com') ";

$connection->exec($sql);
