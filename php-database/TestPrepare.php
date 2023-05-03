<?php

require_once __DIR__ . "/Config/Database.php";

use Config\Database;

$connection = Database::getConnection();

$username = "mizzkun";
$password = "janichan";

$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";

$statement = $connection->prepare($sql);

$statement->bindParam("username", $username);
$statement->bindParam("password", $password);
$statement->execute();


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
