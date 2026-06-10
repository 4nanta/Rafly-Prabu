<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 40px;
        }
        .container {
            max-width: 600px;
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
        .btn-back {
            display: inline-block;
            color: #7f8c8d;
            text-decoration: none;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .btn-back:hover { color: #34495e; }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 5px solid #dc3545;
        }
        .alert-danger ul { margin: 0; padding-left: 20px; }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #34495e;
        }
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: inherit;
        }
        input[type="text"]:focus, textarea:focus {
            border-color: #3498db;
            outline: none;
        }
        textarea { height: 100px; resize: vertical; }
        .btn-submit {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            transition: background 0.3s;
        }
        .btn-submit:hover { background-color: #2980b9; }
    </style>
</head>
<body>

<div class="container">
    <a href="/product" class="btn-back">⬅️ Kembali ke Daftar</a>
    <h2>Form Tambah Produk</h2>

    <?php $validation = \Config\Services::validation(); ?>
    <?php if ($validation->getErrors()) : ?>
        <div class="alert-danger">
            <strong>Gagal menyimpan data:</strong>
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="/product/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        
        <div class="form-group">
            <label for="title">Judul Produk</label>
            <input type="text" id="title" name="title" value="<?= old('title'); ?>" placeholder="Masukkan nama atau judul produk">
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" placeholder="Tuliskan deskripsi lengkap produk..."><?= old('description'); ?></textarea>
        </div>

        <div class="form-group">
            <label for="image">Upload Gambar (.jpg / .png)</label>
            <input type="file" id="image" name="image">
        </div>

        <button type="submit" class="btn-submit">💾 Simpan Data Produk</button>
    </form>
</div>

</body>
</html>