<?php
require 'Slim/Slim.php';
require 'film_db.php';
require 'database.php';
use Slim\Slim;
\Slim\Slim::registerAutoloader();

$app = new Slim();
$app->get('/films', 'getFilms');
$app->get('/films/:id',  'getFilm');
$app->get('/films/search/:query', 'findByName');
$app->post('/films', 'addfilm');
$app->delete('/films/:id',	'deletefilm');
$app->put('/films/:id', 'updatefilm');

//user

// $app->get('/users', 'getUsers');
// $app->get('/users/:id',  'getUser');
// $app->get('/users/search/:query', 'findByName');
// $app->post('/users', 'adduser');
// $app->delete('/users/:id',	'deleteuser');
// $app->put('/users/:id', 'updateuser');
// $app->run();
?>



