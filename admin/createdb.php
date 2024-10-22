<?php
$db = new PDO('sqlite:../database/users.db');

// Set error mode to exceptions
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Example: Query the database
$result = $db->query('SELECT * FROM users');

// Fetch and display results
foreach ($result as $row) {
    echo $row['username'] . ' - ' . $row['full_name'] .  ' - ' . $row['password'] . ' - ' . $row['role'] . ' - ' . $row['email'] . "<br>";
}