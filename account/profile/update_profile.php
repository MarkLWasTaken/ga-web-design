
<!-- 
Start of the lines/blocks of codes
Developed by M5
Student ID: Redacted
 -->

<?php
session_start();
require 'db_connection.php'; // Include database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;

    $userId = $_SESSION['user_id']; // Assume the user ID is stored in session

    // Update query
    $query = "UPDATE users SET email = ?, fullname = ?";
    $params = [$email, $fullname];

    if ($password) {
        $query .= ", password = ?";
        $params[] = $password;
    }

    $query .= " WHERE id = ?";
    $params[] = $userId;

    $stmt = $conn->prepare($query);

    if ($stmt->execute($params)) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile.";
    }
}
?>

<!-- 
End of the lines/blocks of codes
Developed by M5
Student ID: Redacted
 -->
