<?php
include 'koneksi.php';
session_start();

if ($_SESSION['username'] == null) {
    header('location:../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; // Ambil ID dari form
    $kategori = $_POST['kategori'];
    $merk = $_POST['merk'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];

    // Query UPDATE untuk mengubah data berdasarkan ID
    $sql = "UPDATE tb_kategori SET kategori='$kategori', merk='$merk', tahun='$tahun', harga='$harga' WHERE id='$id'";

    if (mysqli_query($koneksi, $sql)) {
        header('location:categories.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
