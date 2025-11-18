<?php
include 'koneksi.php';

// Pastikan parameter ID ada
if (!isset($_GET['id'])) {
    header("location:index.php");
    exit;
}

$id_alumni = mysqli_real_escape_string($koneksi, $_GET['id']);
$query = mysqli_query($koneksi, "SELECT * FROM alumniqq WHERE id_alumni='$id_alumni'");
$d = mysqli_fetch_array($query);

// Cek jika data tidak ditemukan
if (!$d) {
    echo "<script>alert('Data alumni tidak ditemukan.'); window.location.href='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Edit Data Alumni</h1>
        <a href="index.php" class="btn-tambah" style="background-color: #6c757d;">KEMBALI</a>
    </div>

    <form method="POST" action="proses.php">
        <input type="hidden" name="aksi" value="edit">
        <input type="hidden" name="id_alumni" value="<?php echo $d['id_alumni']; ?>"> 

        <label for="nama">Nama Alumni:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $d['nama']; ?>" required>

        <label for="tahun_lulus">Tahun Lulus:</label>
        <input type="number" id="tahun_lulus" name="tahun_lulus" value="<?php echo $d['tahun_lulus']; ?>" required min="1900" max="<?php echo date('Y'); ?>">
        
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo $d['jurusan']; ?>" required>

        <label for="pekerjaan">Pekerjaan:</label>
        <input type="text" id="pekerjaan" name="pekerjaan" value="<?php echo $d['pekerjaan']; ?>">

        <label for="nomor_telefon">Nomor Telefon:</label>
        <input type="text" id="nomor_telefon" name="nomor_telefon" value="<?php echo $d['nomor_telefon']; ?>">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $d['email']; ?>">

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat"><?php echo $d['alamat']; ?></textarea>

        <button type="submit" class="btn-tambah" style="margin-top: 20px; background-color: #ffc107;">PERBARUI DATA</button>
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
        box-sizing: border-box; 
    }
    textarea {
        resize: vertical;
    }
</style>