<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
   header('location:login.php');
   exit;
}

if (!isset($_GET['id'])) {
   echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'categories.php';
      </script>
    ";
   exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM tb_kategori WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="../assets/icon.png" />
   <link rel="stylesheet" href="admin.css" />
   <!-- Boxicons CDN Link -->
   <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Custom Motor Rent</title>
</head>

<body>
   <div class="sidebar">
      <div class="logo-details">
         <i class="bx bx-category"></i>
         <span class="logo_name">Custom Motor Rent</span>
      </div>
      <ul class="nav-links">
         <li>
            <a href="../admin.php">
               <i class="bx bx-grid-alt"></i>
               <span class="links_name">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="../categories/categories.php" class="active">
               <i class="bx bx-box"></i>
               <span class="links_name">Categories</span>
            </a>
         </li>
         <li>
            <a href="../transaction/transaction.php">
               <i class="bx bx-list-ul"></i>
               <span class="links_name">Transaction</span>
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
         <h3>Edit Kategori</h3>
         <div class="form-login">
            <form action="categories-prosesedit.php" method="post">
               <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
               <label for="kategori">Categories</label>
               <input class="input" type="text" name="kategori" id="kategori" value="<?php echo $data['kategori']; ?>" required />
               <label for="merk">Merk</label>
               <input class="input" type="text" name="merk" id="merk" value="<?php echo $data['merk']; ?>" required />
               <label for="tahun">Tahun</label>
               <input class="input" type="number" name="tahun" id="tahun" value="<?php echo $data['tahun']; ?>" min="1900" max="2025" required />
               <label for="harga">Price</label>
               <input class="input" type="text" name="harga" id="harga" value="<?php echo $data['harga']; ?>" required />
               <button type="submit" class="btn btn-simpan" name="simpan">
                  Simpan
               </button>
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