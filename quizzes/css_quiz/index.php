<?php
session_start();

// Include the PHP script for connecting to the database (DB).
include '../../php/connection.php';

// Declare the variable to get the user ID and hide the warning message.
@$user_id = $_SESSION['id'];

// Check if the guest or user logged in is an admin or not.
if ($user_id == null) {
    // Do nothing.
}
else {
    // Execute the query to get the user's role status.
    $result = $connection->query("SELECT is_admin FROM users WHERE id = $user_id");
    while ($row = $result->fetch_assoc()) {
        $is_admin = (int) $row['is_admin']; // Cast to integer.
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

    <title>CodingAssessment - CSS Quiz</title>

    <!-- Cascading Style Sheets -->
    <link href="../../css/styles.css" rel="stylesheet">
    <link href="../../css/dropdown-menu.css" rel="stylesheet">
    <link href="../../css/quiz-css.css" rel="stylesheet">
    <link href="../../css/styles-rwd-mobile.css" rel="stylesheet">
    <link href="../../css/side-navigation-menu.css" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="../../js/side-navigation-menu.js"></script>

    <script>
        function clearOptions() {
            const radios = document.querySelectorAll('input[type="radio"]');
            radios.forEach(radio => {
                radio.checked = false;
            });
        }
    </script>
</head>

<body>
    <!-- Referece: https://www.w3schools.com/howto/howto_js_sidenav.asp -->
    <div id="side-navigation-menu" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="Close the side navigation menu.">&times;</a>
        <a href="../../index.php" onclick="closeNav()">Home</a>
        <a href="../../quizzes/index.php" onclick="closeNav()">Quizzes</a>
        <a href="../../tips/index.php" onclick="closeNav()">Tips</a>
        <a href="../../donations/index.php" onclick="closeNav()">Donations</a>
        <a href="../../contact/index.php" onclick="closeNav()">Contact us</a>
        <a href="../../about/index.php" onclick="closeNav()">About us</a>
        <?php
        if (isset($_SESSION['email_address'])) {
            echo "User is logged in.";
            echo "<a href='../../account/profile/index.php' onclick='closeNav()'>Profile</a>";
            echo "<a href='../../account/results/index.php' onclick='closeNav()'>Results</a>";
            echo "<a href='../../account/logout/index.php' onclick='closeNav()'>Logout</a>";
        }
        else {
            echo "<a href='javascript:void(0)' style='opacity: 0;'>Blank space</a>";
            echo "<a href='javascript:void(0)'>User is not logged in.</a>";
            echo "<a href='../../account/login/index.php' onclick='closeNav()'>Login</a>";
            echo "<a href='../../account/registration/index.php' onclick='closeNav()'>Register</a>";
        }

        if (isset($is_admin) == 1) {
            echo "<a href='' onclick='closeNav()'>Admin</a>";
        }
        ?>
    </div>
    <!-- Referece: https://www.w3schools.com/howto/howto_js_sidenav.asp -->

    <div id="basket">
        <div id="circle-header"></div>

        <div id="header" class="website-title">
            <div id="header-2">
                <br/><br/>
                CodingAssessment
            </div>
        </div>

        <div class="hidden-header-mobile"></div>

        <br/>

        <div id="menu-buttons">
            <div>
                <a class="black-hyperlink" href="javascript:void(0)" onclick="openNav()">
                    <div class="menu-button">
                        <img src="../../images/Hamburger_icon.svg" alt="Hamburger button icon for side navigation menu." title="Hamburger button icon for side navigation menu.">
                    </div>
                </a>
            </div>
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
                            if (isset($_SESSION['email_address'])) {
                                // Online.
                                echo "Account &#128994;";
                            }
                            else {
                                // Offline.
                                echo "Account &#128308;";
                            }
                            ?>
                        </div>
                        <!-- <br/> -->
                        <div class="dropdown-content">
                            <?php
                            if (isset($_SESSION['email_address'])) {
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
            if (isset($is_admin) == 1) {
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

        <br class="desktop-line-break"/>

        <h1 class="page-title">CSS Quiz</h1>

        <br/>

        <!-- Main content-->
        <main id="htmlquiz-container">
            <form id="quizForm" method="post" action="submit_quiz.php"> <!-- You can handle the submission in PHP -->
                <div class="question">
                    <p><strong>Question 1</strong></p>
                    <p>CSS stands for -</p>
                    <label><input type="radio" name="q1" value="A"> A. Cascade style sheets</label><br/>
                    <label><input type="radio" name="q1" value="B"> B. Color and style sheets</label><br/>
                    <label><input type="radio" name="q1" value="C"> C. Cascading style sheets</label><br/>
                    <label><input type="radio" name="q1" value="D"> D. None of the above</label>
                </div>

                <div class="question">
                    <p><strong>Question 2</strong></p>
                    <p>Which of the following is the correct syntax for referring the external style sheet?</p>
                    <label><input type="radio" name="q2" value="A"> A. < style src = example.css ></label><br/>
                    <label><input type="radio" name="q2" value="B"> B. < style src = "example.css" ></label><br/>
                    <label><input type="radio" name="q2" value="C"> C. < stylesheet > example.css < /stylesheet ></label><br/>
                    <label><input type="radio" name="q2" value="D"> D. < link rel="stylesheet" type="text/css" href="example.css" ></label>
                </div>

                <div class="question">
                    <p><strong>Question 3</strong></p>
                    <p>The property in CSS used to change the background color of an element is -</p>
                    <label><input type="radio" name="q3" value="A"> A. bgcolor</label><br/>
                    <label><input type="radio" name="q3" value="B"> B. color</label><br/>
                    <label><input type="radio" name="q3" value="C"> C. background-color</label><br/>
                    <label><input type="radio" name="q3" value="D"> D. All of the above</label>
                </div>

                <div class="question">
                    <p><strong>Question 4</strong></p>
                    <p>The property in CSS used to change the text color of an element is -</p>
                    <label><input type="radio" name="q4" value="A"> A. bgcolor</label><br/>
                    <label><input type="radio" name="q4" value="B"> B. color</label><br/>
                    <label><input type="radio" name="q4" value="C"> C. background-color</label><br/>
                    <label><input type="radio" name="q4" value="D"> D. All of the above</label>
                </div>

                <div class="question">
                    <p><strong>Question 5</strong></p>
                    <p>The CSS property used to control the element's font-size is -</p>
                    <label><input type="radio" name="q5" value="A"> A. text-style</label><br/>
                    <label><input type="radio" name="q5" value="B"> B. text-size</label><br/>
                    <label><input type="radio" name="q5" value="C"> C. font-size</label><br/>
                    <label><input type="radio" name="q5" value="D"> D. None of the above</label>
                </div>

                <div class="question">
                    <p><strong>Question 6</strong></p>
                    <p>The HTML attribute used to define the inline styles is -</p>
                    <label><input type="radio" name="q6" value="A"> A. style</label><br/>
                    <label><input type="radio" name="q6" value="B"> B. styles</label><br/>
                    <label><input type="radio" name="q6" value="C"> C. class</label><br/>
                    <label><input type="radio" name="q6" value="D"> D. None of the above</label>
                </div>

                <button type="button" onclick="clearOptions()">Clear Options</button>
                <button type="submit">Submit</button>
            </form>
        </main>

        <br/>
        <br/>
        <br class="desktop-line-break"/>
        <br class="desktop-line-break"/>
        <br class="desktop-line-break"/>

        <div id="footer-container-3-mobile">
            <p class="black-text">Subscribe to our mailing list to be notified of latest news.</p><br/>
            <div class="subscription-form">
                <form action="" method="post">
                    <input type="email" name="email" placeholder="Enter your email address" class="subscribe-textbox" required><br/><br/>
                    <input type="submit" value="Subscribe" class="subscribe-button">
                </form>
            </div>
        </div>

        <div class="hidden-footer-container-3-mobile"></div>

        <br class="mobile-line-break"/>
        <br class="mobile-line-break"/>
        <br class="mobile-line-break"/>

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
                <p class="black-text">Subscribe to our mailing list<br/>to be notified of latest news.</p><br/>
                <div class="subscription-form">
                    <form action="" method="post">
                        <input type="text" id="email" name="email" placeholder="Enter your email address" class="subscribe-textbox"><br/><br/>
                        <input type="submit" value="Subscribe" class="subscribe-button">
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
