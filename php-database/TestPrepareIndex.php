<?php

require_once __DIR__ . "/Config/Database.php";

use Config\Database;

$connection = Database::getConnection();

$username = "mizzkun";
$password = "janichan";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";

$statement = $connection->prepare($sql);
$statement->execute([$username, $password]);


$sukses = false;
$user = null;

foreach ($statement as $row) {
    // sukses
    $sukses = true;
    $user = $row["username"];
}

if ($sukses) {
    echo "Selamat datang $user !" . PHP_EOL;
} else {
    echo "Username atau Password salah" . PHP_EOL;
}



$connection = null;
