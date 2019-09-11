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
        $route->get('/', 'Api\Category\ListAction')->name('category.list');
        $route->get('detail/{id}', 'Api\Category\DetailAction')->name('category.detail');
        $route->post('create', 'Api\Category\CreateAction')->name('category.create');
        $route->get('delete/{id}', 'Api\Category\DeleteAction')->name('category.delete');
        $route->post('update/{id}', 'Api\Category\UpdateAction')->name('category.update');
    });

    $route->group(['prefix' => 'product'], function ($route) {
        $route->get('/', 'Api\Product\ListAction')->name('product.list');
        $route->post('create', 'Api\Product\CreateAction')->name('product.create');
        $route->get('delete/{id}', 'Api\Product\DeleteAction')->name('product.delete');
        $route->post('update/{id}', 'Api\Product\UpdateAction')->name('product.update');
    });

    $route->group(['prefix' => 'customer'], function ($route) {
        $route->get('/', 'Api\Customer\ListAction')->name('customer.list');
        $route->get('/detail/{id}', 'Api\Customer\DetailAction')->name('customer.detail');
        $route->get('/delete/{id}', 'Api\Customer\DeleteAction')->name('customer.delete');
    });

    $route->group(['prefix' => 'sales'], function ($route) {
        $route->get('/history', 'Api\Sales\HistoryAction')->name('sales.history');
        $route->post('/cart', 'Api\Sales\BuyAction')->name('sales.buy');
    });
});