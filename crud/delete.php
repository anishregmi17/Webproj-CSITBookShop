<?php
// delete.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

require_once('../includes/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // First, get the image path
    $query = "SELECT image FROM books WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $book = mysqli_fetch_assoc($result);

    if ($book) {
        // Delete the image file from the server
        $imagePath = $book['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Remove the file from the server
        }

        // Delete the book record from the database
        $query = "DELETE FROM books WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            header("Location: ../pages/main.php");
            exit();
        } else {
            echo "Error deleting book.";
        }
    } else {
        echo "Book not found.";
    }
} else {
    header("Location: ../pages/main.php");
    exit();
}
?>
