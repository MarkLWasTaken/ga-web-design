<?php
session_start();

echo "Account succesfully created!";
echo "Redirecting to the login page in 5 seconds";
// Redirect to the login page with 5 seconds delay.
header('refresh:5; url=../login/index.html');

// Ensure the connection to the DB is closed after execution for security reasons.
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

    <title>CodingAssesment - Account registration successful</title>

    <link href="../../css/styles.css" rel="stylesheet">
    <link href="../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../css/account-registration-success.css" rel="stylesheet">
    <link href="../../css/mobile.css" rel="stylesheet">
</head>

<body>
    <div id="basket">
        <div id="circle-header"></div>

        <div id="header" class="website-title">
            <div id="header-2">
                <img class="header-circle-image" src="../../images/img03.jpg" alt="Website logo" title="Website logo">
                CodingAssessment
                <!-- <span id="account-container">
                    <img class="account-circle-image" src="images/img03.jpg" alt="Account icon" title="Account icon">
                    Account
                </span> -->
            </div>
        </div>

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
            <div>
                <a class="black-hyperlink" href="#">
                    <div class="menu-button">
                        Account &#128308;
                        <!-- Account &#128994; -->
                    </div>
                </a>
            </div>
        </div>

        <br><br>

        <h1>Account registration successful</h1>

        <br><br>

        <!-- TODO-->
        <div id="contents-container">
            <div id="content1" class="content">
                <br>
                <img class="content-circle-image" src="../../images/img01.jpg" alt="Image #1">
                <br>
                Content 1
            </div>
        </div>

        <div id="clear"></div>

        <br><br><br><br><br>

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
                <p class="black-text">Subscribe to our mailing list<br>to be notified of latest changes</p><br>
                <div class="subscription-form">
                    <form action="" method="post">
                        <input type="text" id="email" name="email" placeholder="Enter your email address" class="subscribe-textbox"><br><br>
                        <input type="submit" value="Subscribe" class="subscribe-button">
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>