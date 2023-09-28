<?php
// function filteredEmail($inputemail, $users)
// {
//     $filtered_email = array_filter($users, fn ($u) => $u['email'] == $inputemail);

//     if ($filtered_email) {
//         return true;
//     }

//     if (!$filtered_email) {
//         echo "Email does not exist";
//     }
// }
function flattenArray($filtered_email): array
{

    return array_merge(...$filtered_email);
}
function login($filtered_email, $inputpassword)
{


    if (!$filtered_email) {
        echo "Your email does not match";
    }
    if ($filtered_email) {
        ['password' => $password, 'email' => $email] = flattenArray(filtered_email: $filtered_email);
        if (password_verify($inputpassword, $password)) {
            return $email;
        }
        if (!password_verify($inputpassword, $password)) {
            echo "Passwords do not  match";
        }
    }
}

function AuthUserEmail($filtered_email, $inputpassword)
{


    if (!$filtered_email) {
        echo "Your email does not match";
    }
    if ($filtered_email) {
        ['password' => $password, 'email' => $email] = $filtered_email[0];
        if (password_verify($inputpassword, $password)) {
            return $email;
        }
        if (!password_verify($inputpassword, $password)) {
            echo "Passwords do not  match";
        }
    }
}

function viewBalance($filtered_email)
{
    if ($filtered_email) {
        ['balance' => $balance] = flattenArray(filtered_email: $filtered_email);

        return $balance;
    }
}
