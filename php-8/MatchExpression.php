<?php

$value = "A";

switch ($value) {
    case "A":
    case "B":
    case "C":
        $result = "Anda Lulus" . PHP_EOL;
        break;
    case "D":
        $result = "Anda Tidak Lulus" . PHP_EOL;
        break;
    case "E":
        $result = "Mungkin anda salah jurusan" . PHP_EOL;
        break;
    default:
        $result = "Nilai tidak diketahui" . PHP_EOL;
}

echo $result;

$result = match ($value) {
    "A", "B", "C" => "ANDA LULUS",
    "D" => "ANDA TIDAK LULUS",
    "E" => "SEPERTINYA ANDA SALAH JURUSAN",
    default => "NILAI APA ITU"
};

echo $result . PHP_EOL;

$value = 70;

$result = match (true) {
    $value >= 80 => "A",
    $value >= 60 => "B",
    $value >= 40 => "C",
    $value >= 20 => "D",
    default => "SALAH JURUSAN"
};

echo "Nilai anda : $result" . PHP_EOL;

$name = 'Mr. MizzKun';

$result = match (true) {
    str_contains($name, 'Mr.') => "Hi Sir",
    str_contains($name, 'Mrs.') => "Hi Mam",
    default => "Hi"
};

echo $result;
