<?php
require 'Slim/Slim.php';
require 'books_db.php';
require 'database.php';
use Slim\Slim;
\Slim\Slim::registerAutoloader();

$app = new Slim();
$app->get('/books', 'getbooks');
$app->get('/book/:title',  'getbook');
$app->run();
?>



