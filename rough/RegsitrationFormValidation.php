<?php


function RegisterFormValidation($inputemail, $password, $name)
{
    if (!filter_var($inputemail, FILTER_VALIDATE_EMAIL)) {
        echo "It is not an appropriate email address" . PHP_EOL;
    }

    if (strlen($password) < 8) {
        echo "Your password count needs to be greater or equal to 8" . PHP_EOL;
    }

    if (strlen($name) < 8) {
        echo "Your name must be at least 8 characters" . PHP_EOL;
    }
}
