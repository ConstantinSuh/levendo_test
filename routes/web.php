<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => ''], function (Router $router) {
    $router->get('/', 'BookmarkController@index');
    $router->get('/create', 'BookmarkController@create');
    $router->post('create', 'BookmarkController@store');
    $router->delete('/', 'BookmarkController@delete');
    $router->get('/{id}', 'BookmarkController@show')
        ->name('bookmark.show');
});
