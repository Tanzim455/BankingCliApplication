<?php

declare(strict_types=1);

namespace App;

class Admin
{
    public string $email;
    public string $password;

    public function viewAllUsers(): void
    {
        if (file_exists('output.php')) {
            include 'output.php';
        }
        if (!isset($users)) {
            echo "Users dont exist in data";
        }
        foreach ($users as $user) {
            $name = $user['name'];
            $email = $user['email'];
            $balance = $user['balance'];
            echo "Name " . $name . "\n";
            echo "Email: " . $email . "\n";

            echo "Balance: $" . $balance . "\n\n";
        }
    }
    public function viewTransactions(): void
    {
        if (file_exists('transactions.php')) {
            include 'transactions.php';
        }
        if (!isset($transactions)) {
            echo "Transactions dont exist in database";
        }
        foreach ($transactions as $transaction) {
            $from = $transaction['from'];
            $to = $transaction['to'];
            $type = $transaction['type'];
            $amount = $transaction['amount'];
            echo "From " . $from . "\n";
            echo "To: " . $to . "\n";
            echo "Type: " . $type . "\n";
            echo "Balance: $" . $amount . "\n\n";
        }
    }
    public function viewTransactionsofSpecificUser(array $transactions)
    {
    }
    public function login(
        Login $login
    ) {
        if (file_exists('admins.php')) {
            include 'admins.php';
        }
        while (true) {
            echo "Enter your email \n";
            $this->email = trim(fgets(STDIN));
            echo "Enter your password \n";
            $this->password = trim(fgets(STDIN));
            $filtered_email = $login->filterEmail(array: $admins, email: $this->email, filterBy: 'email');
            if (!$filtered_email) {
                echo "The email does not exist in database";
            }
            $result = $login->login(filtered_email: $filtered_email, inputpassword: $this->password);
            if ($result) {
                Menu::adminMenu();
                $readline = readline("Enter specific option \n");
                if ($readline == MenuNumbers::FIRST) {
                    $this->viewAllUsers();
                }
                if ($readline == MenuNumbers::SECOND) {
                    $this->viewTransactions();
                }
                if ($readline == MenuNumbers::THIRD) {
                    echo "Enter your email \n";
                    $this->email = trim(fgets(STDIN));
                }
                if ($readline == MenuNumbers::THIRD) {
                    exit();
                }
            }
        }
    }
}
