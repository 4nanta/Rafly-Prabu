<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - CRUD CI4</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 40px;
        }
        .container {
            max-width: 1000px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin: 0 auto;
        }
        h2 {
            color: #2c3e50;
            margin-top: 0;
            border-bottom: 2px solid #eceff1;
            padding-bottom: 10px;
        }
        .btn-add {
            display: inline-block;
            background-color: #2ecc71;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s;
            margin-bottom: 20px;
        }
        .btn-add:hover { background-color: #27ae60; }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 5px solid #28a745;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background-color: #34495e;
            color: white;
            font-weight: 600;
        }
        tr:hover { background-color: #f8f9fa; }
        .product-img {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            object-fit: cover;
        }
        .btn-delete {
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-delete:hover { color: #c0392b; text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h2>📋 Daftar Produk (CRUD CI4 - MySQL/MariaDB)</h2>
    <a href="/product/create" class="btn-add">➕ Tambah Produk Baru</a>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 20%;">Gambar</th>
                <th style="width: 25%;">Judul</th>
                <th style="width: 40%;">Deskripsi</th>
                <th style="width: 10%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($products as $p) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
                    <img src="/assets/img/upload/<?= $p['image']; ?>" class="product-img" width="100" height="100">
                </td>
                <td><strong><?= $p['title']; ?></strong></td>
                <td><?= $p['description']; ?></td>
                <td>
                    <a href="/product/delete/<?= $p['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($products)) : ?>
            <tr>
                <td colspan="5" style="text-align: center; color: #7f8c8d;">Belum ada data produk.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>