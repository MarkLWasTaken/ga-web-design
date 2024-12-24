<?php
session_start();

// Include the PHP script for connecting to the database (DB).
include '../../php/connection.php';

// Declare the variable to get the user ID and hide the warning message.
@$userID = $_SESSION['id'];

// Check if the guest or user logged in is an admin or not.
if ($userID == null) {
    // Do nothing.
}
else {
    // Execute the query to get the user's role status.
    $result = $connection->query("SELECT is_admin FROM users WHERE id = $userID");
    while ($row = $result->fetch_assoc()) {
        $isAdmin = (int) $row['is_admin']; // Cast to integer.
    }
}

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

    <title>CodingAssessment - Account Login</title>

    <link href="../../css/styles.css" rel="stylesheet">
    <link href="../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../css/account-login-page.css" rel="stylesheet">
    <link href="../../css/styles-rwd-mobile.css" rel="stylesheet">
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
                <a class="black-hyperlink" href="../../index.php">
                    <div class="menu-button">
                        Home
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../quizzes/index.php">
                    <div class="menu-button">
                        Quizzes
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../tips/index.php">
                    <div class="menu-button">
                        Tips
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../donations/index.php">
                    <div class="menu-button">
                        Donations
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../contact/index.php">
                    <div class="menu-button">
                        Contact us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../../about/index.php">
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
                                echo "<a class='menu' href='../../account/profile/index.php'>Profile</a>";
                                echo "<a class='menu' href='../../account/results/index.php'>Results</a>";
                                echo "<a class='menu' href='../../account/logout/index.php'>Logout</a>";
                            }
                            else {
                                echo "User is not logged in.";
                                echo "<a class='menu' href='../../account/login/index.php'>Login</a>";
                                echo "<a class='menu' href='../../account/registration/index.php'>Register</a>";
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

        <!-- TODO -->
        <!-- Layout for the login form. -->
        <div id="login-container">
            <div id="login-content">
                <br>
                <h1 class="page-title">Account login</h1>
                <br>
                <p>Login to an account through the forms here.</p>
                <br>

                <!-- Login table form -->
                <form action="process/index.php" method="post">
                    <table id="login-form">
                        <tr>
                            <th>Email Address:</th>
                            <td><input type="email" name="txtEmail" required></td>
                        </tr>
                        <tr>
                            <th>Password:</th>
                            <td><input type="password" name="txtPassword" required></td>
                        </tr>
                    </table>
                    <br><br>
                    <input class="login-button" type="submit" name="btnLogin" value="Login">
                </form>
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
                    <a class="white-hyperlink" href="../../index.php" class="white">
                        <li class="padding-bottom">Home</li>
                    </a>
                    <a class="white-hyperlink" href="../../quizzes/index.php" class="white">
                        <li class="padding-bottom">Quizzes</li>
                    </a>
                    <a class="white-hyperlink" href="../../tips/index.php" class="white">
                        <li class="padding-bottom">Tips</li>
                    </a>
                    <a class="white-hyperlink" href="../../donations/index.php" class="white">
                        <li class="padding-bottom">Donations</li>
                    </a>
                    <a class="white-hyperlink" href="../../contact/index.php" class="white">
                        <li class="padding-bottom">Contact us</li>
                    </a>
                    <a class="white-hyperlink" href="../../about/index.php" class="white">
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
