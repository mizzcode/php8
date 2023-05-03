<?php

use Config\Database;

require_once __DIR__ . "/Config/Database.php";

$connection = Database::getConnection();

$connection->beginTransaction();

$connection->exec("INSERT INTO comments (name, comment) VALUES ('Jani','santai')");
$connection->exec("INSERT INTO comments (name, comment) VALUES ('Jani','santai')");
$connection->exec("INSERT INTO comments (name, comment) VALUES ('Jani','santai')");

$connection->rollBack();

$connection = null;
