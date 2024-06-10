<?php
include 'koneksi.php';
session_start();

if ($_SESSION['username'] == null) {
    header('location:../login.php');
    exit();
}

// Fungsi untuk menambah data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['edit'])) {
    $kategori = $_POST['kategori']; // Ubah 'categories' menjadi 'kategori'
    $merk = $_POST['merk'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO tb_kategori (kategori, merk, tahun, harga) VALUES ('$kategori', '$merk', '$tahun', '$harga')";
    if (mysqli_query($koneksi, $sql)) {
        header('location:categories.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

// Fungsi untuk mengedit data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id = $_POST['id']; // Ambil ID dari form
    $kategori = $_POST['kategori']; // Ubah 'categories' menjadi 'kategori'
    $merk = $_POST['merk'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['price'];

    // Query UPDATE untuk mengubah data berdasarkan ID
    $sql = "UPDATE tb_kategori SET kategori='$kategori', merk='$merk', year='$tahun', price='$harga' WHERE id='$id'";

    if (mysqli_query($koneksi, $sql)) {
        header('location:categories.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>
