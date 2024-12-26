<?php
session_start();

// Users who are not website administrators (admins) are not allowed to access this page.
// if(isset($_SESSION['is_admin'])){
//     // Do nothing.
// } else {
//     header('Location: index.php');
// }

// Include the PHP script for connecting to the database (DB).
include '../php/connection.php';

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

    <title>CodingAssessment - About us</title>

    <!-- Cascading Style Sheets -->
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/dropdown-menu.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <link href="../css/styles-rwd-mobile.css" rel="stylesheet">
    <link href="../css/side-navigation-menu.css" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="../js/side-navigation-menu.js"></script>
</head>

<body>
    <!-- Referece: https://www.w3schools.com/howto/howto_js_sidenav.asp -->
    <div id="side-navigation-menu" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="Close the side navigation menu.">&times;</a>
        <a href="../index.php" onclick="closeNav()">Home</a>
        <a href="../quizzes/index.php" onclick="closeNav()">Quizzes</a>
        <a href="../tips/index.php" onclick="closeNav()">Tips</a>
        <a href="../donations/index.php" onclick="closeNav()">Donations</a>
        <a href="../contact/index.php" onclick="closeNav()">Contact us</a>
        <a href="../../about/index.php" onclick="closeNav()">About us</a>
        <?php
        if (isset($_SESSION['email_address'])) {
            echo "User is logged in.";
            echo "<a href='../account/profile/index.php' onclick='closeNav()'>Profile</a>";
            echo "<a href='../account/results/index.php' onclick='closeNav()'>Results</a>";
            echo "<a href='../account/logout/index.php' onclick='closeNav()'>Logout</a>";
        }
        else {
            echo "<a href='javascript:void(0)' style='opacity: 0;'>Blank space</a>";
            echo "<a href='javascript:void(0)'>User is not logged in.</a>";
            echo "<a href='../account/login/index.php' onclick='closeNav()'>Login</a>";
            echo "<a href='../account/registration/index.php' onclick='closeNav()'>Register</a>";
        }

        if (isset($is_admin) == 1) {
            echo "<a href='#' onclick='closeNav()'>Admin</a>";
        }
        ?>
    </div>
    <!-- Referece: https://www.w3schools.com/howto/howto_js_sidenav.asp -->

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
                <a class="black-hyperlink" href="javascript:void(0)" onclick="openNav()">
                    <div class="menu-button">
                        <img src="../images/Hamburger_icon.svg" alt="Hamburger button icon for side navigation menu." title="Hamburger button icon for side navigation menu.">
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../index.php">
                    <div class="menu-button">
                        Home
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../quizzes/index.php">
                    <div class="menu-button">
                        Quizzes
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../tips/index.php">
                    <div class="menu-button">
                        Tips
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../donations/index.php">
                    <div class="menu-button">
                        Donations
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../contact/index.php">
                    <div class="menu-button">
                        Contact us
                    </div>
                </a>
            </div>
            <div>
                <a class="black-hyperlink" href="../about/index.php">
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
                        <!-- <br> -->
                        <div class="dropdown-content">
                            <?php
                            if (isset($_SESSION['email_address'])) {
                                echo "User is logged in.";
                                echo "<a class='menu' href='../account/profile/index.php'>Profile</a>";
                                echo "<a class='menu' href='../account/results/index.php'>Results</a>";
                                echo "<a class='menu' href='../account/logout/index.php'>Logout</a>";
                            }
                            else {
                                echo "User is not logged in.";
                                echo "<a class='menu' href='../account/login/index.php'>Login</a>";
                                echo "<a class='menu' href='../account/registration/index.php'>Register</a>";
                            }
                            ?>
		                </div>
                    </div>
                </a>
            </div>
            <?php
            if (isset($is_admin) == 1) {
                echo "<div>";
                echo "<a class='black-hyperlink' href='#'>";
                    echo "<div class='menu-button'>";
                        echo "Admin";
                    echo "</div>";
                echo "</a>";
            echo "</div>";
            }
            ?>
        </div>

        <br class="desktop-line-break">

        <h1 class="page-title">Admin page (Manage table records)</h1>

        <br>

        <div class="query-table">
            <form action="index.php" method="post">
                <table id="database-query">
                    <tr>
                        <th colspan="2" style="padding-left: 0; text-align: center;">Database Query</th>
                    </tr>
                    <tr>
                        <th>Table Name:</th>
                        <td>
                            <!-- Combo box for list of tables found in the database. -->
                            <?php
                            // Declare a variable for the query.
                            $query_show_tables = "SHOW TABLES";

                            // Attempt to conenct to the DB, execute the query and get results.
                            $result_show_tables = mysqli_query($connection, $query_show_tables);

                            // Suppress the warning message when the variables are null or empty.
                            // Get the selected value from the combo box.
                            @$selected_table = $_POST['cbTableName'];

                            // Store the variable in session.
                            $_SESSION['selected_table'] = $selected_table;

                            // Display the combo box.
                            echo '<select class="table-names-cb" name="cbTableName">';
                            echo '<option value=""></option>';

                            // Check if 'selected_table' is not set.
                            if (!isset($_SESSION['selected_table'])) {
                                // Insert the each of the results into combo box.
                                while ($table_name = $result_show_tables->fetch_assoc()) {
                                    // Check if the current table name is the selected one
                                    if ($table_name['Tables_in_' . $database] == $selected_table) {
                                        echo '<option selected="selected" value="' . $selected_table . '">' . $selected_table . '</option>';
                                    } else {
                                        echo '<option value="' . $table_name['Tables_in_' . $database] . '">' . $table_name['Tables_in_' . $database] . '</option>';
                                    }
                                }

                                // Store the variable in session.
                                $_SESSION['selected_table'] = $selected_table;

                            }
                            // Check if 'selected_table' is set.
                            else if (isset($_SESSION['selected_table'])) {
                                // Insert the each of the results into combo box.
                                while ($table_name = $result_show_tables->fetch_assoc()) {
                                    // Check if the current table name is the selected one
                                    if ($table_name['Tables_in_' . $database] == $selected_table) {
                                        echo '<option selected="selected" value="' . $selected_table . '">' . $selected_table . '</option>';
                                    } else {
                                        echo '<option value="' . $table_name['Tables_in_' . $database] . '">' . $table_name['Tables_in_' . $database] . '</option>';
                                    }
                                }

                                // Store the variable in session.
                                $_SESSION['selected_table'] = $selected_table;

                            }
                            echo '</select>';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Action:</th>
                        <td><input type="submit" value="Search from the database"></td>
                    </tr>
                </table>

        <div class="hidden-div"></div>

                <table id="table-query">
                    <tr>
                        <th colspan="2" style="padding-left: 0; text-align: center;">"<?php echo $_SESSION['selected_table'];?>" Table Query</th>
                    </tr>
                    <?php
                    if ($_SESSION['selected_table'] == 'contact_us') {
                        // Use heredoc syntax to make the code readable and easier to maintain.
                        // Very useful for handling large blocks of of codes.
                        $html = <<<HTML
                        <tr>
                            <th>ID:</th>
                            <td><input type="text" name="txtID" id=""></td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td><input type="text" name="txtName" id=""></td>
                        </tr>
                        <tr>
                            <th>Email Address:</th>
                            <td><input type="email" name="txtEmail" id=""></td>
                        </tr>
                        <tr>
                            <th>Message:</th>
                            <td><input type="text" name="txtMessage" id=""></td>
                        </tr>
                        <tr>
                            <th>Date Submitted:</th>
                            <td><input type="text" name="txtDateSubmitted" id=""></td>
                        </tr>
                        <tr>
                            <th>Action:</th>
                            <td><input type="submit" value="Search from the table"></td>
                        </tr>
                        HTML;
                        echo $html;

                        // Declare the variables and store it in the session.
                        // Suppress the warning message when the variables are null or empty.
                        @$_SESSION['txtID'] = $_POST['txtID'];
                        @$_SESSION['txtName'] = $_POST['txtName'];
                        @$_SESSION['txtEmail'] = $_POST['txtEmail'];
                        @$_SESSION['txtMessage'] = $_POST['txtMessage'];
                        @$_SESSION['txtDateSubmitted'] = $_POST['txtDateSubmitted'];
                    } else if ($_SESSION['selected_table'] == 'css_quiz_answers') {
                        // Use heredoc syntax to make the code readable and easier to maintain.
                        // Very useful for handling large blocks of of codes.
                        $html = <<<HTML
                        <tr>
                            <th>ID:</th>
                            <td><input type="text" name="txtID" id=""></td>
                        </tr>
                        <tr>
                            <th>User ID:</th>
                            <td><input type="text" name="txtUserID" id=""></td>
                        </tr>
                        <tr>
                            <th>Date Attempted:</th>
                            <td><input type="text" name="txtDateAttempted" id=""></td>
                        </tr>
                        <tr>
                            <th>Date Submitted:</th>
                            <td><input type="text" name="txtDateSubmitted" id=""></td>
                        </tr>
                        <tr>
                            <th>Q1 Answer:</th>
                            <td><input type="text" name="txtQ1Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Q2 Answer:</th>
                            <td><input type="text" name="txtQ2Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Q3 Answer:</th>
                            <td><input type="text" name="txtQ3Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Q4 Answer:</th>
                            <td><input type="text" name="txtQ4Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Q5 Answer:</th>
                            <td><input type="text" name="txtQ5Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Q6 Answer:</th>
                            <td><input type="text" name="txtQ6Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Action:</th>
                            <td><input type="submit" value="Search from the table"></td>
                        </tr>
                        HTML;
                        echo $html;

                        // Declare the variables and store it in the session.
                        // Suppress the warning message when the variables are null or empty.
                        @$_SESSION['txtID'] = $_POST['txtID'];
                        @$_SESSION['txtUserID'] = $_POST['txtUserID'];
                        @$_SESSION['txtDateAttempted'] = $_POST['txtDateAttempted'];
                        @$_SESSION['txtDateSubmitted'] = $_POST['txtDateSubmitted'];
                        @$_SESSION['txtQ1Answer'] = $_POST['txtQ1Answer'];
                        @$_SESSION['txtQ2Answer'] = $_POST['txtQ2Answer'];
                        @$_SESSION['txtQ3Answer'] = $_POST['txtQ3Answer'];
                        @$_SESSION['txtQ4Answer'] = $_POST['txtQ4Answer'];
                        @$_SESSION['txtQ5Answer'] = $_POST['txtQ5Answer'];
                        @$_SESSION['txtQ6Answer'] = $_POST['txtQ6Answer'];
                    } else if ($_SESSION['selected_table'] == 'donations') {
                        // Use heredoc syntax to make the code readable and easier to maintain.
                        // Very useful for handling large blocks of of codes.
                        $html = <<<HTML
                        <tr>
                            <th>ID:</th>
                            <td><input type="text" name="txtID" id=""></td>
                        </tr>
                        <tr>
                            <th>Email Address:</th>
                            <td><input type="email" name="txtEmail" id=""></td>
                        </tr>
                        <tr>
                            <th>Bank Account Number:</th>
                            <td><input type="text" name="txtBankAccountNumber" id=""></td>
                        </tr>
                        <tr>
                            <th>Amount Donated:</th>
                            <td><input type="text" name="txtAmountDonated" id=""></td>
                        </tr>
                        <tr>
                            <th>Date Donated:</th>
                            <td><input type="text" name="txtDateDonated" id=""></td>
                        </tr>
                        <tr>
                            <th>Action:</th>
                            <td><input type="submit" value="Search from the table"></td>
                        </tr>
                        HTML;
                        echo $html;

                        // Declare the variables and store it in the session.
                        // Suppress the warning message when the variables are null or empty.
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                    } else if ($_SESSION['selected_table'] == 'html_quiz_answers') {
                        // Use heredoc syntax to make the code readable and easier to maintain.
                        // Very useful for handling large blocks of of codes.
                        $html = <<<HTML
                        <tr>
                            <th>ID:</th>
                            <td><input type="text" name="txtID" id=""></td>
                        </tr>
                        <tr>
                            <th>User ID:</th>
                            <td><input type="text" name="txtUserID" id=""></td>
                        </tr>
                        <tr>
                            <th>Date Attempted:</th>
                            <td><input type="text" name="txtDateAttempted" id=""></td>
                        </tr>
                        <tr>
                            <th>Date Submitted:</th>
                            <td><input type="text" name="txtDateSubmitted" id=""></td>
                        </tr>
                        <tr>
                            <th>Q1 Answer:</th>
                            <td><input type="text" name="txtQ1Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Q2 Answer:</th>
                            <td><input type="text" name="txtQ2Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Q3 Answer:</th>
                            <td><input type="text" name="txtQ3Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Q4 Answer:</th>
                            <td><input type="text" name="txtQ4Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Q5 Answer:</th>
                            <td><input type="text" name="txtQ5Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Q6 Answer:</th>
                            <td><input type="text" name="txtQ6Answer" id=""></td>
                        </tr>
                        <tr>
                            <th>Action:</th>
                            <td><input type="submit" value="Search from the table"></td>
                        </tr>
                        HTML;
                        echo $html;

                        // Declare the variables and store it in the session.
                        // Suppress the warning message when the variables are null or empty.
                        @$_SESSION['txtID'] = $_POST['txtID'];
                        @$_SESSION['txtUserID'] = $_POST['txtUserID'];
                        @$_SESSION['txtDateAttempted'] = $_POST['txtDateAttempted'];
                        @$_SESSION['txtDateSubmitted'] = $_POST['txtDateSubmitted'];
                        @$_SESSION['txtQ1Answer'] = $_POST['txtQ1Answer'];
                        @$_SESSION['txtQ2Answer'] = $_POST['txtQ2Answer'];
                        @$_SESSION['txtQ3Answer'] = $_POST['txtQ3Answer'];
                        @$_SESSION['txtQ4Answer'] = $_POST['txtQ4Answer'];
                        @$_SESSION['txtQ5Answer'] = $_POST['txtQ5Answer'];
                        @$_SESSION['txtQ6Answer'] = $_POST['txtQ6Answer'];
                    } else if ($_SESSION['selected_table'] == 'mailing_list') {
                        // Use heredoc syntax to make the code readable and easier to maintain.
                        // Very useful for handling large blocks of of codes.
                        $html = <<<HTML
                        <tr>
                            <th>ID:</th>
                            <td><input type="text" name="txtID" id=""></td>
                        </tr>
                        <tr>
                            <th>Email Address:</th>
                            <td><input type="email" name="txtEmail" id=""></td>
                        </tr>
                        <tr>
                            <th>Is subscribed?</th>
                            <td>
                                <div class="radio-choice">
                                    <div class="radio-choices">
                                        <input type="radio" id="yes" name="rdoSubscribed" value="Yes">
                                        <label for="yes">Yes</label><br>
                                    </div>
                                    <div class="radio-choices">
                                        <input type="radio" id="no" name="rdoSubscribed" value="No">
                                        <label for="no">No</label><br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Date First Subscribed:</th>
                            <td><input type="text" name="txtDateFirstSubscribed" id=""></td>
                        </tr>
                        <tr>
                            <th>Date Modified:</th>
                            <td><input type="text" name="txtDateModified" id=""></td>
                        </tr>
                        <tr>
                            <th>Action:</th>
                            <td><input type="submit" value="Search from the table"></td>
                        </tr>
                        HTML;
                        echo $html;

                        // Declare the variables and store it in the session.
                        // Suppress the warning message when the variables are null or empty.
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                    } else if ($_SESSION['selected_table'] == 'users') {
                        // Use heredoc syntax to make the code readable and easier to maintain.
                        // Very useful for handling large blocks of of codes.
                        $html = <<<HTML
                        <tr>
                            <th>ID:</th>
                            <td><input type="text" name="txtID" id=""></td>
                        </tr>
                        <tr>
                            <th>First Name:</th>
                            <td><input type="text" name="txtFName" id=""></td>
                        </tr>
                        <tr>
                            <th>Last Name:</th>
                            <td><input type="text" name="txtLName" id=""></td>
                        </tr>
                        <tr>
                            <th>Email Address:</th>
                            <td><input type="email" name="txtEmail" id=""></td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>
                                <div class="radio-choice">
                                    <div class="radio-choices">
                                    <input type="radio" id="male" name="rdoGender" value="Male">
                                    <label for="male">Male</label><br>
                                </div>
                                <div class="radio-choices">
                                    <input type="radio" id="female" name="rdoGender" value="Female">
                                    <label for="female">Female</label><br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Country:</th>
                            <td><input type="text" name="txtCountry" id=""></td>
                        </tr>
                        <tr>
                            <th>Is admin?</th>
                            <td>
                                <div class="radio-choice">
                                    <div class="radio-choices">
                                        <input type="radio" id="yes" name="rdoAdmin" value="Yes">
                                        <label for="yes">Yes</label><br>
                                    </div>
                                    <div class="radio-choices">
                                        <input type="radio" id="no" name="rdoAdmin" value="No">
                                        <label for="no">No</label><br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Date Created:</th>
                            <td><input type="text" name="txtDateCreated" id=""></td>
                        </tr>
                        <tr>
                            <th>Date Modified:</th>
                            <td><input type="text" name="txtDateModified" id=""></td>
                        </tr>
                        <tr>
                            <th>Action:</th>
                            <td><input type="submit" value="Search from the table"></td>
                        </tr>
                        HTML;
                        echo $html;

                        // Declare the variables and store it in the session.
                        // Suppress the warning message when the variables are null or empty.
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                        // @$_SESSION[''] = $_POST[''];
                    }
                    ?>
                </table>
            </form>
        </div>















        <!-- TODO -->
         <div id="manage-users-table">
            <table class="manage-users-table" border=1>
            <tr>
                <th>Table Name</th>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Country</th>
                <th colspan="2">Actions</th>
            </tr>

            <?php


            // Declare a variable for the query.
            // $query = "SELECT * FROM $table ORDER BY id ASC";

            // execute the query
            // $result = mysqli_query($connection, $query);

            // id, firstname, lastname, email, password, gender, country

            // read/display the results
            while($row = mysqli_fetch_assoc($result)) {
                // mysqli_fetch_row(0)
                // mysqli_fetch_array('firstname')
                // mysqli_fetch_assoc('firstname')
                // mysqli_fetch_assoc('0')
            ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email_address']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['country']; ?></td>
                <td><a href="editUser.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                <td><a href="">Delete</a></td>
            </tr>
            <?php
            }

            echo "</table>";

            // close the connection
            mysqli_close($connection);
            ?>
        </div>











        <br><br><br><br><br>

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
                    <a class="white-hyperlink" href="../index.php" class="white">
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
