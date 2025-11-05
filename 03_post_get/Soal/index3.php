<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Soal 3 - Form Pendaftaran Mahasiswa</title>
    <style>
        body { font-family: sans-serif; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea, select {
            width: 300px;
            padding: 5px;
        }
        textarea { height: 80px; }
        .radio-label { font-weight: normal; }
    </style>
</head>
<body>
    <h2>Form Pendaftaran Online Mahasiswa Baru</h2>
    <h3>Universitas Muhammadiyah Kalimantan Timur</h3>

    <form action="pendaftaran.php" method="post">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama_lengkap" required>
        </div>
        <div class="form-group">
            <label for="tempat">Tempat Lahir:</label>
            <input type="text" id="tempat" name="tempat_lahir" required>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir:</label>
            
            <select name="tgl" required>
                <option value="">Tanggal</option>
                <?php
                for ($tgl = 1; $tgl <= 31; $tgl++) {
                    echo "<option value='$tgl'>$tgl</option>";
                }
                ?>
            </select>

            <select name="bln" required>
                <option value="">Bulan</option>
                <?php
                // Array nama bulan untuk tampilan yang lebih baik
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

            <select name="thn" required>
                <option value="">Tahun</option>
                <?php
                // Loop terbalik dari tahun terbaru ke terlama
                for ($thn = 2005; $thn >= 1980; $thn--) {
                    echo "<option value='$thn'>$thn</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Rumah:</label>
            <textarea id="alamat" name="alamat_rumah"></textarea>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <input type="radio" id="pria" name="jenis_kelamin" value="Pria" required>
            <label for="pria" class="radio-label">Pria</label>
            <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita">
            <label for="wanita" class="radio-label">Wanita</label>
        </div>
        <div class="form-group">
            <label for="asal">Asal Sekolah:</label>
            <input type="text" id="asal" name="asal_sekolah" required>
        </div>
        <div class="form-group">
            <label for="uan">Nilai UAN:</label>
            <input type="text" id="uan" name="nilai_uan">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Daftar">
            <input type="reset" value="Reset">
        </div>
    </form>
</body>
</html>