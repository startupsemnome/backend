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


// login
$router->post('login', ['uses' => 'UserController@login']);

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

// problem 
$router->get('problem',  ['uses' => 'ProblemController@showAll']);
$router->get('problem/{id}',  ['uses' => 'ProblemController@showOne']);
$router->post('problem',  ['uses' => 'ProblemController@create']);
$router->put('problem/{id}',  ['uses' => 'ProblemController@update']);
$router->delete('problem/{id}',  ['uses' => 'ProblemController@delete']);

// resource
$router->get('resource',  ['uses' => 'ResourceController@showAll']);
$router->get('resource/{id}',  ['uses' => 'ResourceController@showOne']);
$router->post('resource',  ['uses' => 'ResourceController@create']);
$router->put('resource/{id}',  ['uses' => 'ResourceController@update']);
$router->delete('resource/{id}',  ['uses' => 'ResourceController@delete']);
$router->post('consult-resource',  ['uses' => 'ResourceController@search']);


