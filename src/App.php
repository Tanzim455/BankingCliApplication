<?php

declare(strict_types=1);

namespace App;

require_once 'vendor/autoload.php';




class App
{
    use FileWriting;
    public string $phpFilePath = 'output.php';
    public string $transactionFilePath = 'transactions.php';
    public string $email;
    public string $password;
    public string $name;
    public  float $balance;
    public $file;
    public array $users;
    public bool $check_email_exists;
    // public array $transactions;
    public float $amount;
    public string $to;

    public string $type;



    public function filePathExists(): void
    {
        // Check if the PHP file already exists
        if (file_exists($this->phpFilePath)) {
            // Include the existing PHP file to access its data
            include $this->phpFilePath;
            $this->users = $users;
        }
    }



    public function main(Registration $registration, Login $login, Transaction $transaction)
    {

        Menu::mainMenu();
        // $phpFilePath = 'output.php';


        while (true) {
            $readline = readline("Select an option: ");
            if ($readline == MenuNumbers::FIRST) {
                if (file_exists('output.php')) {
                    include 'output.php';
                }
                if (isset($users) && count($users) > 0) {
                    echo "Enter your email \n";
                    $this->email = trim(fgets(STDIN));
                    echo "Enter your password \n";
                    $this->password = trim(fgets(STDIN));
                    $filtered_email = $login->filterEmail(array: $users, email: $this->email, filterBy: 'email');
                    if (!$filtered_email) {
                        echo "The email does not exist in database";
                    }
                    $result = $login->login(filtered_email: $filtered_email, inputpassword: $this->password);
                    $balance = $login->viewBalance(filtered_email: $filtered_email);
                    ['email' => $authuseremail] = $login->flattenArray(filtered_email: $filtered_email);
                    if ($result) {
                        while (true) {
                            echo Menu::loginMenu() . PHP_EOL;

                            $loginreadline = readline("Select an option: ");

                            if ($loginreadline == MenuNumbers::FOUR) {
                                echo "Your balance is $balance\n";
                            }
                            if ($loginreadline == MenuNumbers::FIVE) {
                                echo "Enter the amount to deposit \n";
                                $this->amount = floatval(trim(fgets(STDIN)));
                                $this->to = $authuseremail;
                                $this->type = "WithDraw";


                                $transaction->amountBalanceValidation(balance: $balance, amount: $this->amount);

                                if (file_exists('transactions.php')) {
                                    include 'transactions.php';
                                }


                                if (!isset($transactions)) {
                                    $transactions = [];
                                }
                                if ($this->amount > 0 && $this->amount < $balance) {
                                    $transaction->transactionKeyValues(
                                        amount: $this->amount,
                                        to: $this->to,
                                        type: $this->type,
                                        file: $this->file,
                                        transactionFilePath: $this->transactionFilePath,
                                        array: $transactions


                                    );
                                    if (file_exists('output.php')) {
                                        include 'output.php';
                                    }


                                    $transaction->addorDeductBalance(
                                        array: $users,
                                        email: $authuseremail,
                                        type: $this->type,
                                        amount: $this->amount,
                                        file: $this->file,
                                        userFilePath: $this->phpFilePath,
                                    );
                                }
                            }

                            if ($loginreadline == MenuNumbers::SIX) {
                                echo "Enter the amount to deposit \n";
                                $this->amount = floatval(trim(fgets(STDIN)));
                                $this->to = $authuseremail;
                                $this->type = "Deposit";


                                // $transaction->amountBalanceValidation(balance: $balance, amount: $this->amount);

                                if (file_exists('transactions.php')) {
                                    include 'transactions.php';
                                }


                                if (!isset($transactions)) {
                                    $transactions = [];
                                }
                                if ($this->amount > 0) {
                                    $transaction->transactionKeyValues(
                                        amount: $this->amount,
                                        to: $this->to,
                                        type: $this->type,
                                        file: $this->file,
                                        transactionFilePath: $this->transactionFilePath,
                                        array: $transactions


                                    );
                                    if (file_exists('output.php')) {
                                        include 'output.php';
                                    }


                                    $transaction->addorDeductBalance(
                                        array: $users,
                                        email: $authuseremail,
                                        type: $this->type,
                                        amount: $this->amount,
                                        file: $this->file,
                                        userFilePath: $this->phpFilePath,
                                    );
                                }
                            }

                            if ($loginreadline == MenuNumbers::NINE) {
                                exit();
                            }
                        }
                    }
                }

                if (!isset($users)) {
                    echo "Sorry you dont have any email here please register";
                }
            }
            if ($readline == MenuNumbers::SECOND) {

                // var_dump($users);
                echo "Enter your email \n";
                $this->email = trim(fgets(STDIN));
                echo "Enter your password \n";
                $this->password = trim(fgets(STDIN));
                echo "Enter your name \n";
                $this->name = trim(fgets(STDIN));
                echo "Enter your balance \n";
                $this->balance = floatval(trim(fgets(STDIN)));




                // $this->filePathExists();
                if (file_exists('output.php')) {
                    include 'output.php';
                }
                if (isset($users)) {
                    $this->filePathExists();


                    $this->check_email_exists = Registration::checkUserEmailExists(
                        array: $users,
                        email: $this->email
                    );
                } else {
                    $this->check_email_exists = false;
                }
                if ($this->check_email_exists) {

                    echo "The email already exists in database";
                }
                if (!isset($users)) {
                    $this->users = [];
                }

                $registration->register(
                    email: $this->email,
                    password: $this->password,
                    name: $this->name,
                    balance: $this->balance,

                    file: $this->file,
                    phpFilePath: $this->phpFilePath,
                    check_email_exists: $this->check_email_exists,
                    array: $this->users,
                );
            }
            if ($readline == 3) {
                exit();
            }
        }
    }
}
