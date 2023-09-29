<?php

declare(strict_types=1);

namespace App;

require_once 'vendor/autoload.php';




class App
{
    use FileWriting;
    public string $phpFilePath = 'output.php';
    public string $email;
    public string $password;
    public string $name;
    public  float $balance;
    public $file;
    public array $users;
    public bool $check_email_exists;



    public function filePathExists(): void
    {
        // Check if the PHP file already exists
        if (file_exists($this->phpFilePath)) {
            // Include the existing PHP file to access its data
            include $this->phpFilePath;
            $this->users = $users;
        }
    }
    public function OnlyFileExists()
    {
        if (file_exists('output.php')) {
            include 'output.php';
        }
    }


    public function main(Registration $registration, Login $login)
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
                    if ($result) {
                        // $loginreadline = readline("Select an option: ");
                        echo Menu::loginMenu() . PHP_EOL;
                        $loginreadline = readline("Select an option: ");
                        echo "$loginreadline \n";
                        if ($loginreadline = MenuNumbers::FOUR) {
                            echo "Your balance is $balance \n";
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
