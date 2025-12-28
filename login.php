<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM diaz_tbtugas12 WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];
            
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('Invalid email or password.'); window.location.href='login.html';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Invalid email or password.'); window.location.href='login.html';</script>";
        exit;
    }
}
?>


