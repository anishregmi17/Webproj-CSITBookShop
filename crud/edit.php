<?php
// edit.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

require_once('../includes/db.php');

// Retrieve the book details based on the ID
$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Invalid Book ID.";
    exit();
}

$book = mysqli_fetch_assoc($result);

// Update the book details if the form is submitted
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $image = $_FILES['image'];

    if (!empty($image['name'])) {
        $imagePath = '../images/' . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            $imageUpdate = ", image = '$imagePath'";
        } else {
            $error = "Failed to upload the new image.";
        }
    } else {
        $imageUpdate = "";
    }

    // Basic validation
    if (empty($title) || empty($author) || empty($genre) || empty($year)) {
        $error = "All fields are required.";
    } else {
        $query = "UPDATE books SET title = '$title', author = '$author', genre = '$genre', year = '$year' $imageUpdate WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            header("Location: ../pages/main.php");
            exit();
        } else {
            $error = "Failed to update the book.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form input, form button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        form button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            border-radius: 5px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        p {
            color: red;
        }
    </style>
</head>
<body>

<!-- Navbar section -->
<header class="header">
    <div class="header-1">
        <a href="../index.php" class="logo"> <i class="fas fa-book"></i> CSIT Book Store </a>
    </div>
</header>

<!-- Edit Book section -->
<div class="container">
    <h1>Edit Book</h1>
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" name="title" value="<?php echo $book['title']; ?>" placeholder="Book Title" required>
        <input type="text" name="author" value="<?php echo $book['author']; ?>" placeholder="Author" required>
        <input type="text" name="genre" value="<?php echo $book['genre']; ?>" placeholder="Genre" required>
        <input type="number" name="year" value="<?php echo $book['year']; ?>" placeholder="Year" required>
        <input type="file" name="image">
        <button type="submit" name="submit">Update Book</button>
    </form>
    <a href="../pages/main.php" class="btn">Back to Dashboard</a>
</div>
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
