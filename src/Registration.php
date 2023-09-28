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
}
