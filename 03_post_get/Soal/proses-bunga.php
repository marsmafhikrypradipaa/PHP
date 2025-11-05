<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Perhitungan Saldo</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .hasil { border: 1px solid #ccc; padding: 20px; max-width: 500px; }
    </style>
</head>
<body>
    <h2>Hasil Perhitungan Saldo Akhir</h2>

    <?php
    // Memeriksa apakah form sudah disubmit
    if (isset($_POST['submit'])) {
        
        // 1. Ambil dan bersihkan data input
        // Kita gunakan (float) untuk mengubah input menjadi angka desimal
        $modalAwal = (float)$_POST['saldo_awal'];
        $bungaPersen = (float)$_POST['bunga_bulanan'];
        $durasiBulan = (int)$_POST['lama_bulan'];

        // 2. Hitung bunga
        // Ubah persentase bunga (misal 0.25%) menjadi desimal (0.0025)
        $bungaDesimal = $bungaPersen / 100;
        
        // 3. Gunakan rumus bunga majemuk:
        // Saldo Akhir = Saldo Awal * (1 + bunga)^durasi
        $saldoAkhir = $modalAwal * pow((1 + $bungaDesimal), $durasiBulan);

        // 4. Tampilkan hasil dengan format yang rapi
        echo "<div class='hasil'>";
        echo "<p>Saldo Awal Anda: <strong>Rp " . number_format($modalAwal, 2, ',', '.') . "</strong></p>";
        echo "<p>Bunga Perbulan: <strong>" . $bungaPersen . " %</strong></p>";
        echo "<p>Selama: <strong>" . $durasiBulan . " bulan</strong></p>";
        echo "<hr>";
        echo "<h3>Saldo Akhir Anda setelah " . $durasiBulan . " bulan adalah:</h3>";
        echo "<h2>Rp " . number_format($saldoAkhir, 2, ',', '.') . "</h2>";
        echo "</div>";

    } else {
        echo "<p>Silakan isi form terlebih dahulu.</p>";
    }
    ?>
    <br>
    <a href="soal1.html">Kembali ke Form</a>
</body>
</html>