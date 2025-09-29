<?php

// define database constants
require_once 'ClassAutoLoad.php';

$fullname = "Alice Okama";
$email = "alice.okama@yahoo.com";

// prepare user data
$user_data = array('fullname' => $fullname, 'email' => $email);

// insert user data
$insert_user = $SQL->insert('users', $user_data);

// check if insertion was successful
if ($insert_user === TRUE) {
    echo "User inserted successfully.";
} else {
    echo "Error inserting user: " . $insert_user;
}