<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tampil Data</title>
</head>

<body>
    <?php include 'index.php' ?>
    <h2 style="text-align: center ;">Data Tersimpan</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Bahan Pokok</th>
            <th>Harga</th>
            <th>Satuan</th>
        </tr>
        <?php
        // Membuka dan membaca file
        $file = 'bahan_pokok.txt';
        $fp = fopen($file, 'r');
        //memerikksa apakah berhasil membaca file
        if ($fp) {
            $no = 1;
            while (($line = fgets($fp)) !== false) {
                // uraikan setiap baris untuk ekstrak data
                // preg_match(pattern, input, matches, flags, offset)
                preg_match('/Nama: (.*), Harga: (.*), Satuan: (.*)/', $line, $matches);
                if (count($matches) == 4) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . htmlspecialchars($matches[1]) . "</td>";
                    echo "<td>Rp. " . htmlspecialchars($matches[2]) . "</td>";
                    echo "<td> / " . htmlspecialchars($matches[3]) . "</td>";
                    echo "</tr>";
                    $no = $no + 1;
                    /* Kenapa matches == 4 padahal yang ditampilkan cuman 3?
            $matches[0] = semua string yang sesuai.
            $matches[1] = substring sesuai terhadap (.*?) (untuk "Nama").
            $matches[2] = substring sesuai terhadap (.*?) (untuk "Harga")..
            $matches[3] = substring sesuai terhadap (.*?) (untuk "Satuan")..
        */
                }
            }
            fclose($fp);
        } else {
            echo "Gagal membuka dan membaca file";
        }
        ?>
    </table>
    <?php include 'footer.php' ?>
</body>

</html>