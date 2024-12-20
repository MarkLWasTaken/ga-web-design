<?php
session_start();

// Include the PHP script for connecting to the database (DB).
// include 'php/connection.php';

// Query to execute
// $query ='';

// Ensure the connection to the DB is closed after execution for security reasons.
// mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free web tutorials for everyone">
    <meta name="keywords" content="HTML and CSS">
    <meta name="author" content="CodingAssessment Group">

    <title>CodingAssessment - Home</title>

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/dropdown-menu.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <link href="css/overrides.css" rel="stylesheet">
    <link href="css/mobile.css" rel="stylesheet">
</head>

<body>
    <div id="basket">
        <div id="circle-header"></div>

        <div id="header" class="website-title header-override">
            <div id="header-2">
                <!-- <img class="header-circle-image" src="images/img03.jpg" alt="Website logo" title="Website logo"> -->
                <br><br>
                CodingAssessment
                <!-- <span id="account-container">
                    <img class="account-circle-image" src="images/img03.jpg" alt="Account icon" title="Account icon">
                    Account
                </span> -->
            </div>
        </div>

        <br>

        <div id="menu-buttons" class="menu-buttons-override">
            <div>
                <a class="black-hyperlink" href="#">
                    <div class="menu-button menu-button-override">
                        Home
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="quizzes/index.php">
                    <div class="menu-button menu-button-override">
                        Quizzes
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="tips/index.php">
                    <div class="menu-button menu-button-override">
                        Tips
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="donations/index.php">
                    <div class="menu-button menu-button-override">
                        Donations
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="contact/index.php">
                    <div class="menu-button menu-button-override">
                        Contact us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="about/index.php">
                    <div class="menu-button menu-button-override">
                        About us
                    </div>
                </a>
            </div>
            <!-- TODO: Need help to fix the dropdown menu. -->
            <div>
                <!-- Prevent user from scrolling the page to the top when clicking on the "Username" button -->
                <a class="black-hyperlink" href="javascript:void(0)">
                    <div class="dropdown">
                        <div class="menu-button menu-button-override">
                            Account &#128308;
                            <!-- Account &#128994;  --> <!-- If user is logged in -->
                        </div>
                        <!-- <br> -->
                        <div class="dropdown-content">
                            <?php echo "Username here";?>
			                <a class="menu" href="account/login/index.php">Login</a>
			                <a class="menu" href="account/registration/index.php">Register</a>
		                </div>
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="">
                    <div class="menu-button">
                        Admin
                    </div>
                </a>
            </div>
        </div>

        <br>

        <h1>Home</h1>

        <br>

        <h1 class="welcome">Welcome to CodingAssessment</h1>

        <br><br>

        <div id="contents-container">
            <div id="content1" class="content">
                <br>
                <img class="content-circle-image" src="images/img01.jpg" alt="Image #1">
                <br>
                <h3>It's free</h3>
                <p>No charges will be incurred while using the website. We rely solely on donationes to keep the website running 24/7.</p>
            </div>

            <div id="content2" class="content">
                <br>
                <img class="content-circle-image" src="images/img01.jpg" alt="Image #1">
                <br>
                <h3>Easy to use</h3>
                <p>Carefully designed user interface to guide the user throughout the website.</p>
            </div>

            <div id="content3" class="content">
                <br>
                <img class="content-circle-image" src="images/img01.jpg" alt="Image #1">
                <br>
                <h3>Save the results</h3>
                <p>Quizzes that were attempted with a user account logged in will be saved into the database.</p>
            </div>
        </div>

        <br><br><br><br><br>

        <div id="footer-container" class="footer-text footer-container-override">
            <div id="footer-container-2">
                <p class="footer-text-2">Sitemap</p>
                <ul>
                    <a class="white-hyperlink" href="#" class="white">
                        <li class="padding-bottom">Home</li>
                    </a>
                    <a class="white-hyperlink" href="../quizzes/index.php" class="white">
                        <li class="padding-bottom">Quizzes</li>
                    </a>
                    <a class="white-hyperlink" href="../tips/index.php" class="white">
                        <li class="padding-bottom">Tips</li>
                    </a>
                    <a class="white-hyperlink" href="../donations/index.php" class="white">
                        <li class="padding-bottom">Donations</li>
                    </a>
                    <a class="white-hyperlink" href="../contact/index.php" class="white">
                        <li class="padding-bottom">Contact us</li>
                    </a>
                    <a class="white-hyperlink" href="../about/index.php" class="white">
                        <li class="padding-bottom">About us</li>
                    </a>
                </ul>
            </div>
            <div id="footer-container-3" class="footer-container-3-override">
                <p class="black-text">Subscribe to our mailing list<br>to be notified of latest changes</p><br>
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
