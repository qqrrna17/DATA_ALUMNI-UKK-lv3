<?php
include 'koneksi.php'; // Hubungkan ke database

// Cek apakah ada data yang dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aksi'])) {
    
    $aksi = $_POST['aksi'];

    if ($aksi == 'tambah') {
        // --- PROSES TAMBAH DATA (AMAN) ---
        
        // Ambil data dari form
        $nama            = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $tahun_lulus     = mysqli_real_escape_string($koneksi, $_POST['tahun_lulus']);
        $jurusan         = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
        $pekerjaan       = mysqli_real_escape_string($koneksi, $_POST['pekerjaan']);
        $nomor_telefon   = mysqli_real_escape_string($koneksi, $_POST['nomor_telefon']);
        $email           = mysqli_real_escape_string($koneksi, $_POST['email']);
        $alamat          = mysqli_real_escape_string($koneksi, $_POST['alamat']);

        // Query INSERT
        $sql = "INSERT INTO alumniqq (nama, tahun_lulus, jurusan, pekerjaan, nomor_telefon, email, alamat) 
                VALUES ('$nama', '$tahun_lulus', '$jurusan', '$pekerjaan', '$nomor_telefon', '$email', '$alamat')";

        if (mysqli_query($koneksi, $sql)) {
            // Jika berhasil, redirect kembali ke halaman utama
            header("location:index.php?pesan=tambah_sukses");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }

    } elseif ($aksi == 'edit') {
        // --- PROSES EDIT DATA (AMAN) ---
        
        // Ambil ID yang akan diedit
        $id_alumni       = mysqli_real_escape_string($koneksi, $_POST['id_alumni']);
        
        // Ambil data yang diperbarui
        $nama            = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $tahun_lulus     = mysqli_real_escape_string($koneksi, $_POST['tahun_lulus']);
        $jurusan         = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
        $pekerjaan       = mysqli_real_escape_string($koneksi, $_POST['pekerjaan']);
        $nomor_telefon   = mysqli_real_escape_string($koneksi, $_POST['nomor_telefon']);
        $email           = mysqli_real_escape_string($koneksi, $_POST['email']);
        $alamat          = mysqli_real_escape_string($koneksi, $_POST['alamat']);

        // Query UPDATE
        $sql = "UPDATE alumniqq SET 
                nama='$nama', 
                tahun_lulus='$tahun_lulus', 
                jurusan='$jurusan', 
                pekerjaan='$pekerjaan', 
                nomor_telefon='$nomor_telefon', 
                email='$email', 
                alamat='$alamat' 
                WHERE id_alumni='$id_alumni'";

        if (mysqli_query($koneksi, $sql)) {
            // Jika berhasil, redirect kembali ke halaman utama
            header("location:index.php?pesan=edit_sukses");
        } else {
            echo "Error updating record: " . mysqli_error($koneksi);
        }

    } else {
        // Jika aksi tidak valid
        header("location:index.php");
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    // --- PROSES HAPUS DATA (SUDAH DIPERBAIKI) ---

    // Ambil ID yang akan dihapus
    if (isset($_GET['id'])) {
        // Variabel yang menyimpan ID dari URL (id alumni yang akan dihapus)
        $id_alumni_hapus = mysqli_real_escape_string($koneksi, $_GET['id']); 
        
        // Query DELETE
        // Menggunakan variabel yang benar: $id_alumni_hapus
        $sql = "DELETE FROM alumniqq WHERE id_alumni='$id_alumni_hapus'"; 

        if (mysqli_query($koneksi, $sql)) {
            // Jika berhasil, redirect kembali ke halaman utama
            header("location:index.php?pesan=hapus_sukses");
        } else {
            echo "Error deleting record: " . mysqli_error($koneksi);
        }
    } else {
        header("location:index.php");
    }
}
// Tutup koneksi
mysqli_close($koneksi);
?>