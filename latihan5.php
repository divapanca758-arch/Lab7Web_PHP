<form method="GET" action="">
    <label for="kata_kunci">Kata kunci:</label>
    <input type="text" id="kata_kunci" name="kata">
    <button type="submit">Cari</button>
</form>

<?php
if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);

    echo "Kata kunci: " .
    htmlspecialchars($kata, ENT_QUOTES, "UTF-8");
}
