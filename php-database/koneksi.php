<?php

$host = 'localhost';
$port = 3306;
$db = 'belajar_php_database';
$username = 'root';
$password = '';

try {
    $koneksi = new PDO("mysql:host=$host:$port;dbname=$db", $username, $password);
    echo "Berhasil koneksi.php" . PHP_EOL;
} catch (PDOException $e) {
    echo "Gagal terkoneksi ke database MySQL : " . $e->getMessage();
}