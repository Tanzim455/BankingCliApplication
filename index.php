<?php




require_once 'vendor/autoload.php';


use App\App;
use App\Login;
use App\Registration;

$registration = new Registration();
$login = new Login();
$app = new App();


// $app->main();
$app->main($registration, $login);
