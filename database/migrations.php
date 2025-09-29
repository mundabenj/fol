<?php
// define database constants
require_once 'ClassAutoLoad.php';

// Create connection
$conn = new mysqli($conf['db_host'], $conf['db_user'], $conf['db_pass'], $conf['db_name'], $conf['db_port']);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create users table
$drop_users = "DROP TABLE IF EXISTS `users`";
$conn->query($drop_users);
$create_users = "CREATE TABLE IF NOT EXISTS `users` (
  `userId` bigint(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `verify_code` varchar(10) DEFAULT NULL,
  `code_expiry_time` datetime NOT NULL DEFAULT current_timestamp(),
  `mustchange` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('Active','Pending','Suspended','Deleted') NOT NULL DEFAULT 'Pending',
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `genderId` tinyint(1) NOT NULL DEFAULT 1,
  `roleId` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email` (`email`),
  KEY `genderId` (`genderId`),
  KEY `roleId` (`roleId`)
)";

if ($conn->query($create_users) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();