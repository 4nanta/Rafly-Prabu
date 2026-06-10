<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Produk</title>
</head>
<body>
    <h2>Daftar Produk (CRUD CI4)</h2>
    <a href="/product/create">➕ Tambah Produk Baru</a>
    <br><br>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color: green;"><b><?= session()->getFlashdata('success'); ?></b></p>
    <?php endif; ?>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; foreach ($products as $p) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><img src="/assets/img/upload/<?= $p['image']; ?>" width="100"></td>
            <td><?= $p['title']; ?></td>
            <td><?= $p['description']; ?></td>
            <td>
                <a href="/product/delete/<?= $p['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>