<?php
    // error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Start a session
    session_start();


    //If the user is already logged in and we can navigate them to the admin page
    if (isset($_SESSION['username'])) {
        header('location: admin_page.php');
    }

    //If the login form has been submitted
    if (isset($_POST['submit'])) {
        //Include creds.php (eventually, passwords should be moved to a secure location
        //or stored in a database)
        require('/home/sjamieso/connect-guestbook.php');


        //Get the username and password from the POST array
        $username = $_POST['uname1'];
        $password = $_POST['pwd1'];

        global $loginCreds;
        //If the username and password are correct
        if(array_key_exists($username, $loginCreds) && $loginCreds["$username"] == $password) {
            //Store login name in a session variable
            $_SESSION['username'] = $username;

            //Redirect to page 1
            header('location: admin_page.php');
        }

        else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Login. Please re-try!")';
            echo '</script>';
        }
    }
?>

<!DOCTYPE html>
<!--
Author: Shayna
Date: 10/12/19
File Name: guestbook.php
Associated Files/Folders: images folder, success.php, styles.css
The purpose of this assignment was to create a "mock" guest book form using Bootstrap 4. We were to create
the required fields of the assignment and add some basic styles as needed.
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">

    <!-- For the icon in the tab -->
    <!-- https://favicon.io/emoji-favicons/fallen-leaf/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">

    <title>Guest Book</title>
</head>
<body>

<div class="jumbotron jumbotron-fluid" id="jumbo">
    <div class="container">
        <button id="admin-button" class="btn rounded-pill float-right text-white" href="#loginModal" role="button" data-toggle="modal">ADMIN</button>
        <h1 class="display-4">Guest Book</h1>
        <p class="lead">Please sign up below</p>
    </div>
</div> <!-- end of jumbotron-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Admin Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post" action="">
            <div class="modal-body">
                <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
                    <div class="form-group">
                        <label for="uname1">Username</label>
                        <input type="text" class="form-control form-control-lg" name="uname1" id="uname1">
                        <div class="invalid-feedback">Oops, you missed this one.</div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control form-control-lg" name="pwd1" id="pwd1">
                        <div class="invalid-feedback">Enter your password too!</div>
                    </div>
                    <div class="form-group py-4">
                        <button type="submit" name="submit" value="Submit" class="btn btn-dark btn-lg float-right" id="btnLogin">Login</button>
                    </div>
                </form>
            </div>
            </form>
        </div>
    </div>
</div> <!-- end of div that holds the login modal -->

<div class="container">

    <form id="guestbook-form" action="success.php" method="post">
        <fieldset><legend>Personal</legend></fieldset>

        <div class="form-group row">
            <div class="col-sm-2">
                <label for="title" class="col-form-label">Title</label>
                <select class="form-control" id="title" name="title">
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss">Miss</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Sr.">Sr.</option>
                    <option value="Dr.">Dr.</option>
                </select>
            </div>
            <div class="col-sm-9"></div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="fName" class="col-form-label">*First Name</label>
                <input type="text" class="form-control" id="fName" name="fName" placeholder="">
                <span class="err" id="err-fname">please enter a first name</span>
            </div>
            <div class="col-sm-6">
                <label for="lName" class="col-form-label">*Last Name</label>
                <input type="text" class="form-control" id="lName" name="lName" placeholder="">
                <span class="err" id="err-lname">please enter a last name</span>
            </div>
        </div> <!-- end of first and last name form group  -->
        <fieldset><legend>Contact</legend></fieldset>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="company" class="col-form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company" placeholder="">
            </div>
            <div class="col-sm-6">
                <label for="linked-in" class="col-form-label">LinkedIn URL</label>
                <input type="text" class="form-control" id="linked-in" name="linked-in" placeholder="">
                <span class="err" id="err-linkedin">please enter a valid URL</span>
            </div>
        </div> <!--  end of company/social section-->
        <div class="form-group row">
            <div class="col">
                <label for="email" id="email-address-label" class="col-form-label">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="">
                <span class="err" id="err-email">please enter a valid email</span>
            </div>
        </div> <!-- end of email area -->
        <div class="form-group">
            <div class="form-check" id="email-check-div">
                <input type="checkbox" class="form-check-input" value="yes" id="email-check" name="mailing-list">
                <label class="form-check-label" for="email-check">Please add me to your mailing list! (email required)</label>
            </div>
        </div> <!-- end of asking for if user wants to be added to mailing list-->
        <div id="toggle-email-format">
            <h6>Please choose an email format:</h6>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="email-format" id="html" value="HTML" checked>
                    <label class="form-check-label" for="html">HTML</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="email-format" id="text" value="Text">
                    <label class="form-check-label" for="text">Text</label>
                </div>
            </div>
        </div> <!-- end of toggle section for choosing an email format -->
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Comment:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
        </div> <!--  end of comment text area-->
        <fieldset><legend>Other</legend></fieldset>
        <div class="form-group row">
            <div class="col">
                <label for="how-we-met" class="col-form-label">*How did we meet?</label>

                <select class="form-control" id="how-we-met" name="how-we-met">
                    <option value="">Please Select an Option</option>
                    <option value="LinkedIn">LinkedIn</option>
                    <option value="Job Fair">Job Fair</option>
                    <option value="Referral">Referral</option>
                    <option value="other">Other</option>
                </select>
                <span class="err" id="err-how-we-met">please specify how we met</span>
            </div>
        </div> <!--  end of drop down for how did we meet-->
        <div class="form-group" id="specify-other">
            <label for="please-specify-other" id="please-specify-label">Please specify:</label>
            <textarea class="form-control" id="please-specify-other" name="please-specify-other" rows="3"></textarea>
            <span class="err" id="err-specify-other">please specify how you met us</span>
        </div> <!-- end of last other needs a comment please specify-->
        <div id="btn-div">
            <button id="submit" class="btn btn-lg btn-dark" type="submit">Submit</button>
        </div> <!-- end of the div that holds our submit button -->
    </form> <!--  end of the entire form-->
</div> <!-- end of div that encases all of the body contend (for margin and padding) -->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="scripts/validate.js"></script>
<script src="scripts/toggle_functions.js"></script>
</body>
</html>