
<!-- 
Start of the lines/blocks of codes
Developed by M5
Student ID: Redacted
 -->

<?php
require 'db_connection.php'; // Ensure this file contains the connection to your database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $message = $_POST['message'] ?? '';

    // Insert data into the database
    $query = "INSERT INTO donations (name, email, amount, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt->execute([$name, $email, $amount, $message])) {
        echo "Thank you for your donation!";
    } else {
        echo "Error processing your donation. Please try again.";
    }
}



// CREATE TABLE donations (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL,
//     amount DECIMAL(10, 2) NOT NULL,
//     message TEXT,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );
// ?>

<!-- 
End of the lines/blocks of codes
Developed by M5
Student ID: Redacted
 -->
