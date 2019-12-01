<!DOCTYPE html>
<!--
Author: Shayna
Date: 10/12/19
File Name: success.php
Associated Files/Folders: images folder, guestbook.html, styles.css
This pages serves as the success loader when the user clicks submit. Right now there is no
validation and the page simply displays a thank you message.
-->

<?php

// FIRST: turn on error reporting -- VERY CRITICAL !!!!!!
// comment this out when you are actually on a production stage
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("server_validation.php");

    $title = $_POST['title'];
    $first = $_POST['fName'];
    $last = $_POST['lName'];
    $company = $_POST['company'];
    $linkedIn = $_POST['linked-in'];
    $emailFormat = $_POST['email-format'];
    $comment = $_POST['comment'];
    $howWeMet = $_POST['how-we-met'];
    $pleaseSpecifyOther = $_POST['please-specify-other'];

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submission Page</title>
</head>
<body>

<?php
    // CREATE AN ARRAY THAT WILL HOLD OUR ERRORS
    $error_arr = [];
    // VALIDATE REQUIRED FIELDS FIRST THEN DISPLAY SUMMARY OR ERRORS!
    $isValid = true;

    // start validating first name
    if(!requiredInputIsValid($first)) {
        $error_arr[] = "First Name";
        $isValid = false;
    }

    // start validating last name
    if(!requiredInputIsValid($last)) {
        $error_arr[] = "Last Name";
        $isValid = false;
    }

    // check for linked-in IF it is supplied
    if($linkedIn != "") {
        if(!inputIsValid($linkedIn) || !validateURL($linkedIn)) {
            $error_arr[] = "LinkedIn";
            $isValid = false;
        }
    }

    // validate email first JUST on the fact that it is set regardless
    // if client chooses to set this field it must be correct
    if(isset($_POST['email'])) {
        if(!emailIsValid($_POST['email'])) {
            if($_POST['email'] == "") {

            } else {
                $error_arr[] = "Email";
                $isValid = false;
            }
        }
    }

    // validate email on the fact that the email check is equal to yes
    if(isset($_POST['mailing-list'])) {
        if(!isset($_POST['email']) || (isset($_POST['email']) && !emailIsValid($_POST['email']))) {
            if(!in_array("Email", $error_arr)) {
                $error_arr[] = "Email";
            }
            $isValid = false;
        }
    }

    // validate for the how did we meet drop down
    if($howWeMet == "") {
        $error_arr[] = "How We Met";
        $isValid = false;
    } else if($howWeMet == "other") {
            if($pleaseSpecifyOther == "") {
                $error_arr[] = "'Other' Must Have Description";
                $isValid = false;
            }
    }

    if($isValid) {
        echo "<h2>Thank you for your submission <?php echo $first?></h2>";
        echo "<h3>Below is a summary of your results</h3><br>";
        echo "<p><strong>Full Name:</strong> $title $first $last</p>";
        if($company != "") {
            echo "<p><strong>Company:</strong> $company</p>";
        }
        if($linkedIn != "") {
            echo "<p><strong>LinkedIn:</strong> $linkedIn</p>";
        }
        if($_POST['email'] != "") {
            echo "<p><strong>Email:</strong> {$_POST['email']}</p>";
        }
        if(isset($_POST['mailing-list'])) {
            echo "<p><strong>Added To Mailing List:</strong> Yes</p>";
            echo "<p><strong>Email Format:</strong> $emailFormat</p>";
        }
        if($comment != "") {
            echo "<p><strong>Comments:</strong> $comment</p>";
        }
        echo "<p><strong>How Did We Meet:</strong> $howWeMet</p>";
        if($howWeMet == "other") {
            echo "<p><strong>Explanation:</strong> $pleaseSpecifyOther</p>";
        }
    }
    // here we loop through and print out all of the errors that we
    // caught in our array
    else {
        echo "<h3>Errors:</h3><br>";
        foreach ($error_arr as $value) {
            echo "$value<br>";
        }
    }
    ?>
</body>
</html>