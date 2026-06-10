<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Produk</title>
    Haha, siap! Biar tampilan web kamu gak polosan banget kaya web tahun '90-an pas dinilai dosen, kita poles dikit pakai CSS biar kelihatan rapi, modern, dan enak dilihat (clean minimalis).

Sesuai instruksi dosen, kita gak perlu bikin frontend yang rumit dari nol. Jadi, kita pakai teknik Internal CSS aja biar kamu gak perlu bikin file baru, tinggal copy-paste ke dalam file View yang sudah ada.

Yuk, buka lagi folder app/Views/product/ dan perbarui kode di dua file kemarin:

📄 1. Update View Tampil Data: app/Views/product/index.php
Ganti seluruh isi file index.php kamu dengan kode yang sudah diberi sentuhan CSS modern ini:

HTML
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