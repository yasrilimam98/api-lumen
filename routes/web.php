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

$router->get('api/login', ['uses' => 'LoginController@login']);
$router->post('api/register', ['uses' => 'LoginController@register']);

// add group route
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {

    // $router->group(['prefix' => 'api'], function () use ($router) {
    // Kategori 
    $router->get('kategori', ['uses' => 'KategoriController@index']);
    $router->get('kategori/{id}', ['uses' => 'KategoriController@show']);
    $router->post('kategori', ['uses' => 'KategoriController@create']);
    $router->delete('kategori/{id}', ['uses' => 'KategoriController@destroy']);
    $router->put('kategori/{id}', ['uses' => 'KategoriController@update']);

    // Pelanggan
    $router->get('pelanggan', ['uses' => 'PelangganController@index']);
    $router->get('pelanggan/{id}', ['uses' => 'PelangganController@show']);
    $router->post('pelanggan', ['uses' => 'PelangganController@create']);
    $router->delete('pelanggan/{id}', ['uses' => 'PelangganController@destroy']);
    $router->put('pelanggan/{id}', ['uses' => 'PelangganController@update']);

    // Menu
    $router->get('menu', ['uses' => 'MenuController@index']);
    $router->get('menu/{id}', ['uses' => 'MenuController@show']);
    $router->post('menu', ['uses' => 'MenuController@create']);
    $router->delete('menu/{id}', ['uses' => 'MenuController@destroy']);
    $router->put('menu/{id}', ['uses' => 'MenuController@update']);
});