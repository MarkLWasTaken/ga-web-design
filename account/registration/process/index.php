<?php
session_start();

// Include the PHP script for connecting to the database (DB).
include '../../../php/connection.php';

// MySQLi statement.
$mysqli = new mysqli($hostname, $username, $password, $database);

// Set a the default timezone for date and time.
date_default_timezone_set('Asia/Singapore');

// Set the date and time format.
$dateCreated = date('Y/m/d h:i:s a', time());

// Retrieve the values from the account registration page.
// Hide warning messages when the input fields are null or empty.
@$fname = $_POST['txtFName'];
@$lname = $_POST['txtLName'];
@$email = $_POST['txtEmail'];
@$password = $_POST['txtPassword'];
@$gender = $_POST['rdoGender'];
@$country = $_POST['selCountry'];

// Query to execute for registering the account.
$queryRegister = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `gender`, `country`, `is_admin`, `date_created`) 
            VALUES ('$fname', '$lname', '$email', '$password', '$gender', '$country', 0, '$dateCreated')";

// Query to execute and check if the email address exists in the DB
// by counting the number of rows containing the email address.
$queryEmailCheck = ("SELECT `email` FROM `users` WHERE `email` = '$email'");

// Query to execute and check if the user credentials exists in the DB.
// $queryUserCheck = "SELECT * FROM users WHERE email='$email' AND password='$password'";

// Decalre variable to attempt to connect to the DB and execute the SQL query (Registration).
// $resultRegister = mysqli_query($connection, $queryRegister);

// Decalre variable to attempt to connect to the DB and execute the SQL query (Check email).
$resultEmailCheck = mysqli_query($connection, $queryEmailCheck);

// Decalre variable to attempt to connect to the DB and execute the SQL query.
// $resultUserCheck = mysqli_query($connection, $queryUserCheck);

// For security reasons, prepared statements will be used to prevent SQL injections.
// To check if the email address already exists in the database.
// $getEmail = $mysqli->prepare("SELECT * FROM `users` WHERE email='$email'");
// $getEmail->bind_param("s", $email);
// $getEmail->execute();
// $resultEmailCheck = $getEmail->get_result();

// Ensure the connection to the DB is closed, with or without any code execution for security reasons.
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free web tutorials for everyone">
    <meta name="keywords" content="HTML and CSS">
    <meta name="author" content="CodingAssessment Group">

    <title>CodingAssessment - Account Registration Process</title>

    <link href="../../../css/styles.css" rel="stylesheet">
    <link href="../../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../../css/account-registration-process.css" rel="stylesheet">
    <link href="../../../css/styles-rwd-mobile.css" rel="stylesheet">
</head>

