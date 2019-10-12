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

// email 
$router->post('send-email',  ['uses' => 'EmailController@sendMail']);

// login
$router->post('login', ['uses' => 'UserController@login']);

// user
$router->get('user',  ['uses' => 'UserController@showAll']);
$router->get('user/{id}',  ['uses' => 'UserController@showOne']);
$router->post('user',  ['uses' => 'UserController@create']);
$router->put('user/{id}',  ['uses' => 'UserController@update']);
$router->delete('user/{id}',  ['uses' => 'UserController@delete']);
$router->get('count-user', ['uses' => 'UserController@getCountUser']);
$router->post('consult-user',  ['uses' => 'UserController@search']);

// company
$router->get('company',  ['uses' => 'CompanyController@showAll']);
$router->get('company/{id}',  ['uses' => 'CompanyController@showOne']);
$router->get('view-company/{id}',  ['uses' => 'CompanyController@show']);
$router->post('company',  ['uses' => 'CompanyController@create']);
$router->put('company/{id}',  ['uses' => 'CompanyController@update']);
$router->delete('company/{id}',  ['uses' => 'CompanyController@delete']);
$router->post('consult-company',  ['uses' => 'CompanyController@search']);
$router->get('count-company', ['uses' => 'CompanyController@getCountCompany']);
$router->get('names-company', ['uses' => 'CompanyController@getNamesCompany']);


// problem 
$router->get('problem',  ['uses' => 'ProblemController@showAll']);
$router->get('problem/{id}',  ['uses' => 'ProblemController@showOne']);
$router->post('problem',  ['uses' => 'ProblemController@create']);
$router->put('problem/{id}',  ['uses' => 'ProblemController@update']);
$router->delete('problem/{id}',  ['uses' => 'ProblemController@delete']);
$router->post('consult-problem',  ['uses' => 'ProblemController@search']);
$router->get('count-problem', ['uses' => 'ProblemController@getCountProblem']);
$router->get('problem-category', ['uses' => 'ProblemController@loadCategories']);

// resource
$router->get('resource',  ['uses' => 'ResourceController@showAll']);
$router->get('resource/{id}',  ['uses' => 'ResourceController@showOne']);
$router->post('resource',  ['uses' => 'ResourceController@create']);
$router->put('resource/{id}',  ['uses' => 'ResourceController@update']);
$router->delete('resource/{id}',  ['uses' => 'ResourceController@delete']);
$router->post('consult-resource',  ['uses' => 'ResourceController@search']);
$router->get('resource-category',  ['uses' => 'ResourceController@loadCategories']);
$router->get('count-resource', ['uses' => 'ResourceController@getCountResource']);

// email
$router->post('send-email',  ['uses' => 'MailController@send']);
$router->post('communicate-resource',  ['uses' => 'MailController@communicateResources']);

// resource problem
$router->post('resource-problem',  ['uses' => 'ResourceProblemController@create']);
$router->put('resource-problem',  ['uses' => 'ResourceProblemController@update']);
$router->get('resource-problem/resource/{id}',  ['uses' => 'ResourceProblemController@showOneResouce']);
$router->get('resource-problem/problem/{id}',  ['uses' => 'ResourceProblemController@showOneProblem']);

// category
$router->post('category',  ['uses' => 'CategoryController@create']);
$router->put('category/{id}',  ['uses' => 'CategoryController@update']);
$router->get('category/{id}',  ['uses' => 'CategoryController@showOneCategory']);
$router->get('category',  ['uses' => 'CategoryController@show']);

// resource
$router->get('/resource-aceept/{id}', ['uses' => 'ProblemController@resourceAccept']);

// cadastro-retrospect
$router->get('/cadastro-retrospect', ['uses' => 'UserController@retrospect']);

// match
$router->get('/match-resource-problem/{id}', ['uses' => 'UserController@match']);

// analise de sentimento
$router->get('/sentiment-analysis', ['uses' => 'UserController@sentiment']);
$router->get('/sentiment-analysis-projects', ['uses' => 'UserController@sentimentProject']);
