<?php
session_start();

// Check if user is logged in, otherwise redirect to signin.php
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

// If logged in, you can fetch user information here if needed
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Pustak Pasal</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
<link rel="manifest" href="../favicon_io/site.webmanifest">
</head>
<body>
    
<!-- header section starts  -->

<?php include('../includes/header.php'); ?>


<!-- header section ends -->

<!-- bottom navbar  -->

<?php include('../includes/bottomnavbar.php'); ?>


<!-- login form  -->

<?php include('../includes/loginform.php'); ?>


<!-- home section starts  -->

<?php include('../includes/home.php'); ?>


<!-- home section ense  -->

<!-- icons section starts  -->

<?php include('../includes/icon.php'); ?>


<!-- icons section ends -->

<!-- featured section starts  -->
<?php include('../includes/feature.php'); ?>


<!-- featured section ends -->

<!-- newsletter section starts -->

<?php include('../includes/newsletter.php'); ?>


<!-- newsletter section ends -->

<!-- category section starts  -->

<?php include('../includes/category.php'); ?>


<!-- category section ends -->

<!-- deal section starts  -->

<?php include('../includes/deal.php'); ?>


<!-- deal section ends -->

<!-- reviews section starts  -->

<?php include('../includes/review.php'); ?>

<!-- reviews section ends -->


<!-- feedback section starts  -->

<?php include('../includes/feedback.php'); ?>

<!-- feedback section ends -->
 


<?php include('../includes/footer.php'); ?>
