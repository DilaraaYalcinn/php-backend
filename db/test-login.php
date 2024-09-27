<?php
require 'Database.php';

$db = new Database();
$usersCollection = $db->getCollection('users');

// Test inserting a user
$usersCollection->insertOne([
    'email' => 'testuser@example.com',
    'password' => md5('test'),
    'rememberMe' => false
]);

echo "Inserted user successfully!";
