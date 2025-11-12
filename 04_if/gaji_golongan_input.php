<!DOCTYPE html>
<html>
<head>
    <title>Hitung Gaji Karyawan Berdasarkan Golongan</title>
</head>
<body>

    <h1>Perhitungan Gaji Karyawan (Golongan)</h1>

    <form method="post" action="gaji_golongan_proses.php">
        <label for="nama">Nama Karyawan:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="golongan">Pilih Golongan:</label>
        <select id="golongan" name="golongan" required>
            <option value="">-- Pilih Golongan --</option>
            <option value="A">Golongan A (Rp 4.000,-/jam)</option>
            <option value="B">Golongan B (Rp 5.000,-/jam)</option>
            <option value="C">Golongan C (Rp 6.000,-/jam)</option>
            <option value="D">Golongan D (Rp 7.500,-/jam)</option>
        </select><br><br>

        <label for="jam_kerja">Jumlah Jam Kerja (1 minggu):</label>
        <input type="number" id="jam_kerja" name="jam_kerja" min="0" required><br><br>

        <input type="submit" name="submit" value="Hitung Gaji">
    </form>

</body>
</html>