<body>
    <div id="basket">
        <div id="circle-header"></div>

        <div id="header" class="website-title">
            <div id="header-2">
                <br><br>
                CodingAssessment
            </div>
        </div>

        <div class="hidden-header-mobile"></div>

        <br>

        <div id="menu-buttons">
            <div>
                <a class="black-hyperlink" href="../../../index.php">
                    <div class="menu-button">
                        Home
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../quizzes/index.php">
                    <div class="menu-button">
                        Quizzes
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../tips/index.php">
                    <div class="menu-button">
                        Tips
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../donations/index.php">
                    <div class="menu-button">
                        Donations
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../contact/index.php">
                    <div class="menu-button">
                        Contact us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../../about/index.php">
                    <div class="menu-button">
                        About us
                    </div>
                </a>
            </div>
            <!-- TODO: Need help to fix the dropdown menu. -->
            <div>
                <!-- Prevent user from scrolling the page to the top when clicking on the "Username" button -->
                <a class="black-hyperlink" href="javascript:void(0)">
                    <div class="dropdown">
                        <div class="menu-button">
                            <?php
                            if (isset($_SESSION['email'])) {
                                // Online.
                                echo "Account &#128994;";
                            }
                            else {
                                // Offline.
                                echo "Account &#128308;";
                            }
                            ?>
                        </div>
                        <!-- <br> -->
                        <div class="dropdown-content">
                            <?php
                            if (isset($_SESSION['email'])) {
                                echo "User is logged in.";
                                echo "<a class='menu' href='../../../account/profile/index.php'>Profile</a>";
                                echo "<a class='menu' href='../../../account/results/index.php'>Results</a>";
                                echo "<a class='menu' href='../../../account/logout/index.php'>Logout</a>";
                            }
                            else {
                                echo "User is not logged in.";
                                echo "<a class='menu' href='../../../account/login/index.php'>Login</a>";
                                echo "<a class='menu' href='../../../account/registration/index.php'>Register</a>";
                            }
                            ?>
		                </div>
                    </div>
                </a>
            </div>
            <?php
            if (isset($isAdmin) == 1) {
                echo "<div>";
                echo "<a class='black-hyperlink' href=''>";
                    echo "<div class='menu-button'>";
                        echo "Admin";
                    echo "</div>";
                echo "</a>";
            echo "</div>";
            }
            ?>
        </div>

        <br><br><br>

        <div id="account-registration-process-container">
            <div id="account-registration-process-content">
                <br>
                <!-- PHP messages to trigger when certain conditions are met. -->
                <?php
                    // Check if the email address contains invalid characters or is empty.
                    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || $email == '') {
                        // Adjust the style according to the available content.
                        echo "<style>
                                    #account-registration-success-container {
                                        height: 400px;
                                    }
                                    #account-registration-success-content {
                                        height: 350px;
                                    }
                                </style>";
                        echo "<h1 class='page-title'>Account registration failed!</h1>";
                        echo "<br>";
                        echo "<p>An error has occured while registering your account.</p>";
                        echo "<p>The account you're trying to register with the email address<br>contains invalid characters.</p>";
                        echo "<br>";
                        echo "<p>Please try again later.</p>";
                    }
                    // Check if the string length is less than 8 characters.
                    else if (strlen($password) < 8) {
                        // Adjust the style according to the available content.
                        echo "<style>
                                    #account-registration-success-container {
                                        height: 400px;
                                    }
                                    #account-registration-success-content {
                                        height: 350px;
                                    }
                                </style>";
                        echo "<h1 class='page-title'>Account registration failed!</h1>";
                        echo "<br>";
                        echo "<p>An error has occured while registering your account.</p>";
                        echo "<p>The account you're trying to register with the password<br>is less than 8 characters.</p>";
                        echo "<br>";
                        echo "<p>Please try again later.</p>";
                    }
                    // Check if the email address already exists in the database.
                    else if (mysqli_num_rows($resultEmailCheck)) {
                        // Adjust the style according to the available content.
                        echo "<style>
                                    #account-registration-success-container {
                                        height: 400px;
                                    }
                                    #account-registration-success-content {
                                        height: 350px;
                                    }
                                </style>";
                        echo "<h1 class='page-title'>Account registration failed!</h1>";
                        echo "<br>";
                        echo "<p>An error has occured while registering your account.</p>";
                        echo "<p>The account you're trying to register already exists in the database.</p>";
                        echo "<br>";
                        echo "<p>Please register using a new email address and try again later.</p>";
                    }
                    // Register the account details into the database.
                    else if (mysqli_query($connection, $queryRegister)) {
                        echo "<h1>Account registration sucessful!</h1>";
                        echo "<br>";
                        echo "<p>The account details you have input has been succesfully registered!</p>";
                        echo "<p>You'll be redirected to the login page in 5 seconds.</p>";
                        echo '<meta http-equiv="refresh" content="5; url=../../../account/login/index.php">';
                    }
                    // If other errors were encountered.
                    else {
                        // Adjust the style according to the available content.
                        echo "<style>
                                    #account-registration-success-container {
                                        height: 450px;
                                    }
                                    #account-registration-success-content {
                                        height: 500px;
                                    }
                                </style>";
                        echo "<h1 class='page-title'>Account registration failed!</h1>";
                        echo "<br>";
                        echo "<p>An error has occured while registering your account.</p>";
                        echo "<p>There are a few resons why the registration may have failed.</p>";
                        echo "<br>";
                        echo "<p>1. The account you're trying to register is incomplete or contains invalid characters.</p>";
                        echo "<p>2. The account you're trying to register already exists in the database.</p>";
                        echo "<p>3. The server and the database is currently overloaded.</p>";
                        echo "<p>4. Internal website error.</p>";
                        echo "<br>";
                        echo "<p>Please try again later.</p>";
                    }
                ?>
                <br>
            </div>
        </div>

        <br>
        <br>
        <br class="desktop-line-break">
        <br class="desktop-line-break">
        <br class="desktop-line-break">

        <div id="footer-container-3-mobile">
            <p class="black-text">Subscribe to our mailing list to be notified of latest news.</p><br>
            <div class="subscription-form">
                <form action="" method="post">
                    <input type="email" name="email" placeholder="Enter your email address" class="subscribe-textbox" required><br><br>
                    <input type="submit" value="Subscribe" class="subscribe-button">
                </form>
            </div>
        </div>

        <div class="hidden-footer-container-3-mobile"></div>

        <br class="mobile-line-break">
        <br class="mobile-line-break">
        <br class="mobile-line-break">

        <div id="footer-container" class="footer-text">
            <div id="footer-container-2">
                <p class="footer-text-2">Sitemap</p>
                <ul>
                    <a class="white-hyperlink" href="../../../index.php" class="white">
                        <li class="padding-bottom">Home</li>
                    </a>
                    <a class="white-hyperlink" href="../../../quizzes/index.php" class="white">
                        <li class="padding-bottom">Quizzes</li>
                    </a>
                    <a class="white-hyperlink" href="../../../tips/index.php" class="white">
                        <li class="padding-bottom">Tips</li>
                    </a>
                    <a class="white-hyperlink" href="../../../donations/index.php" class="white">
                        <li class="padding-bottom">Donations</li>
                    </a>
                    <a class="white-hyperlink" href="../../../contact/index.php" class="white">
                        <li class="padding-bottom">Contact us</li>
                    </a>
                    <a class="white-hyperlink" href="../../../about/index.php" class="white">
                        <li class="padding-bottom">About us</li>
                    </a>
                </ul>
            </div>
            <div id="footer-container-3">
                <p class="black-text">Subscribe to our mailing list<br>to be notified of latest news.</p><br>
                <div class="subscription-form">
                    <form action="" method="post">
                    <input type="email" name="email" placeholder="Enter your email address" class="subscribe-textbox" required><br><br>
                        <input type="submit" value="Subscribe" class="subscribe-button">
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
