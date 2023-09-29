<?php

declare(strict_types=1);

namespace App;

class Login
{
    public function filterEmail(array $array, string $email, string $filterBy): array
    {

        return array_filter($array, fn ($u) => $u[$filterBy] == $email);
    }
    function flattenArray($filtered_email): array
    {

        return array_merge(...$filtered_email);
    }
    public function login(array $filtered_email, string $inputpassword)
    {


        if (!$filtered_email) {
            echo "Your email does not match";
        }
        if ($filtered_email) {
            ['password' => $password, 'email' => $email] = $this->flattenArray(filtered_email: $filtered_email);
            if (password_verify($inputpassword, $password)) {
                return $email;
            }
            if (!password_verify($inputpassword, $password)) {
                echo "Passwords do not  match";
            }
        }
    }
    public function viewBalance($filtered_email): float
    {
        if ($filtered_email) {
            ['balance' => $balance] = $this->flattenArray(filtered_email: $filtered_email);

            return $balance;
        }
    }
}