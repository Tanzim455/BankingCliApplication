<?php




require_once 'vendor/autoload.php';


use App\App;
use App\Registration;

$registration = new Registration();
$app = new App();


// $app->main();
$app->main($registration);
