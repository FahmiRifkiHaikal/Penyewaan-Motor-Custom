<?php 
include 'koneksi.php';

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if(empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'register.php';
            </script>
        ";
    } elseif ($password !== $confirm_password) {
        echo "
            <script>
                alert('Password dan Konfirmasi Password tidak sesuai');
                window.location = 'register.php';
            </script>
        ";
    } else {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO tb_admin (email, password, username) VALUES ('$email', '$password_hashed', '$username')";

        if(mysqli_query($koneksi, $sql)) {
            echo "  
                <script>
                    alert('Registrasi Berhasil Silahkan login');
                    window.location = 'login.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Terjadi Kesalahan: " . mysqli_error($koneksi) . "');
                    window.location = 'register.php';
                </script>
            ";
        }
    }
}
?>
