<?php
// create.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

require_once('../includes/db.php');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $image = $_FILES['image'];

    // Basic validation garne
    if (empty($title) || empty($author) || empty($genre) || empty($year) || empty($image['name'])) {
        $error = "All fields including the image are required.";
    } else {
        // image upload lai handle garna
        $imagePath = '../images/' . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            $query = "INSERT INTO books (title, author, genre, year, image) VALUES ('$title', '$author', '$genre', '$year', '$imagePath')";
            if (mysqli_query($conn, $query)) {
                header("Location: ../pages/main.php");
                exit();
            } else {
                $error = "Failed to add the book.";
            }
        } else {
            $error = "Failed to upload the image.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <!-- Navbar section -->
    <header class="header">
        <div class="header-1">
            <a href="../index.php" class="logo"><i class="fas fa-book"></i> CSIT Book Store</a>
        </div>
    </header>

    <!-- Create Book section -->
    <div class="container">
        <h1>Add New Book</h1>
        <?php if (isset($error)) : ?>
            <p class="error-msg"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="title" placeholder="Book Title" required>
            </div>
            <div class="form-group">
                <input type="text" name="author" placeholder="Author" required>
            </div>
            <div class="form-group">
                <input type="text" name="genre" placeholder="Genre" required>
            </div>
            <div class="form-group">
                <input type="number" name="year" placeholder="Year" required>
            </div>
            <div class="form-group">
                <input type="file" name="image" required>
            </div>
            <button type="submit" name="submit" class="btn-primary">Add Book</button>
        </form>
        <a href="../pages/main.php" class="btn-secondary">Back to Dashboard</a>
    </div>

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f8fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .header-1 {
            background-color: #343a40;
            padding: 7px;
            text-align: center;
        }

        .logo {
            color: #fff;
            font-size: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2em;
            margin-bottom: 8px;
            color: #007bff;
            text-align: center;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 12px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            display: block;
            width: 100%;
            margin-top: 12px;
            padding: 12px;
            border-radius: 3px;
            background-color: #6c757d;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .error-msg {
            color: #dc3545;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>

<!-- footer section starts  -->
<section class="footer">
<!-- <div class="credit"> CSIT Book Store ©2024 all rights reserved! </div> -->
    <div class="share">
        <a href="https://facebook.com" class="fab fa-facebook-f"></a>
        <a href="https://x.com" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com" class="fab fa-instagram"></a>
        <a href="https://www.linkedin.com" class="fab fa-linkedin"></a>
    </div>
    <!-- <div class="credit"> CSIT Book Store ©2024 all rights reserved! </div> -->
</section>

<!-- footer section ends -->

<script src="../js/jquery.min.js"></script>
<script src="../js/scripts.js"></script>
</body>
</html>
