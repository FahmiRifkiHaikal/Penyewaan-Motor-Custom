<?php
include 'koneksi.php';

// Pastikan parameter id terdapat dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data kategori berdasarkan id
    $sql = "DELETE FROM tb_kategori WHERE id = $id";

    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        // Jika penghapusan berhasil, redirect ke halaman categories.php
        header('Location: categories.php');
        exit;
    } else {
        // Jika terjadi kesalahan saat menghapus, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika parameter id tidak ditemukan dalam URL, redirect ke halaman categories.php
    header('Location: categories.php');
    exit;
}
?>
