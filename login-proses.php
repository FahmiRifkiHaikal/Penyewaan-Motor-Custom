<?php
session_start();
include 'koneksi.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $sql);
    $user = mysqli_fetch_assoc($result);

    if($user) {
        if(password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            echo "
                <script>
                    alert('Login Berhasil');
                    window.location = 'admin.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Password Salah');
                    window.location = 'login.php';
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Username tidak ditemukan');
                window.location = 'login.php';
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('Pastikan Anda Mengisi Semua Data');
            window.location = 'login.php';
        </script>
    ";
}
?>
