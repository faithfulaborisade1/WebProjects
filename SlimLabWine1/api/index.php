<?php

require 'Slim/Slim.php';
require 'wine_db.php';
require 'database.php';
use Slim\Slim;
\Slim\Slim::registerAutoloader();

$app = new Slim();
$app->get('/wine', 'getWines');
$app->get('/wine/:id',  'getWine');
$app->get('/wine/search/:query', 'findByName');

$app->run();
?>

