<?php

$users = array(
    array('name' => 'john Doe', 'email' => 'john@example.com', 'balance' => 1000),
    array('name' => 'jane Smith', 'email' => 'jane@example.com', 'balance' => 1500),
    array('name' => 'mike Johnson', 'email' => 'mike@example.com', 'balance' => 800),
    array('name' => 'nike Johnson', 'email' => 'mike@example.com', 'balance' => 800),

);
$array_column = array_column($users, 'email');
$inputted_email = "john@example.com";
// if (in_array($inputted_email, $array_column) && filter_var($inputted_email, FILTER_VALIDATE_EMAIL)) {
//     echo "The email exists and is in correct format";
// }
// if (
//     in_array($inputted_email, $array_column) && !filter_var($inputted_email, FILTER_VALIDATE_EMAIL)

// ) {
//     echo "The email exists but is not in correct format";
// }
// if (!in_array($inputted_email, $array_column)) {
//     echo "The email does not exist or you havent inserted any email";
// }
//For login this lo
//Convert it to json 
// echo json_encode($users);

//Filter out all valid emails in the array 
// $userinfo_filter_email = array_filter($users, function ($u) {
//     return filter_var($u['email'], FILTER_VALIDATE_EMAIL);
// });
// var_dump($userinfo_filter_email);
$inputpassword = "password";
$password = password_hash($inputpassword, PASSWORD_BCRYPT);

// echo $password;
// class Hash
// {
//     public static function make($password): string
//     {
//         return password_hash($password, PASSWORD_BCRYPT);
//     }
// }
//Filter out with an email 
$filtered_email = array_filter($users, fn ($u) => $u['email'] == 'john@example.com');
// var_dump($filtered_email);
//Flatten the array 
$flatten_filtered_email_array = array_merge(...$filtered_email);
// var_dump($flatten_filtered_email_array);
var_dump($flatten_filtered_email_array);
$array_keys = array_keys($flatten_filtered_email_array);
$filteredArray = array_map(function ($key) use ($flatten_filtered_email_array, $array_keys) {
    return $flatten_filtered_email_array[$key];
}, ["name", "email"]);
var_dump($filteredArray);
// var_dump($flatten_array);
//flip the arrays


// $take_name_value_from_email = array_map(function ($item) {
//     //Taking the keys from filtered email


//     return $item['name'];
// }, $flatten_filtered_email_array);


// var_dump($take_name_value_from_email);
// var_dump($take_name_value_from_email);
//flatten the array again 
// $flatten_mapped_array = array_merge(...$take_name_value_from_email);
// var_dump($flatten_mapped_array);
// echo $flatten_mapped_array["name"];
$newarray = [];

if (empty($newarray)) {
    echo "The array is empty";
} else {
    echo "The array is not empty";
}
