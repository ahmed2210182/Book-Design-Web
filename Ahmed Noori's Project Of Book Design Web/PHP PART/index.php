<?php
session_start(); // Start the session

// Include the database connection file (optional, you can connect to a DB for real login authentication)
include('db_connection.php');

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');  // Redirect to a different page after login
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Simple login validation (replace with real authentication)
    if ($username == "Ahmed" && $password == "2210182") {
        $_SESSION['username'] = $username;  // Store session variable
        header('Location: dashboard.php');  // Redirect to dashboard
        exit();
    } else {
        $loginError = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Used Book Marketplace</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>University Used Book Marketplace</h1>
</header>

<div class="container">
    <!-- Login Form -->
    <div id="loginSection">
        <h2>Login</h2>
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Enter Username" required />
            <input type="password" name="password" placeholder="Enter Password" required />
            <button type="submit">Login</button>
        </form>
        <?php if (isset($loginError)): ?>
            <p style="color: red;"><?php echo $loginError; ?></p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
