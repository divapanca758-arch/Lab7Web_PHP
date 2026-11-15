<?php
$data = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semester = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    if ($nama === "") {
        $error[] = "Nama wajib diisi.";
    }

    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    }

    if ($prodi === "") {
        $error[] = "Program studi wajib diisi.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email tidak valid.";
    }

    if (
        !ctype_digit((string)$semester) ||
        (int)$semester < 1 ||
        (int)$semester > 14
    ) {
        $error[] = "Semester harus angka 1-14.";
    }

    if (!$error) {
        $data = [
            "nama" => $nama,
            "nim" => $nim,
            "prodi" => $prodi,
            "semester" => $semester,
            "email" => $email
        ];
    }
}
?>

<h2>Formulir Data Mahasiswa</h2>

<form method="POST">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>
    <br><br>

    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" required>
    <br><br>

    <label for="prodi">Program Studi:</label>
    <input type="text" id="prodi" name="prodi" required>
    <br><br>

    <label for="semester">Semester:</label>
    <input type="number" id="semester" name="semester" min="1"
           max="14" required>
    <br><br>

    <laber for="email">Email:</label>
    <input type="email" id=""name="email" required>
    <br><br>

    <button type="submit">Kirim Data</button>
</form>

<?php
if ($error) {
    echo "<h3>Terjadi Kesalahan</h3>";

    foreach ($error as $pesan) {
        echo htmlspecialchars($pesan) . "<br>";
    }
}

if ($data) {
    echo "<h3>Data Mahasiswa Diterima</h3>";

    foreach ($data as $label => $isi) {
        echo htmlspecialchars($label) . ": " .
             htmlspecialchars((string)$isi) . "<br>";
    }
}
?>
