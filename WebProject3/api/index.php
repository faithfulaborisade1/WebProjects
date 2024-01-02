<?php

require 'Slim/Slim.php';
require 'dog_db.php';
require 'database.php';
use Slim\Slim;
\Slim\Slim::registerAutoloader();

$app = new Slim();
/* The code you provided is defining different routes for handling HTTP requests in a PHP application
using the Slim framework. */
$app->get('/dog', 'getDogs');
$app->get('/dog/:id',  'getDog');
$app->get('/dog/search/:query', 'findByName');
$app->get('/dog/search/:query', 'findByAge');
$app->post('/dog', 'addDog');
$app->delete('/dog/:id',	'deleteDog');
$app->put('/dog/:id', 'updateDog');

//USER APP//

// $app = new Slim();
$app->get('/user', 'getUsers');
$app->get('/user/:id',  'getUser');
$app->get('/user/search/:query', 'findByName');
$app->post('/user', 'addUser');
$app->delete('/user/:id',	'deleteUser');
$app->put('/user/:id', 'updateUser');

$app->run();
?>

