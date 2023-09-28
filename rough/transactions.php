<?php

$transactions = [
    ["to" => "email2@example.com", "type" => "deposit", "amount" => 1000.00],
    ["to" => "email3@example.com", "type" => "withdraw", "amount" => 500.00],
    ["to" => "email1@example.com", "type" => "deposit", "amount" => 1500.00],
    ["to" => "email25@example.com", "type" => "deposit", "amount" => 1000.00],

];

// include 'login.php';
$users = [
    [
        'name' => 'john Doe',
        'email' => 'john21@example.com',
        'password' => '$2y$10$rffG3LTkPt.dJlfJb.oj6OVVUvyVWZqiLV5R47pKXA/felpB1.Kce',
        'balance' => 1000,
        'accountId' => 'A1234'
    ],
    [
        'name' => 'john Doe',
        'email' => 'john25@example.com',
        'password' => '$2y$10$rffG3LTkPt.dJlfJb.oj6OVVUvyVWZqiLV5R47pKXA/felpB1.Kce', 'balance' => 1000, 'accountId' => 'A1234'
    ],
    [
        'name' => 'john Doe',
        'email' => 'john22@example.com',
        'password' => '$2y$10$rffG3LTkPt.dJlfJb.oj6OVVUvyVWZqiLV5R47pKXA/felpB1.Kce', 'balance' => 1000, 'accountId' => 'A1234'
    ]
];


// echo password_hash("password123", PASSWORD_DEFAULT);
// echo password_hash("secret321", PASSWORD_DEFAULT);
