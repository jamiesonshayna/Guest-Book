<?php

//Start the session
session_start();

//Destroy the session
session_destroy();
$_SESSION = array();

//Redirect to login page
header('location: guestbook.php');