<?php

$users = array(
    array('name' => 'john Doe', 'email' => 'john@example.com', 'balance' => 1000),
    array('name' => 'jane Smith', 'email' => 'jane@example.com', 'balance' => 1500),
    array('name' => 'mike Johnson', 'email' => 'mike@example.com', 'balance' => 800),
    array('name' => 'nike Johnson', 'email' => 'mike@example.com', 'balance' => 800),

);
$array_column = array_column($users, 'email');
$inputted_email = "john@example.com";

$inputpassword = "password";
$password = password_hash($inputpassword, PASSWORD_BCRYPT);


$filtered_email = array_filter($users, fn ($u) => $u['email'] == 'john@example.com');

// var_dump($flatten_array);
$flatten_array = array_merge(...$filtered_email);
$array_keys = array_keys($flatten_array);

var_dump("The array keys are", $array_keys);

$take_name_value_from_email = array_map(function ($item) use ($array_keys) {
    //Taking the keys from filtered email

    return [$array_keys[0] => $item['name'], $array_keys[1] => $item['email']];
}, $filtered_email);
var_dump($take_name_value_from_email[0]);
//Destructuring the array
['name' => $name, 'email' => $email] = $take_name_value_from_email[0];

echo "The name id $name and email is $email";
