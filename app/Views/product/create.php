<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Form Tambah Produk</h2>
    <a href="/product">⬅️ Kembali</a>
    <br><br>

    <?php $validation = \Config\Services::validation(); ?>
    <?php if ($validation->getErrors()) : ?>
        <div style="color: red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="/product/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        
        <label>Judul Produk:</label><br>
        <input type="text" name="title" value="<?= old('title'); ?>"><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="description"><?= old('description'); ?></textarea><br><br>

        <label>Upload Gambar (.jpg / .png):</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Simpan Data</button>
    </form>
</body>
</html>