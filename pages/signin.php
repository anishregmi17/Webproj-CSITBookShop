<?php
session_start();
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic input validation
    if (empty($email) || empty($password)) {
        $error = "Both fields are required.";
    } else {
        // Check if email exists
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $hash);
            $stmt->fetch();

            if (password_verify($password, $hash)) {
                // Password is correct, set session variables and redirect
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                header("Location: main.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Pustak Pasal</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<!-- header section starts  -->

<header class="header">
    <div class="header-1">
        <a href="../index.php" class="logo"> <i class="fas fa-book"></i> Hamro Pustak Pasal </a>
        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>
        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
        </div>
    </div>
</header>

<!-- header section ends -->

<hr style="border: 1px solid black;">
<div class="container" style="background-color: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); max-width: 400px; margin: 0 auto; margin-top: 3rem;">
    <h2 style="text-align: center; margin-bottom: 30px; margin-top: 10px;">Login</h2>
    <?php if (isset($error)): ?>
        <div style="color: red; text-align: center; margin-bottom: 20px;"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="signin.php" method="post">
        <div class="form-control" style="margin-bottom: 20px;">
            <input type="email" id="email" name="email" placeholder="Email" style="width: 100%; padding: 15px; border-radius: 8px; border: 1px solid #ccc; box-sizing: border-box;" required>
        </div>
        <div class="form-control" style="margin-bottom: 20px;">
            <input type="password" id="password" name="password" placeholder="Password" style="width: 100%; padding: 15px; border-radius: 8px; border: 1px solid #ccc; box-sizing: border-box;" required>
        </div>
        <div class="form-control" style="text-align: center;">
            <button type="submit" style="padding: 15px 30px; border: none; border-radius: 8px; background-color: #007bff; color: #fff; cursor: pointer;">Login</button>
        </div>
    </form>
    <div class="create-account" style="text-align: center; margin-top: 20px;">
        <span>Don't have an account? </span>
        <a href="signup.php" style="color: #007bff; text-decoration: none;">Create new account</a>
    </div>
</div>

<!-- footer section starts  -->

<section class="footer">
    <div class="share">
        <a href="https://facebook.com" class="fab fa-facebook-f"></a>
        <a href="https://x.com" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com" class="fab fa-instagram"></a>
        <a href="https://www.linkedin.com" class="fab fa-linkedin"></a>
    </div>
    <div class="credit"> Hamro Pustak Pasal ©2024 all rights reserved! </div>
</section>

<!-- footer section ends -->

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script> 
<!-- custom js file link  -->
<script src="../js/script.js"></script>

<script>
    // Check if URL has the logout parameter
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('logout')) {
        alert("You are successfully logged out from Hamro Pustak Pasal ! ! !");
    }
</script>

</body>
</html>
