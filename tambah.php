<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Tambah Data Alumni</h1>
        <a href="index.php" class="btn-tambah" style="background-color: #6c757d;">KEMBALI</a>
    </div>

    <form method="POST" action="proses.php">
        <input type="hidden" name="aksi" value="tambah"> 

        <label for="nama">Nama Alumni:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="tahun_lulus">Tahun Lulus:</label>
        <input type="number" id="tahun_lulus" name="tahun_lulus" required min="1900" max="<?php echo date('Y'); ?>">
        
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required>

        <label for="pekerjaan">Pekerjaan:</label>
        <input type="text" id="pekerjaan" name="pekerjaan">

        <label for="nomor_telefon">Nomor Telefon:</label>
        <input type="text" id="nomor_telefon" name="nomor_telefon">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat"></textarea>

        <button type="submit" class="btn-tambah" style="margin-top: 20px;">SIMPAN DATA</button>
    </form>
</div>

</body>
</html>

<style>
    form {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }
    input[type="text"], input[type="number"], input[type="email"], textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box; /* Penting agar padding tidak melebarkan input */
    }
    textarea {
        resize: vertical;
    }
</style>