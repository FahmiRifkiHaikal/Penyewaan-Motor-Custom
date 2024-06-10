<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
	header('location:login.php');
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "DELETE FROM tb_transaksi WHERE id='$id'";
	if (mysqli_query($koneksi, $sql)) {
		header('location:transaction.php');
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
	}
}
?>
