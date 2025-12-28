<?php 
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    <!-- Navbar -->
    <?php include 'layout/header.html'; ?>

    <!-- Main -->
    <div class="container dashboard">
      <h1>Welcome to the Dashboard</h1>
        <p>You are logged in as: 
          <?php echo htmlspecialchars($_SESSION['name'] ?? $_SESSION['email'] ?? 'User'); ?>
        </p>
    </div>

<!-- Footer Section -->
    <?php include 'layout/footer.html'; ?>
  </body>
</html>