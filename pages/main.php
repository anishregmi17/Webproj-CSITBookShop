<?php
// main.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

require_once('../includes/db.php');

// Initialize the search query
$searchQuery = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $searchQuery = "WHERE title LIKE '%$search%' OR author LIKE '%$search%' OR genre LIKE '%$search%' OR year LIKE '%$search%'";
}

// Fetch books from the database
$query = "SELECT * FROM books $searchQuery ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management Dashboard</title>

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
            max-width: 1200px;
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

        table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 20px;
    border: 1px solid #ddd;
    background-color: #ffffff;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

table th, table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #f7f7f7;
    color: #333;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-weight: bold;
    font-size: 14px;
    border-top: 1px solid #ddd;
    border-bottom: 2px solid #ddd;
}

table td {
    font-size: 14px;
    color: #555;
    line-height: 1.5;
}

table th:first-child,
table td:first-child {
    border-left: 1px solid #ddd;
}

table th:last-child,
table td:last-child {
    border-right: 1px solid #ddd;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
    transition: background-color 0.3s ease;
}

table img {
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.delete-btn {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 3px;
    transition: background-color 0.3s ease;
}

.delete-btn:hover {
    background-color: #c82333;
}

    </style>
</head>
<body>

<!-- Navbar section -->
<header class="header">
    <div class="header-1">
        <a href="../pages/main.php" class="logo"> <i class="fas fa-book"></i> CSIT Book Store </a>
        <form action="" method="GET" class="search-form">
            <input type="search" name="search" placeholder="Search here..." id="search-box" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </div>
</header>

<!-- Dashboard content -->
<div class="container">
    <h1>Book Management Dashboard</h1>
    <a href="../logout.php" class="btn">Logout</a>
    <a href="../crud/create.php" class="btn">Add New Book</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td style="font-weight: bold"><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['genre']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" width="80"></td>
                    <td>
                        <a href="../crud/edit.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                        <a href="../crud/delete.php?id=<?php echo $row['id']; ?>" class="btn delete-btn">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/scripts.js"></script>
<script>
    $(document).ready(function() {
        // Confirmation dialog for deleting a book
        $('.delete-btn').on('click', function(e) {
            if (!confirm("Are you sure you want to delete this book?")) {
                e.preventDefault();
            }
        });

        // Add hover effect to table rows
        $('table tbody tr').hover(function() {
            $(this).css('background-color', '#e6e6e6');
        }, function() {
            $(this).css('background-color', '');
        });
    });
</script>

<!-- footer section starts  -->
<section class="footer">
    <div class="share">
        <a href="https://facebook.com" class="fab fa-facebook-f"></a>
        <a href="https://x.com" class="fab fa-twitter"></a>
        <a href="https://www.instagram.com" class="fab fa-instagram"></a>
        <a href="https://www.linkedin.com" class="fab fa-linkedin"></a>
    </div>
    <div class="credit"> CSIT Book Store ©2024 all rights reserved! </div>
</section>
<!-- footer section ends -->
</body>
</html>
