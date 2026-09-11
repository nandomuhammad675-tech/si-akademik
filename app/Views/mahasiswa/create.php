<?php
/** @var string $title */
/** @var array $prodiList */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <form action="/si-akademik-baru/public/index.php?url=mahasiswa/store" method="POST">
        NIM: <input type="text" name="nim" required><br><br>
        Nama: <input type="text" name="nama" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Program Studi: 
        <select name="prodi_id" required>
            <option value="">-- Pilih Prodi --</option>
            <?php foreach ($prodiList as $p): ?>
                <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nama']) ?></option>
            <?php endforeach; ?>
        </select><br><br>
        Angkatan: <input type="number" name="angkatan" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>