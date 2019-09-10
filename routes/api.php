<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

], function ($route) {
    $route->group(['prefix' => 'category'], function ($route) {
        $route->get('/', 'Api\Category\ListAction');
        $route->get('detail/{id}', 'Api\Category\DetailAction');
        $route->post('create', 'Api\Category\CreateAction');
        $route->get('delete/{id}', 'Api\Category\DeleteAction');
    });

    $route->group(['prefix' => 'product'], function ($route) {
        $route->get('/', 'Api\Product\ListAction');
        $route->post('create', 'Api\Product\CreateAction');
        $route->get('delete/{id}', 'Api\Product\DeleteAction');
        $route->get('update/{id}', 'Api\Product\UpdateAction');
    });

});