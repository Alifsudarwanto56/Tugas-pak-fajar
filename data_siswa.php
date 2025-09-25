<?php
// Step 1: Jika belum input jumlah data
if (!isset($_POST['step']) || $_POST['step'] == '1') {
    ?>
    <h2>Masukkan Jumlah Data Biodata</h2>
    <form method="post">
        <input type="hidden" name="step" value="2">
        Jumlah Data: <input type="number" name="jumlah" min="1" required>
        <br><br>
        <input type="submit" value="Lanjutkan">
    </form>
    <?php
}

// Step 2: Form input biodata sesuai jumlah
elseif ($_POST['step'] == '2') {
    $jumlah = $_POST['jumlah'];
    ?>
    <h2>Input Data Biodata</h2>
    <form method="post">
        <input type="hidden" name="step" value="3">
        <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Panggilan</th>
                <th>Nama Lengkap</th>
                <th>NISN</th>
                <th>Alamat</th>
            </tr>
            <?php for ($i = 1; $i <= $jumlah; $i++) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><input type="text" name="panggilan[]" required></td>
                    <td><input type="text" name="lengkap[]" required></td>
                    <td><input type="number" name="nisn[]" required></td>
                    <td><input type="text" name="alamat[]" required></td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <input type="submit" value="Simpan Data">
    </form>
    <?php
}

// Step 3: Tampilkan hasil dalam tabel
elseif ($_POST['step'] == '3') {
    $panggilan = $_POST['panggilan'];
    $lengkap   = $_POST['lengkap'];
    $nisn      = $_POST['nisn'];
    $alamat    = $_POST['alamat'];
    ?>
    <h2>Hasil Data Biodata</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Panggilan</th>
            <th>Nama Lengkap</th>
            <th>NISN</th>
            <th>Alamat</th>
        </tr>
        <?php for ($i = 0; $i < count($panggilan); $i++) { ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= htmlspecialchars($panggilan[$i]) ?></td>
                <td><?= htmlspecialchars($lengkap[$i]) ?></td>
                <td><?= htmlspecialchars($nisn[$i]) ?></td>
                <td><?= htmlspecialchars($alamat[$i]) ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="">Input Ulang</a>
    <?php
}
?>