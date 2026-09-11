<?php
/** @var string $title */
/** @var array $mahasiswa */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="/si-akademik-baru/public/index.php?url=mahasiswa/create">+ Tambah Mahasiswa</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>Angkatan</th>
        </tr>
        <?php foreach ($mahasiswa as $m): ?>
        <tr>
            <td><?= htmlspecialchars($m['nim']) ?></td>
            <td><?= htmlspecialchars($m['nama']) ?></td>
            <td><?= htmlspecialchars($m['email']) ?></td>
            <td><?= htmlspecialchars($m['prodi_nama']) ?></td>
            <td><?= htmlspecialchars($m['angkatan']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>