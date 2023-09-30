<?php

use App\Admin;
use App\Login;

require_once 'vendor/autoload.php';
$login = new Login();
$admin = new Admin();
$admin->login($login);
