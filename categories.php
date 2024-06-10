<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
	header('location:login.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../image/icon.png">
	<link rel="stylesheet" href="admin.css">
	<!-- Boxicons CDN Link -->
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
	<title>Custom Motor Rent</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: gray;
			margin: 0;
			padding: 0;
		}

		header {
			background-color: #747171;
			color: #fff;
			padding: 20px;
			text-align: center;
		}

		.container {
			max-width: 500px;
			margin: 20px auto;
			padding: 20px;
			background-color: gray;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		/* Menambahkan warna putih pada menu sidebar */
		.sidebar a {
			color: white;
		}

		/* Tabel Kategori */
		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		table,
		th,
		td {
			border: 1px solid #ccc;
		}

		th,
		td {
			padding: 10px;
			text-align: left;
		}

		th {
			background-color: #474c50;
			color: white;
		}

		td img {
			width: 200px;
		}

		.btn-tambah a {
			color: white;
			text-decoration: none;
		}

		.btn-tambah {
			background-color: #007bff;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			transition: background-color 0.3s ease;
			display: inline-block;
			margin-bottom: 10px;
		}

		.btn-tambah:hover {
			background-color: #0056b3;
		}

		.btn-edit,
		.btn-delete {
			background-color: #007bff;
			color: white;
			text-decoration: none;
			padding: 5px 10px;
			border-radius: 4px;
		}

		.btn-delete {
			background-color: #dc3545;
		}
	</style>
</head>

<body>
	<div class="sidebar">
		<div class="logo-details">
			<h3>INPUT PRODUK</h3>
		</div>
		<ul class="nav-links">
			<li>
				<a href="admin.php" class="active">
					<i class="bx bx-grid-alt"></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="categories.php">
					<i class="bx bx-box"></i>
					<span class="links_name">Kategori</span>
				</a>
			</li>
			<li>
				<a href="transaction.php">
					<i class="bx bx-list-ul"></i>
					<span class="links_name">Transaksi</span>
				</a>
			</li>
			<li>
				<a href="logout.php">
					<i class="bx bx-log-out"></i>
					<span class="links_name">Log out</span>
				</a>
			</li>
		</ul>
	</div>
	<section class="home-section">
		<nav>
			<div class="sidebar-button">
				<i class="bx bx-menu sidebarBtn"></i>
			</div>
			<div class="profile-details">
				<span class="admin_name">Custom Motor Admin</span>
			</div>
		</nav>
		<div class="home-content">
			<h3>Categories</h3>
			<button type="button" class="btn-tambah">
				<a href="categories-entry.php">Tambah Data</a>
			</button>
			<table class="table-data">
				<thead>
					<tr>
						<th>Kategori</th>
						<th>Merk</th>
						<th>Tahun</th>
						<th>Harga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include 'koneksi.php';
					$sql = "SELECT * FROM tb_kategori";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
            <tr>
                <td colspan='5' align='center'>
                    Data Kosong
                </td>
            </tr>
            ";
					} else {
						while ($data = mysqli_fetch_assoc($result)) {
							echo "
                <tr>
                    <td>$data[kategori]</td>
                    <td>$data[merk]</td>
                    <td>$data[tahun]</td>
                    <td>$data[harga]</td>
                    <td>
                        <a class='btn-edit' href='categories-edit.php?id=$data[id]'>Edit</a> 
                        <a class='btn-delete' href='categories-hapus.php?id=$data[id]'>Hapus</a>
                    </td>
                </tr>
                ";
						}
					}
					?>
				</tbody>
			</table>

		</div>
	</section>
	<script>
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".sidebarBtn");
		sidebarBtn.onclick = function() {
			sidebar.classList.toggle("active");
			if (sidebar.classList.contains("active")) {
				sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
			} else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		};
	</script>
</body>

</html>