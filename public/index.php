<?php
namespace TestApp;

require "../vendor/autoload.php"; 


use TestApp\Logger\Logging;
use TestApp\Application\Application;

$logger = new Logging();
$app = new Application();
$app->run($logger);