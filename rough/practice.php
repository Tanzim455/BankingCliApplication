<?php
// $users = [
//     ['name' => 'john Doe', 'email' => 'john@example.com', 'balance' => 1000],
// ];

//Take name email from index array without loop
//Instead of this you can easily destruct 
// echo $users['name'];

// echo $users['email'];

// //Do this
// ['name' => $name, 'email' => $email] = $users;

// echo "Name-$name Email-$email";
// $array_map = array_map(function ($m) {
//     return ['name' => $m['name'], 'email' => $m['email']];
// }, $users);

// $flatten_array = $array_map[0];
// ['name' => $name, 'email' => $email] = $flatten_array;

// echo "Name is $name and email is $email";

// return "Name is $name and email is $email";
$cars = array("Volvo", "BMW", "Toyota", "Honda", "Mercedes", "Opel");
print_r(array_chunk($cars, 2));
// $chunked_array = array_chunk($cars, 2);

// var_dump($chunked_array[0]);
// for ($i = 1; $i <= 3; $i++) {

//     $result[] = $i;
// }
// var_dump($result);
// $page = 3;
// for ($i = 0; $i < 2; $i++) {
//     echo $chunked_array[$page - 1][$i];
// }

// for ($i = 0; $i < count($result); $i++) {
//     echo $result[$i];

//     for ($i = 0; $i < 2; $i++) {
//         echo $chunked_array[$page - 1][$i];
//     }
// }
//Print 10 buttons to see the position of index in php 
// $chunked_array = array_chunk($cars, 2);
// for ($i = 1; $i <= 3; $i++) {
//     echo "Button$i ";
//     $page = 2;
//     if ($page == $i) {
//         for ($i = 0; $i < 2; $i++) {
//             echo $chunked_array[$page - 1][$i];
//         }
//         break;
//     }
// }

$cars = array("Volvo", "BMW", "Toyota", "Honda", "Mercedes", "Opel");
$chunked_array = array_chunk($cars, 2);



// $cars = array("Volvo", "BMW", "Toyota", "Honda", "Mercedes", "Opel");
// $chunked_array = array_chunk($cars, 2);

// $page = 3;  // Example page number

//Count of arrays 

$cars = array("Volvo", "BMW", "Toyota", "Honda", "Mercedes", "Opel");

$noDesiredPerPage = 3;
$chunked_array = array_chunk($cars, $noDesiredPerPage);
$page = 2;
if ($page >= 1 && $page <= count($chunked_array)) {
    echo "Displaying page $page";
    foreach ($chunked_array[$page - 1] as $car) {
        echo "$car";
    }
} else {
    echo "Invalid page number.";
}
$cars = array("Volvo", "BMW", "Toyota", "Honda", "Mercedes", "Opel");
$chunked_array = array_chunk($cars, 2);

$page = 2;

if ($page >= 1 && $page <= count($chunked_array)) {
    echo "Displaying page $page";
    foreach ($chunked_array[$page - 1] as $car) {
        echo "$car";
    }
} else {
    echo "Invalid page number.";
}
