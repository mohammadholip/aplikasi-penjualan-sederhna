<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Input Data</title>
</head>

<body>
    <?php include 'index.php' ?>
    <section>
        <diV class="form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="nama">Nama Bahan Pokok :</label>
                <input type="text" id="nama" name="nama[]" required><br><br>
                <label for="harga">Harga :</label>
                <input type="number" id="harga" name="harga[]" required>
                <select id="satuan" name="satuan[]" required>
                    <option value="kg">/ Kg</option>
                    <option value="liter">/ Liter</option>
                    <option value="dos">/ Dos</option>
                    <option value="bungkus">/ Bungkus</option>
                </select><br><br>
                <input type="submit" value="Simpan">
            </form>
        </diV>
    </section>
    <?php
    // Memeriksa apakah data diterima
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ekstrak form data
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $satuan = $_POST['satuan'];

        // Menyimpan data ke file txt
        $file = 'bahan_pokok.txt';
        $data = '';
        //menghitung jumlah masukkan dari $nama
        $jumlah = count($nama);

        for ($i = 0; $i < $jumlah; $i++) {
            $data .= "Nama: " . $nama[$i] . ", Harga: " . $harga[$i] . ", Satuan: " . $satuan[$i] . "\n";
        }
        //Menggabungkan data ke file txt
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
        echo "<h3>Data Berhasil Ditambahkan</h3>";
    }
    ?>
    <?php include 'footer.php' ?>
</body>

</html>