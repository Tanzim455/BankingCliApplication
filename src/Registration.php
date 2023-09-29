<?php

declare(strict_types=1);

namespace App;

class Registration
{
    public static function checkUserEmailExists($array, string $email): bool
    {

        if (isset($array)) {
            $all_users_email = array_column($array, 'email');
            if (in_array($email, $all_users_email)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function formValidation(string $password, string $name, float $balance): string
    {
        if (strlen($password) < 8) {
            return "Your password count needs to be greater or equal to 8" . PHP_EOL;
        }

        if (strlen($name) < 8) {
            return "Your name must be at least 8 characters" . PHP_EOL;
        }
        if ($balance < 0) {
            return "Your balance cannot be negative";
        }
    }
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
}
