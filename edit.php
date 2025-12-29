<?php
include 'koneksi.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM diaz_tbtugas12 WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        header("Location: dashboard.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = htmlspecialchars($_POST['name']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "UPDATE diaz_tbtugas12 SET name='$name', username='$username', email='$email', password='$password' WHERE id='$id'";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='dashboard.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <?php include 'layout/header.html'; ?>
    <div class="container edit">
    <h2>Edit User</h2>
    <form method="POST" action="edit.php?id=<?php echo $data['id']; ?>">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($data['username']); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $data['password']; ?>" required>
        <input type="submit" value="Update">
    </form>
    </div>
    <?php include 'layout/footer.html'; ?>
  </body>
</html>