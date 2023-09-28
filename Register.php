<?php


function register($inputemail, $name, $password, $users)
{
    if (filter_var($inputemail, FILTER_VALIDATE_EMAIL) && strlen($name) >= 8 && strlen($password) >= 8) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $values = [$name, $inputemail, $hashed_password];
        $keys = ['name', 'email', 'password'];
        $array_combine = array_combine($keys, $values);
        // var_dump($array_combine);
        array_push($users, $array_combine);
        var_dump($users);
    }
}
