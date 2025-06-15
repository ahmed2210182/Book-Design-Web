<?php
session_start();
include('db_connection.php'); // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');  // Redirect if not logged in
    exit();
}

$username = $_SESSION['username'];

// Fetch books from the database
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

// If no books are found
if (empty($books)) {
    $noBooksMessage = "No books available at the moment.";
} else {
    $noBooksMessage = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - University Used Book Marketplace</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <a href="logout.php" style="color: purple;">Logout</a>
</header>

<div class="container">
    <h2>Available Books</h2>
    <?php if ($noBooksMessage): ?>
        <p><?php echo $noBooksMessage; ?></p>
    <?php else: ?>
        <div class="book-listings">
            <?php foreach ($books as $book): ?>
                <div class="listing">
                    <img src="images/<?php echo $book['image']; ?>" alt="Book Cover" />
                    <h3><?php echo $book['title']; ?></h3>
                    <p><?php echo $book['author']; ?></p>
                    <p>$<?php echo $book['price']; ?> – <?php echo $book['condition']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
