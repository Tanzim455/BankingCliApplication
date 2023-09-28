<?php

declare(strict_types=1);
$users = array('name' => 'john Doe', 'email' => 'john@example.com', 'balance' => 1000);


function array_types(): void
{
    // define("index_array", "Index array");
    if (!defined('ASSOCIATIVE_ARRAY')) {
        define('ASSOCIATIVE_ARRAY', 'Associative Array');
    }

    if (!defined('MULTIDIMENSIONAL_ARRAY')) {
        define('MULTIDIMENSIONAL_ARRAY', 'Multidimensional Array');
    }
}
function countArraysInsideArray(array $array): int
{
    $count = 0;
    foreach ($array as $element) {
        if (is_array($element)) {
            $count++;
        }
    }

    return $count;
}
function check_array_types(array $array): string
{

    array_types();
    countArraysInsideArray($array);

    if (!countArraysInsideArray($array)) {
        return ASSOCIATIVE_ARRAY;
    }
    return MULTIDIMENSIONAL_ARRAY;
}

function mapOrDestruct(array $array): string
{

    //Type of Array

    // check_array_types(array: $array);
    echo check_array_types(array: $array);
    if (check_array_types(array: $array) === MULTIDIMENSIONAL_ARRAY) {
        return mapArray(array: $array) . PHP_EOL;
    }
    if (check_array_types(array: $array) === ASSOCIATIVE_ARRAY) {
        return destructArray(array: $array) . PHP_EOL;
    }
}

// echo mapOrDestruct(array: $users);
function destructArray(array $array): string
{
    ['name' => $name, 'email' => $email] = $array;

    return "Name-$name Email-$email" . PHP_EOL;
}

function mapArray(array $array): string
{
    $array_map = array_map(function ($m) {
        return ['name' => $m['name'], 'email' => $m['email']];
    }, $array);

    $flatten_array = $array_map[0];
    ['name' => $name, 'email' => $email] = $flatten_array;

    return "Name is $name and email is $email" . PHP_EOL;
}

// echo mapArray(array: $users);

// echo countArraysInsideArray(array: [10, 20, 30]);

echo mapOrDestruct(array: $users);
