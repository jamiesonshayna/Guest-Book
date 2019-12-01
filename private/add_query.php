<?php

/*
 * Author: Shayna Jamieson
 * 2019-11-30
 * Version 1.0
 * File name: add_query.php
 */

/*
 * this function is called from the guestbook-success page and will add
 * a new guest into the database. It will return the result and we can either
 * display a thank you summary or an error summary.
 */

require('/home/sjamieso/connect-guestbook.php');

function newGuest($title, $firstName, $lastName, $company, $linkedIn, $email, $emailFormat, $mailingList,
 $comments, $howWeMet) {

    // global connection to database
    global $cnxn;

    // sanitize the data before inserting into the table
    $title = mysqli_real_escape_string($cnxn, $title);
    $firstName = mysqli_real_escape_string($cnxn, $firstName);
    $lastName = mysqli_real_escape_string($cnxn, $lastName);
    $company = mysqli_real_escape_string($cnxn, $company);
    $linkedIn = mysqli_real_escape_string($cnxn, $linkedIn);
    $email = mysqli_real_escape_string($cnxn, $email);
    $mailingList = mysqli_real_escape_string($cnxn, $mailingList);
    $emailFormat = mysqli_real_escape_string($cnxn, $emailFormat);
    $comments = mysqli_real_escape_string($cnxn, $comments);
    $howWeMet = mysqli_real_escape_string($cnxn, $howWeMet);

    // query to add the new guest
    $sql = "INSERT INTO User VALUES (default, '$title', '$firstName', '$lastName', '$company', '$linkedIn',
    '$email', '$emailFormat', '$mailingList',  '$comments', '$howWeMet', now());";

    // get the result back from trying to add to db
    $result = mysqli_query($cnxn, $sql);

    return $result;
}
