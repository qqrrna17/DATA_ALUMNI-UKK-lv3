<?php
// Sertakan file koneksi database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DATA ALUMNI SMK TELKOM LAMPUNG</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>APLIKASI DATA ALUMNI</h1>
        <h2>DATA ALUMNI SMK TELKOM LAMPUNG</h2>
        <a href="tambah.php" class="btn-tambah">TAMBAH DATA</a>
    </div>

    <div class="search-section">
        <form method="GET" action="index.php">
            <input type="text" name="cari" placeholder="Pencarian Data..." 
                   value="<?php if(isset($_GET['cari'])) { echo $_GET['cari']; } ?>">
            <button type="submit" class="btn-cari">Cari Data</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tahun Lulus</th>
                <th>Jurusan</th>
                <th>Pekerjaan</th>
                <th>Nomor Telefon</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM alumniqq";

            // Logika pencarian
            if(isset($_GET['cari']) && $_GET['cari'] != '') {
                $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
                $query .= " WHERE nama LIKE '%$cari%' OR jurusan LIKE '%$cari%' OR pekerjaan LIKE '%$cari%'";
            }
            
            $data = mysqli_query($koneksi, $query);

            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['tahun_lulus']; ?></td>
                <td><?php echo $d['jurusan']; ?></td>
                <td><?php echo $d['pekerjaan']; ?></td>
                <td><?php echo $d['nomor_telefon']; ?></td>
                <td><?php echo $d['email']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td class="aksi">
                    <a href="edit.php?id=<?php echo $d['id_alumni']; ?>" class="aksi-edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    
                    <a href="proses.php?aksi=hapus&id=<?php echo $d['id_alumni']; ?>" class="aksi-hapus" 
                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
                </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    </div>

</body>
</html>