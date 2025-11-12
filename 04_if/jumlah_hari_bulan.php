<!DOCTYPE html>
<html>
<head>
    <title>Jumlah Hari Dalam Bulan (SWITCH)</title>
</head>
<body>

    <h1>Menentukan Jumlah Hari Dalam Bulan Saat Ini</h1>

    <?php
    // Mendapatkan tanggal saat ini
    $tanggal_saat_ini = time();
    
    // Mendapatkan nomor bulan saat ini (1-12)
    $bulan = date('n', $tanggal_saat_ini);
    
    // Mendapatkan tahun saat ini
    $tahun = date('Y', $tanggal_saat_ini);
    
    $nama_bulan = "";
    $jumlah_hari = 0;
    
    // Fungsi untuk mengecek tahun kabisat (diperlukan untuk Februari)
    function is_kabisat($year) {
        // Aturan kabisat: habis dibagi 4 TAPI tidak habis dibagi 100, ATAU habis dibagi 400
        return (($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0);
    }

    // Menggunakan SWITCH untuk menentukan nama bulan dan jumlah hari
    switch ($bulan) {
        case 1:
            $nama_bulan = "Januari";
            $jumlah_hari = 31;
            break;
        case 2:
            $nama_bulan = "Februari";
            // Cek apakah tahun saat ini adalah tahun kabisat
            if (is_kabisat($tahun)) {
                $jumlah_hari = 29;
                $catatan = " (Tahun Kabisat)";
            } else {
                $jumlah_hari = 28;
                $catatan = " (Tahun Non-Kabisat)";
            }
            break;
        case 3:
            $nama_bulan = "Maret";
            $jumlah_hari = 31;
            break;
        case 4:
            $nama_bulan = "April";
            $jumlah_hari = 30;
            break;
        case 5:
            $nama_bulan = "Mei";
            $jumlah_hari = 31;
            break;
        case 6:
            $nama_bulan = "Juni";
            $jumlah_hari = 30;
            break;
        case 7:
            $nama_bulan = "Juli";
            $jumlah_hari = 31;
            break;
        case 8:
            $nama_bulan = "Agustus";
            $jumlah_hari = 31;
            break;
        case 9:
            $nama_bulan = "September";
            $jumlah_hari = 30;
            break;
        case 10:
            $nama_bulan = "Oktober";
            $jumlah_hari = 31;
            break;
        case 11:
            $nama_bulan = "November";
            $jumlah_hari = 30;
            break;
        case 12:
            $nama_bulan = "Desember";
            $jumlah_hari = 31;
            break;
        default:
            $nama_bulan = "Tidak Dikenal";
            $jumlah_hari = "N/A";
            break;
    }

    // Tampilkan hasil
    echo "<p>Tanggal saat ini: **" . date('d-m-Y') . "**</p>";
    echo "<p>Bulan yang dibaca adalah: **$nama_bulan**</p>";
    echo "<hr>";
    
    // Tampilkan jumlah hari dengan keterangan tambahan (jika Februari)
    if ($bulan == 2) {
         echo "<h2>Jumlah hari di bulan $nama_bulan tahun $tahun adalah **$jumlah_hari hari**$catatan.</h2>";
    } else {
         echo "<h2>Jumlah hari di bulan $nama_bulan adalah **$jumlah_hari hari**.</h2>";
    }
    
    // Catatan: Ini adalah cara menggunakan SWITCH untuk memenuhi persyaratan soal.
    // Namun, dalam praktik nyata PHP, lebih baik menggunakan fungsi 'cal_days_in_month()' atau 'date('t')'.
    ?>

</body>
</html>