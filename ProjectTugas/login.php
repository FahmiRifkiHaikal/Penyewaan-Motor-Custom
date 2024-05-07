<?php
// Memulai session
session_start();

// Dummy data username dan password (biasanya ini berasal dari database)
$valid_username = "admin";
$valid_password = "password123";

// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Periksa apakah username dan password sesuai
    if ($username === $valid_username && $password === $valid_password) {
        // Set cookie untuk menyimpan informasi login (opsional)
        setcookie("username", $username, time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari

        // Set variabel session untuk menandai bahwa pengguna sudah login
        $_SESSION["logged_in"] = true;

        // Redirect ke halaman index.php
        header("Location: index.php");
        exit; // Penting untuk menghentikan eksekusi script setelah melakukan redirect
    } else {
        // Jika username atau password tidak sesuai, tampilkan pesan error
        echo "<script>alert('Username atau password salah. Silakan coba lagi.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 300px; padding: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
            <img src="image/logo.jpeg" alt="Logo Rental Motor Custom" style="width: 100px;">
            <h2 style="color: #000000; margin-bottom: 20px;">Selamat Datang</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="username" style="display: block; text-align: left; margin-bottom: 5px;">Username:</label>
                <input type="text" id="username" name="username" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 3px;">
                
                <label for="password" style="display: block; text-align: left; margin-bottom: 5px;">Password:</label>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 3px;">
                
                <button type="submit" style="background-color: #474c50; color: white; padding: 20px 30px; border: none; border-radius: 3px; cursor: pointer; transition: background-color 0.3s ease;">Login</button>
            </form>
            
            <p>Belum punya akun? <a href="register.php" style="color: #3b464d;">Daftar di sini</a></p>
            
            <button onclick="window.location.href = 'index.php';" style="background-color: #ccc; color: #333; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; transition: background-color 0.3s ease; margin-top: 20px;">Kembali ke Halaman Awal</button>
        </div>
    </div>
</body>
</html>
