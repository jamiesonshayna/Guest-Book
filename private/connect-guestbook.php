<?php

/*
* Authors: Shayna Jamieson
* 2019-11-30
* Version 1.0
* File name: connect-guestbook.php

This file allows me to connect to the database for the guest book that
is housed on cPanel for GR. This file needs to be moved into my home
directory on cpanel when it is uploaded to be shown (for privacy).
*/

$username = 'sjamieso_guestbookuser';
$password = 'Bubblegum.11';
$hostname = 'localhost';
$database = 'sjamieso_guestbook';

global $cnxn;

$cnxn = mysqli_connect($hostname, $username, $password, $database)
or die("Connection error: " . mysqli_connect_error());
