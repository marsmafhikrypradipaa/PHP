<!DOCTYPE html>
<html>
<head>
    <title>Hitung Gaji Karyawan</title>
</head>
<body>

    <h1>Perhitungan Gaji Karyawan Honorer</h1>

    <form method="post" action="gaji_proses.php">
        <label for="nama">Nama Karyawan:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="jam_kerja">Jumlah Jam Kerja (1 minggu):</label>
        <input type="number" id="jam_kerja" name="jam_kerja" min="0" required><br><br>

        <input type="submit" name="submit" value="Hitung Gaji">
    </form>

</body>
</html>