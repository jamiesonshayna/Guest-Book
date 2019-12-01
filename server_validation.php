<?php

/*
 * AUTHOR: SHAYNA JAMIESON
 * DATE: 11/16/2019
 * FILENAME: server_validation.php
 * USING THIS FILE AS A VALIDATION HELPER
 */

/* --- Globals --- */
const VARCHAR_MAX = 255; // Max length of VARCHAR data in tables
const TEXT_MAX = 2147483647; // Max length of TEXT data in tables
const PHONE_LENGTH = 10;
const ZIP_LENGTH = 5;
const YEAR_LENGTH = 4;
const DATE_LENGTH = 8;

/* --- Helper Functions --- */
// Returns true if string is of required min and max length (inclusive)
function hasLength($str, $min, $max) {
    if (strlen($str) < $min) {
        return false;
    }

    if (strlen($str) > $max) {
        return false;
    }

    return true;
}

// returns true if string is empty
function isEmpty($str) {
    return trim($str) == "";
}

// returns true if string contains only numbers
function isNumeric($str) {
    return ctype_digit($str);
}

// returns true if string contains only letters
function isAlpha($str) {
    return ctype_alpha($str);
}

// returns true if required input is valid
function requiredInputIsValid($str) {
    return !isEmpty($str) && hasLength($str, 0, VARCHAR_MAX);
}

// returns true if email is valid
function emailIsValid($str) {
    if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
        return hasLength($str,0, VARCHAR_MAX);
    }
    return false;
}

// returns true if input is valid
function inputIsValid($str) {
    return hasLength($str,0, VARCHAR_MAX);
}

// returns true if the url is valid
function validateURL($str) {
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$str)) {
        return false;
    } return true;
}
