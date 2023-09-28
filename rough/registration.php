<?php
// include 'getRandomString.php';
include 'RegsitrationFormValidation.php';
include 'Register.php';
// $users = array(
//     array('name' => 'john Doe', 'email' => 'john@example.com', 'password' => 'password123', 'balance' => 1000, 'accountId' => 'A1234'),
//     array('name' => 'jane Smith', 'email' => 'jane@example.com', 'password' => 'secret321', 'balance' => 1500, 'accountId' => 'B5678'),
//     array('name' => 'mike Johnson', 'email' => 'mike@example.com', 'password' => 'mikepass', 'balance' => 800, 'accountId' => 'C7890'),
//     array('name' => 'nike Johnson', 'email' => 'mike@example.com', 'password' => 'nike123', 'balance' => 800, 'accountId' => 'D9876'),
//     array('name' => 'nike Johnson', 'email' => 'tanzim@gmail.com', 'password' => 'tanzimpass', 'balance' => 800, 'accountId' => 'E4321')
// );





$inputemail = "tanzim21@gmail.com";
$name = "Tanzim Ib";
$password = "12345678";
// $balance = 0;
// $accountId = getRandomString(6);

if (!isset($users)) {
    //Instantiate an array 
    $users = [];
    RegisterFormValidation(inputemail: $inputemail, password: $password, name: $name);
    register(
        inputemail: $inputemail,
        name: $name,
        password: $password,

        users: $users
    );
} else {
    $all_email = array_column($users, 'email');

    if (in_array($inputemail, $all_email)) {
        echo "The email already exists";
    }
    if (!in_array($inputemail, $all_email)) {
        register(
            inputemail: $inputemail,
            name: $name,
            password: $password,


            users: $users
        );
        RegisterFormValidation(inputemail: $inputemail, password: $password, name: $name);
    }
}
