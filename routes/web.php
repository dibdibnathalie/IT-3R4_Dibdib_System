<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',['uses' => 'UserController@getUsers']);
    
});

$router->get('/users', 'UserController@index'); //show all users
$router->post('/users', 'UserController@add'); //add new user
$router->get('/users/{id}', 'UserController@show'); //specifically gonna get user by id
$router->put('/users/{id}', 'UserController@update'); //update user
$router->patch('/users/{id}', 'UserController@update'); //update user
$router->delete('/users/{id}', 'UserController@delete'); //delete user


$router->get('login', 'UserController@showLogIn');
$router->post('result', 'UserController@result');