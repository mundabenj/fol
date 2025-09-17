<?php

// start session
if (session_status() == PHP_SESSION_NONE) { 
    session_start(); 
}

// Site timezone
$conf['site_timezone'] = 'AFRICA/NAIROBI';

// Site information
$conf['site_name'] = 'ICS Academy';
$conf['site_url'] = 'http://localhost/fol/';
$conf['site_email'] = 'info@icsacademy.com';

// Site language
$conf['site_lang'] = 'en';
require_once 'Lang/' . $conf['site_lang'] . '.php';

// Database Constants
$conf['DB_TYPE'] = 'mysqli';
$conf['DB_HOST'] = 'localhost';
$conf['DB_USER'] = 'root';
$conf['DB_PASS'] = '';
$conf['DB_NAME'] = 'fol';

// Email configuration
$conf['mail_type'] = 'smtp'; // mail or smtp
$conf['smtp_host'] = 'smtp.gmail.com'; // SMTP Host Address
$conf['smtp_user'] = 'example@gmail.com'; // SMTP Username
$conf['smtp_pass'] = 'secret'; // SMTP Password
$conf['smtp_port'] = 465; // SMTP Port - 587 for tls, 465 for ssl
$conf['smtp_secure'] = 'ssl'; // Encryption - ssl or tls

// Valid domain
$conf['valid_domain'] = ['gmail.com', 'icsacademy.com', 'yahoo.com', 'outlook.com', 'strathmore.edu'];

// Valid password length
$conf['valid_password_length'] = 4; // minimum password length

// Generate activation code
$conf['activation_code'] = rand(100000, 999999);

// activation code expiry time in minutes
$conf['activation_code_expiry'] = 10; // in minutes