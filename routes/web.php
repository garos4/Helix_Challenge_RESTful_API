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




$router->post('/api/authenticate',  ['uses' => 'AuthController@authenticate']);

$router->group(['prefix' => 'api', 'middleware' => [ 'json', 'cors', 'auth:api' ]], function () use ($router) {
    
    $router->get('/products',               ['uses' => 'ProductController@index']);
    
    $router->get('/products/{id}',          ['uses' => 'ProductController@show']);
    
    $router->post('/products',              ['uses' => 'ProductController@store']);
    
    $router->put('/products/{id}',          ['uses' => 'ProductController@update']);
    
    $router->delete('/products/{id}',       ['uses' => 'ProductController@destroy']);

    
    $router->get('/user/products',               ['uses' => 'UserProductController@userProducts']);

    $router->get('/user/products/attach/{id}',   ['uses' => 'UserProductController@attach']);    
    
    $router->get('/user/products/remove/{id}',   ['uses' => 'UserProductController@remove']);
});
