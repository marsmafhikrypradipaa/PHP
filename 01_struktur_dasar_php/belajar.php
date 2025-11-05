<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Ini menggunakan php</h1>
    <?php

echo "<h3>Belajar Tipe Data</h3>";

$kalimat = "Saya sedang belajar PHP";
$tahun = 2025;
$nilai = 95.5;
$apakah_aktif = true;

echo "Isi variabel \$kalimat: $kalimat <br>";
var_dump($kalimat);
echo "<hr>";

echo "Isi variabel \$tahun: $tahun <br>";
var_dump($tahun);
echo "<hr>";

echo "Isi variabel \$nilai: $nilai <br>";
var_dump($nilai);
echo "<hr>";

echo "Isi variabel \$apakah_aktif: <br>";
var_dump($apakah_aktif);
echo "<hr>";

?>


</body>
</html>