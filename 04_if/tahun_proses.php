<!DOCTYPE html>
<html>
<head>
    <title>Hasil Cek Tahun Kabisat</title>
</head>
<body>

    <h1>Hasil Pengecekan Tahun Kabisat</h1>

    <?php
    // Pastikan form sudah disubmit
    if (isset($_POST['submit'])) {
        // Ambil nilai tahun dari form
        $tahun = $_POST['tahun'];

        // Cek apakah input adalah angka
        if (!is_numeric($tahun) || $tahun < 1) {
            $hasil = "Tahun tidak valid. Silakan masukkan angka tahun yang benar.";
            $is_kabisat = false;
        } else {
            // Logika Penentuan Tahun Kabisat
            // Aturan: (tahun habis dibagi 4 DAN tidak habis dibagi 100) ATAU (tahun habis dibagi 400)
            if (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0)) {
                $status = "termasuk **Tahun Kabisat**.";
                $is_kabisat = true;
            } else {
                $status = "bukan Tahun Kabisat.";
                $is_kabisat = false;
            }

            // Tampilkan hasil
            echo "<p>Tahun yang Anda masukkan adalah: **$tahun**</p>";
            echo "<h2>Tahun $tahun $status</h2>";
        }
    } else {
        // Jika file diakses langsung tanpa submit form
        echo "<p>Silakan masukkan tahun melalui form di halaman sebelumnya.</p>";
    }
    ?>

    <p><a href="tahun_input.php">Kembali ke Form Input</a></p>

</body>
</html>