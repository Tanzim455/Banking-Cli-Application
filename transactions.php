<?php

$transactions = [
    ["from" => "john@example.com", "to" => "email2@example.com", "type" => "deposit", "amount" => 1000.00],
    ["from" => "john@example.com", "to" => "email3@example.com", "type" => "withdraw", "amount" => 500.00],
    ["from" => "email4@example.com", "to" => "email1@example.com", "type" => "deposit", "amount" => 1500.00],
    // ... additional transactions
];

// include 'login.php';
$users = array(
    array(
        'name' => 'john Doe', 'email' => 'john@example.com',
        'password' => '$2y$10$rffG3LTkPt.dJlfJb.oj6OVVUvyVWZqiLV5R47pKXA/felpB1.Kce', 'balance' => 1000, 'accountId' => 'A1234'
    ),
    array('name' => 'jane Smith', 'email' => 'jane@example.com', 'password' => 'secret321', 'balance' => 1500, 'accountId' => 'B5678'),
    array('name' => 'mike Johnson', 'email' => 'mike@example.com', 'password' => 'mikepass', 'balance' => 800, 'accountId' => 'C7890'),
    array('name' => 'nike Johnson', 'email' => 'mike@example.com', 'password' => 'nike123', 'balance' => 800, 'accountId' => 'D9876'),
    array('name' => 'nike Johnson', 'email' => 'tanzim@gmail.com', 'password' => 'tanzimpass', 'balance' => 800, 'accountId' => 'E4321')
);


// echo password_hash("password123", PASSWORD_DEFAULT);
// echo password_hash("secret321", PASSWORD_DEFAULT);
