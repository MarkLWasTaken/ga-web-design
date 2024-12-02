<?php
session_start();


if (!isset($_SESSION['id'])) {
    
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <h2>Welcome to the Quiz Website!</h2>
    <p>Hello, <?php echo htmlspecialchars($_SESSION['fullname']); ?>!</p>
    <p>Your email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
    
    <h3>Your Dashboard</h3>
    <p>Here you can access your quizzes, view your scores, and much more!</p>
    
    <a href="logout.php">Logout</a>
</body>

</html>