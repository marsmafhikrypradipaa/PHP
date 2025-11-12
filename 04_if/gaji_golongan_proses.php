<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan Gaji Golongan</title>
</head>
<body>

    <h1>Hasil Perhitungan Gaji Berdasarkan Golongan</h1>

    <?php
    if (isset($_POST['submit'])) {
        // Konstanta dan Aturan
        define("UPAH_LEMBUR", 3000);
        define("JAM_NORMAL_MAKS", 48);

        // Data Upah Normal berdasarkan Golongan
        $upah_per_jam_normal = [
            "A" => 4000,
            "B" => 5000,
            "C" => 6000,
            "D" => 7500
        ];

        // Ambil data dari form
        $nama = htmlspecialchars($_POST['nama']);
        $golongan = strtoupper($_POST['golongan']);
        $total_jam_kerja = (int)$_POST['jam_kerja'];
        
        $upah_normal_jam = 0;
        $jam_lembur = 0;
        $gaji_pokok = 0;
        $gaji_lembur = 0;
        $total_gaji = 0;

        // 1. Tentukan Upah Normal
        if (array_key_exists($golongan, $upah_per_jam_normal)) {
            $upah_normal_jam = $upah_per_jam_normal[$golongan];
        } else {
            // Penanganan jika golongan tidak valid (seharusnya tidak terjadi jika menggunakan combo box)
            die("<p>Golongan karyawan tidak valid.</p>");
        }

        // 2. Logika Perhitungan Gaji
        if ($total_jam_kerja <= JAM_NORMAL_MAKS) {
            // TIDAK ADA LEMBUR
            $jam_normal = $total_jam_kerja;
            $gaji_pokok = $jam_normal * $upah_normal_jam;
            $total_gaji = $gaji_pokok;
            
        } else {
            // ADA LEMBUR
            $jam_normal = JAM_NORMAL_MAKS;
            $jam_lembur = $total_jam_kerja - JAM_NORMAL_MAKS;
            
            // Hitung Gaji Pokok (48 jam pertama)
            $gaji_pokok = $jam_normal * $upah_normal_jam;
            
            // Hitung Gaji Lembur
            $gaji_lembur = $jam_lembur * UPAH_LEMBUR;
            
            // Hitung Total Gaji
            $total_gaji = $gaji_pokok + $gaji_lembur;
        }

        // --- 3. Tampilkan Hasil ---
        echo "<p><strong>Nama Karyawan:</strong> $nama</p>";
        echo "<p><strong>Golongan:</strong> $golongan</p>";
        echo "<p><strong>Upah Normal per Jam:</strong> Rp " . number_format($upah_normal_jam) . ",-</p>";
        echo "<p><strong>Total Jam Kerja:</strong> $total_jam_kerja jam</p>";
        echo "<hr>";
        
        echo "<h3>Detail Perhitungan Upah:</h3>";
        echo "<ul>";
        echo "<li>Upah Jam Normal (".($total_jam_kerja <= 48 ? $total_jam_kerja : 48)." jam) = **Rp ".number_format($gaji_pokok).",-**</li>";

        if ($jam_lembur > 0) {
            echo "<li>Upah Jam Lembur ($jam_lembur jam @ Rp ".number_format(UPAH_LEMBUR).") = **Rp ".number_format($gaji_lembur).",-**</li>";
        } else {
            echo "<li>Upah Jam Lembur = **Rp 0,-**</li>";
        }
        echo "</ul>";
        
        echo "<h2>Total Upah yang Diperoleh: Rp ".number_format($total_gaji).",-</h2>";

    } else {
        echo "<p>Silakan masukkan data karyawan melalui form input.</p>";
    }
    ?>

    <p><a href="gaji_golongan_input.php">Kembali ke Form Input</a></p>

</body>
</html>