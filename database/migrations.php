<?php
// define database constants
require_once '../ClassAutoLoad.php';

// Drop users table if it exists
$drop_users = $SQL->dropTable('users');

// sql to create users table if it doesn't exist
$create_users = $SQL->createTable('users', [
    'userId' => 'bigint(10) NOT NULL AUTO_INCREMENT PRIMARY KEY',
    'fullname' => 'varchar(50) DEFAULT NULL',
    'email' => 'varchar(50) DEFAULT NULL UNIQUE',
    'password' => 'varchar(60) DEFAULT NULL',
    'verify_code' => 'varchar(10) DEFAULT NULL',
    'code_expiry_time' => 'datetime NOT NULL DEFAULT current_timestamp()',
    'mustchange' => 'tinyint(1) NOT NULL DEFAULT 0',
    'status' => 'enum(\'Active\',\'Pending\',\'Suspended\',\'Deleted\') NOT NULL DEFAULT \'Pending\'',
    'updated' => 'datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()',
    'created' => 'datetime NOT NULL DEFAULT current_timestamp()',
    'genderId' => 'tinyint(1) NOT NULL DEFAULT 1',
    'roleId' => 'tinyint(1) NOT NULL DEFAULT 1'
]);

if ($create_users === TRUE) {
    echo "Table 'users' created successfully.";
} else {
    echo "Error creating table: " . $create_users;
}

// DROP roles table if it exists
$drop_roles = $SQL->dropTable('roles');

// sql to create roles table if it doesn't exist
$create_roles = $SQL->createTable('roles', [
    'roleId' => 'tinyint(1) NOT NULL AUTO_INCREMENT PRIMARY KEY',
    'roleName' => 'varchar(50) NOT NULL UNIQUE',
    'created' => 'datetime NOT NULL DEFAULT current_timestamp()',
    'updated' => 'datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()'
]);

if ($create_roles === TRUE) {
    echo "Table 'roles' created successfully.";
} else {
    echo "Error creating table: " . $create_roles;
}

// Drop genders table if it exists
$drop_genders = $SQL->dropTable('genders');

// Create genders table if it doesn't exist
$create_genders = $SQL->createTable('genders', [
    'genderId' => 'tinyint(1) NOT NULL AUTO_INCREMENT PRIMARY KEY',
    'genderName' => 'varchar(50) NOT NULL UNIQUE',
    'created' => 'datetime NOT NULL DEFAULT current_timestamp()',
    'updated' => 'datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()'
]);

if ($create_genders === TRUE) {
    echo "Table 'genders' created successfully.";
} else {
    echo "Error creating table: " . $create_genders;
}

// Alter users table to add foreign key constraints
$alter_users = $SQL->addForeignKey('users', 'genderId', 'genders', 'genderId');
$alter_users = $SQL->addForeignKey('users', 'roleId', 'roles', 'roleId');

// Close the database connection
$SQL->closeConnection();