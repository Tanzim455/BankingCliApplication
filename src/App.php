<?php

declare(strict_types=1);

namespace App;

require_once 'vendor/autoload.php';




class App
{
    use FileWriting, FilePathExists;
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

    public function checkUserEmailExists($array, string $email): bool
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

    public function main()
    {

        Menu::allMenu();
        // $phpFilePath = 'output.php';


        while (true) {
            $readline = readline("Select an option: ");
            if ($readline == MenuNumbers::FIRST) {
                echo "Login";
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


                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    echo "It is not an appropriate email address" . PHP_EOL;
                }

                // $this->filePathExists();
                if (file_exists('output.php')) {
                    include 'output.php';
                }
                if (isset($users)) {
                    //$this->filePathExists();


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


                if (strlen($this->password) < 8) {
                    echo "Your password count needs to be greater or equal to 8" . PHP_EOL;
                }

                if (strlen($this->name) < 8) {
                    echo "Your name must be at least 8 characters" . PHP_EOL;
                }
                if ($this->balance < 0) {
                    echo "Your balance cannot be negative";
                }

                if (
                    filter_var($this->email, FILTER_VALIDATE_EMAIL) && !$this->check_email_exists
                    && strlen($this->name) >= 8 && strlen($this->password) >= 8
                    && $this->balance > 0
                ) {
                    $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

                    $values = [$this->name, $this->email, $hashed_password, $this->balance];
                    $keys = ['name', 'email', 'password', 'balance'];
                    $array_combine = array_combine($keys, $values);
                    if (!isset($this->users)) {
                        $this->users = [];
                    }
                    $this->filePathExists();
                    array_push($this->users, $array_combine);
                    $this->write(array: $this->users, file: $this->file, phpFilePath: $this->phpFilePath);
                }
            }
            if ($readline == 3) {
                exit();
            }
        }
    }
}
