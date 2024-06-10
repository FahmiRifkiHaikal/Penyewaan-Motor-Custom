<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nomorhp = $_POST['nomorhp'];
    $alamat = $_POST['alamat'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    $sql = "UPDATE tb_transaksi SET nama='$nama', nomorhp='$nomorhp', alamat='$alamat', kategori='$kategori', harga='$harga', status='$status', tanggal='$tanggal' WHERE id='$id'";

    if (mysqli_query($koneksi, $sql)) {
        header('location: transaction.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM tb_transaksi WHERE id='$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);
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
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group input[type="date"] {
            padding: 6px;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Custom Motor Rent</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../admin.php" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../categories/categories.php">
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
                <a href="../logout.php">
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
            <div class="container">
                <h3>Edit Transaksi</h3>
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nomorhp">Nomor HP:</label>
                        <input type="text" id="nomorhp" name="nomorhp" value="<?php echo $data['nomorhp']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori:</label>
                        <select id="kategori" name="kategori" required>
                            <option value="120cc" <?php if ($data['kategori'] == '120cc') echo 'selected'; ?>>120cc</option>
                            <option value="150cc" <?php if ($data['kategori'] == '150cc') echo 'selected'; ?>>150cc</option>
                            <option value="200cc" <?php if ($data['kategori'] == '200cc') echo 'selected'; ?>>200cc</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input type="number" id="harga" name="harga" value="<?php echo $data['harga']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value="pending" <?php if ($data['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                            <option value="completed" <?php if ($data['status'] == 'completed') echo 'selected'; ?>>Completed</option>
                            <option value="cancelled" <?
                                                    if ($data['status'] == 'cancelled') echo 'selected'; ?>>Cancelled</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal:</label>
                                                    <input type="date" id="tanggal" name="tanggal" value="<?php echo $data['tanggal']; ?>" required>
                                                </div>
                                                <button type="submit" class="btn-submit">Simpan Perubahan</button>
                                            </form>
                                        </div>
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
                            