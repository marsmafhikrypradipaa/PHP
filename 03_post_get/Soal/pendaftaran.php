<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Output Pendaftaran</title>
    <style>
        body { font-family: sans-serif; }
        .output-wrapper {
            border: 1px solid #000;
            padding: 10px 25px;
            max-width: 600px;
            background-color: #f9f9f9;
        }
        table { width: 100%; }<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Mahasiswa Baru</title>
    <style>
        /* CSS Sederhana untuk merapikan form */
        body { font-family: sans-serif; margin: 20px; }
        h2, h3 { margin: 5px 0; }
        form { border: 1px solid #ccc; padding: 20px; max-width: 500px; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 8px; }
        td:first-child { width: 120px; vertical-align: top; } /* Label */
        td:nth-child(2) { width: 10px; vertical-align: top; } /* Titik dua */
        input[type="text"], textarea, select {
            width: 95%;
            padding: 5px;
        }
        textarea { height: 60px; }
    </style>
</head>
<body>
    <h2>Form Pendaftaran Online Mahasiswa Baru</h2>
    <h3>Universitas X</h3>

    <form action="proses_pendaftaran.php" method="post">
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama_lengkap" required></td>
            </tr>
            
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><input type="text" name="tempat_lahir" required></td>
            </tr>
            
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>
                    <select name="tgl" required style="width: 30%;">
                        <option value="">Tgl</option>
                        <?php
                        for ($tgl = 1; $tgl <= 31; $tgl++) {
                            echo "<option value='$tgl'>$tgl</option>";
                        }
                        ?>
                    </select>

                    <select name="bln" required style="width: 40%;">
                        <option value="">Bulan</option>
                        <?php
                        $bulan = [
                            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                        ];
                        foreach ($bulan as $angka => $nama) {
                            echo "<option value='$angka'>$nama</option>";
                        }
                        ?>
                    </select>

                    <select name="thn" required style="width: 25%;">
                        <option value="">Tahun</option>
                        <?php
                        for ($thn = 2005; $thn >= 1980; $thn--) {
                            echo "<option value='$thn'>$thn</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Alamat Rumah</td>
                <td>:</td>
                <td><textarea name="alamat_rumah"></textarea></td>
            </tr>
            
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="Pria" required> Pria
                    <input type="radio" name="jenis_kelamin" value="Wanita"> Wanita
                </td>
            </tr>
            
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td><input type="text" name="asal_sekolah" required></td>
            </tr>
            
            <tr>
                <td>Nilai UAN</td>
                <td>:</td>
                <td><input type="text" name="nilai_uan"></td>
            </tr>
            
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Daftar">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
        td:first-child { width: 150px; font-weight: bold; }
    </style>
</head>
<body>

    <?php
    // Memeriksa apakah form sudah disubmit
    if (isset($_POST['submit'])) {

        // 1. Ambil semua data dari form.
        // Gunakan htmlspecialchars() untuk mengamankan output
        $nama = htmlspecialchars($_POST['nama_lengkap']);
        $tempat = htmlspecialchars($_POST['tempat_lahir']);
        
        // Gabungkan data tanggal
        $tgl = htmlspecialchars($_POST['tgl']);
        $bln = htmlspecialchars($_POST['bln']);
        $thn = htmlspecialchars($_POST['thn']);
        $tanggal_lahir = "$tgl-$bln-$thn";

        $alamat = htmlspecialchars($_POST['alamat_rumah']);
        
        // Cek jenis kelamin (radio button)
        $jk = isset($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : 'Tidak diisi';
        
        $sekolah = htmlspecialchars($_POST['asal_sekolah']);
        $uan = htmlspecialchars($_POST['nilai_uan']);

        // 2. Tampilkan output sesuai format
        echo "<div class='output-wrapper'>";
        
        echo "<h3>Terimakasih <strong>" . $nama . "</strong> sudah mengisi form pendaftaran.</h3>";
        echo "<hr>";
        echo "<p>Data Anda yang telah tersimpan:</p>";
        
        echo "<table>";
        echo "<tr><td>Nama Lengkap</td><td>: " . $nama . "</td></tr>";
        echo "<tr><td>Tempat Lahir</td><td>: " . $tempat . "</td></tr>";
        echo "<tr><td>Tanggal Lahir</td><td>: " . $tanggal_lahir . "</td></tr>";
        echo "<tr><td>Alamat Rumah</td><td>: " . $alamat . "</td></tr>";
        echo "<tr><td>Jenis Kelamin</td><td>: " . $jk . "</td></tr>";
        echo "<tr><td>Asal Sekolah</td><td>: " . $sekolah . "</td></tr>";
        echo "<tr><td>Nilai UAN</td><td>: " . $uan . "</td></tr>";
        echo "</table>";

        echo "</div>";

    } else {
        echo "<p>Form belum disubmit.</p>";
    }
    ?>
</body>
</html>