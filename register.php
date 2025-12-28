<?php
    include 'koneksi.php';

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO diaz_tbtugas12 (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
    
    mysqli_query($koneksi, $query);

    header("Location: login.php");
    exit;
?>

