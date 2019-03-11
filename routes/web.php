<?php

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

// user
$router->get('user',  ['uses' => 'UserController@showAll']);
$router->get('user/{id}',  ['uses' => 'UserController@showOne']);
$router->post('user',  ['uses' => 'UserController@create']);
$router->put('user/{id}',  ['uses' => 'UserController@update']);
$router->delete('user/{id}',  ['uses' => 'UserController@delete']);

// company
$router->get('company',  ['uses' => 'CompanyController@showAll']);
$router->get('company/{id}',  ['uses' => 'CompanyController@showOne']);
$router->post('company',  ['uses' => 'CompanyController@create']);
$router->put('company/{id}',  ['uses' => 'CompanyController@update']);
$router->delete('company/{id}',  ['uses' => 'CompanyController@delete']);

