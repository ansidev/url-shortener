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

$router->group(['prefix' => 'url'], function ($router) {
    $router->get('/', ['as' => 'url.createForm','uses' => 'UrlController@createForm']);
    $router->post('/', ['as' => 'url.shortenUrl','uses' => 'UrlController@createUrl']);
    $router->get('/{key}', ['as' => 'url.short','uses' => 'UrlController@redirect']);
});

$router->group(['prefix' => 'api/v1', 'namespace' => 'API'], function ($router) {
    $router->post('/shortenUrl', ['as' => 'api.shortenUrl','uses' => 'UrlController@shortenUrl']);
});
