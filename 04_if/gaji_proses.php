<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan Gaji</title>
</head>
<body>

    <h1>Hasil Perhitungan Gaji</h1>

    <?php
    if (isset($_POST['submit'])) {
        // Konstanta Upah
        define("UPAH_NORMAL", 2000);
        define("UPAH_LEMBUR", 3000);
        define("JAM_NORMAL_MAKS", 48);

        // Ambil data dari form
        $nama = htmlspecialchars($_POST['nama']);
        $total_jam_kerja = (int)$_POST['jam_kerja'];
        
        $jam_lembur = 0;
        $gaji_pokok = 0;
        $gaji_lembur = 0;
        $total_gaji = 0;

        // --- Logika Perhitungan ---
        if ($total_jam_kerja <= JAM_NORMAL_MAKS) {
            // TIDAK ADA LEMBUR
            $gaji_pokok = $total_jam_kerja * UPAH_NORMAL;
            $total_gaji = $gaji_pokok;
            
        } else {
            // ADA LEMBUR
            $jam_normal = JAM_NORMAL_MAKS;
            $jam_lembur = $total_jam_kerja - JAM_NORMAL_MAKS;
            
            // Gaji Pokok (48 jam pertama)
            $gaji_pokok = $jam_normal * UPAH_NORMAL;
            
            // Gaji Lembur
            $gaji_lembur = $jam_lembur * UPAH_LEMBUR;
            
            // Total Gaji
            $total_gaji = $gaji_pokok + $gaji_lembur;
        }

        // --- Tampilkan Hasil ---
        echo "<p><strong>Nama Karyawan:</strong> $nama</p>";
        echo "<p><strong>Total Jam Kerja:</strong> $total_jam_kerja jam</p>";
        echo "<hr>";
        
        echo "<h3>Detail Perhitungan Upah:</h3>";
        echo "<ul>";
        echo "<li>Upah Jam Normal (".($total_jam_kerja <= 48 ? $total_jam_kerja : 48)." jam @ Rp ".number_format(UPAH_NORMAL).") = **Rp ".number_format($gaji_pokok).",-**</li>";

        if ($jam_lembur > 0) {
            echo "<li>Upah Jam Lembur ($jam_lembur jam @ Rp ".number_format(UPAH_LEMBUR).") = **Rp ".number_format($gaji_lembur).",-**</li>";
        } else {
            echo "<li>Upah Jam Lembur = **Rp 0,-**</li>";
        }
        echo "</ul>";
        
        echo "<h2>Total Upah yang Diterima: Rp ".number_format($total_gaji).",-</h2>";

    } else {
        echo "<p>Silakan masukkan data jam kerja melalui form input.</p>";
    }
    ?>

    <p><a href="gaji_input.php">Kembali ke Form Input</a></p>

</body>
</html>