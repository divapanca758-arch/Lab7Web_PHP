<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $barang = trim($_POST["barang"] ?? "");
    $hargaInput = $_POST["harga"] ?? "";
    $jumlahInput = $_POST["jumlah"] ?? "";

    if (
        $barang === "" ||
        !is_numeric($hargaInput) ||
        !ctype_digit((string)$jumlahInput) ||
        (float)$hargaInput < 0 ||
        (int)$jumlahInput < 1
    ) {
        $error = "Periksa kembali data barang.";
    } else {
        $harga = (float)$hargaInput;
        $jumlah = (int)$jumlahInput;
        $subtotal = $harga * $jumlah;
    }
}
?>

<form method="POST">
    <label for="nama_barang:">Nama Barang:</label>
    <input name="barang" id="nama_barang:"required>

    <br><br>

    <label for="harga:">Harga:</label>
    <input name="harga" id="harga:" type="number"
           min="0" step="0.01" required>

    <br><br>

    <label for="jumlah:">Jumlah:</label>
    <input name="jumlah" id="jumlah:" type="number"
           min="1" step="1" required>

    <br><br>

    <button type="submit">Hitung</button>
</form>

<?php
if (isset($error)) {
    echo "<p>" . htmlspecialchars($error) . "</p>";
} elseif (isset($subtotal)) {
    echo "<h3>Hasil Transaksi</h3>";
    echo "Barang: " . htmlspecialchars($barang) . "<br>";
    echo "Subtotal: Rp" .
         number_format($subtotal, 0, ",", ".");
}
?>
