<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Perhitungan Pecahan</title>
    <style>
        body { font-family: sans-serif; }
        table { border-collapse: collapse; width: 300px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Rincian Pecahan Uang</h2>

    <?php
    if (isset($_POST['submit'])) {
        
        // 1. Ambil jumlah uang sebagai integer
        $totalUang = (int)$_POST['jumlah_uang'];
        echo "<p>Total Uang yang Dihitung: <strong>Rp " . number_format($totalUang) . "</strong></p>";

        // 2. Definisikan pecahan uang yang tersedia (sesuai soal)
        $daftarPecahan = [100000, 50000, 20000, 5000, 100, 50];
        
        // Siapkan variabel sisa uang
        $sisaUang = $totalUang;

        echo "<table>";
        echo "<tr><th>Pecahan</th><th>Banyaknya (Lembar/Koin)</th></tr>";

        // 3. Loop melalui setiap pecahan
        foreach ($daftarPecahan as $pecahan) {
            
            // Hitung berapa lembar/koin yang didapat untuk pecahan ini
            // floor() untuk membulatkan ke bawah
            $banyaknya = floor($sisaUang / $pecahan);
            
            // Tampilkan hanya jika jumlahnya lebih dari 0
            if ($banyaknya > 0) {
                echo "<tr>";
                echo "<td>Rp " . number_format($pecahan) . "</td>";
                echo "<td>" . $banyaknya . "</td>";
                echo "</tr>";
                
                // 4. Kurangi sisa uang dengan jumlah yang sudah dihitung
                // Operator modulo (%) adalah cara cepat untuk mendapatkan sisa pembagian
                $sisaUang = $sisaUang % $pecahan;
            }
        }
        
        echo "</table>";

        // Tampilkan jika ada sisa uang yang tidak bisa dipecah
        if ($sisaUang > 0) {
            echo "<p><strong>Sisa uang tidak terhitung: Rp " . number_format($sisaUang) . "</strong></p>";
        }

    } else {
        echo "<p>Silakan isi form terlebih dahulu.</p>";
    }
    ?>
    <br>
    <a href="soal2.html">Kembali ke Form</a>
</body>
</html>