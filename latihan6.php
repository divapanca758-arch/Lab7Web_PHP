<form method="POST" action="">
    <label for="nama:">Nama:</label>
    <input type="text" id="nama:"name="nama" required>

    <br><br>

    <label for="program_studi:">Program Studi:</label>
    <input type="text" id="program_studi:"name="prodi" required>

    <br><br>

    <button type="submit" name="kirim">
        Kirim Data
    </button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");

    if ($nama === "" || $prodi === "") {
        echo "Semua kolom wajib diisi.";
    } else {
        echo "<h3>Data diterima</h3>";
        echo "Nama: " .
        htmlspecialchars($nama) . "<br>";

        echo "Program Studi: " .
        htmlspecialchars($prodi);
    }
}
