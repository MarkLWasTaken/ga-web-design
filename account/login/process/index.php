<?php
session_start();

// Include the PHP script for connecting to the database (DB).
include '../../../php/connection.php';

// Assigns the variables fetch values from the text fields.
$email = $_POST['txtEmail'];
$password = $_POST['txtPassword'];

// Query to execute (Fetch data from the DB).
$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

// Decalre variable to attempt to connect to the DB and execute the SQL query.
$result = mysqli_query($connection, $query);

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

    <title>CodingAssessment - Account Login Process</title>

    <link href="../../../css/styles.css" rel="stylesheet">
    <link href="../../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../../css/account-login-process.css" rel="stylesheet">
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

        <div id="account-login-process-container">
            <div id="account-login-process-content">
                <br>

                <?php
                // Executes the code when the login button is pressed.
                if (isset($_POST['btnLogin'])) {
                    // Verify if the record exists in the DB.
                    if (mysqli_num_rows($result) > 0) {
                        while($row=mysqli_fetch_assoc($result)){
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['password'] = $row['password'];
                        }
                        loginSuccess();
                    }
                    // Check if the email address contains invalid characters or is empty.
                    else if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || $email == '') {
                        validateEmail();
                    }
                    // Check if the string length is less than 8 characters.
                    else if (strlen($password) < 8) {
                        passwordLessThan8();
                    } else {
                        otherErrors();
                    }
                }

                // PHP for login messages to trigger when certain conditions are met.
                // Function for successful login.
                function loginSuccess() {
                    echo "<h1 class='page-title'>Account login sucessful!</h1>";
                    echo "<br>";
                    echo "<p>The email address and password matches the database.</p>";
                    echo "<p>You are now logged in to the website.</p>";
                    echo "<p>You'll be redirected to the home page in 5 seconds.</p>";
                    echo '<meta http-equiv="refresh" content="5; url=../../../index.php">';
                }

                // Function to check if the email address contains invalid characters or is empty.
                function validateEmail() {
                    // Adjust the style according to the available content.
                    echo "<style>
                                #account-login-process-container {
                                    height: 450px;
                                }
                                #account-login-process-content {
                                    height: 400px;
                                }
                            </style>";
                    echo "<h1 class='page-title'>Account login failed!</h1>";
                    echo "<br>";
                    echo "<p>An error has occured while logging in to your account.</p>";
                    echo "<p>The account you're trying to login with the email address<br>contains invalid characters.</p>";
                    echo "<br>";
                    echo "<p>Please try again later.</p>";
                }

                // Function to check if the password length is less than 8.
                function passwordLessThan8() {
                    // Adjust the style according to the available content.
                    echo "<style>
                                #account-login-process-container {
                                    height: 450px;
                                }
                                #account-login-process-content {
                                    height: 400px;
                                }
                            </style>";
                    echo "<h1 class='page-title'>Account login failed!</h1>";
                    echo "<br>";
                    echo "<p>An error has occured while logging in to your account.</p>";
                    echo "<p>The account you're trying to login with the password<br>is less than 8 characters.</p>";
                    echo "<br>";
                    echo "<p>Please try again later.</p>";
                }

                // Function for other errors encountered.
                function otherErrors() {
                    // Adjust the style according to the available content.
                    echo "<style>
                                #account-login-process-container {
                                    height: 600px;
                                }
                                #account-login-process-content {
                                    height: 550px;
                                }
                            </style>";
                    echo "<h1 class='page-title'>Account login failed!</h1>";
                    echo "<br>";
                    echo "<p>An error has occured while logging in to your account.</p>";
                    echo "<p>There are a few resons why the login may have failed.</p>";
                    echo "<br>";
                    echo "<p>1. It does not match with the database records, or account does not exist.</p>";
                    echo "<p>2. Incomplete details or contains invalid characters.</p>";
                    echo "<p>3. The website and the database is currently overloaded.</p>";
                    echo "<p>4. Internal website error.</p>";
                    echo "<br>";
                    echo "<p>Please try again later.</p>";
                }
                // Ensure the connection to the DB is closed, with or without any code execution for security reasons.
                mysqli_close($connection);
                ?>
                <br>
            </div>
        </div>

        <br class="desktop-line-break">
        <br class="desktop-line-break">
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
