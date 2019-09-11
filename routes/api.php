<?php

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register')->name('register');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('user', 'AuthController@user')->name('user');
    });
});

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::group([
        'middleware' => 'has_role_admin',
    ], function () {

    });

    Route::group(['prefix' => 'category'], function ($route) {
        Route::get('/', 'Api\Category\ListAction')
            ->name('category.list');

        Route::get('detail/{id}', 'Api\Category\DetailAction')
            ->name('category.detail');

        Route::post('create', 'Api\Category\CreateAction')
            ->name('category.create');

        Route::get('delete/{id}', 'Api\Category\DeleteAction')
            ->name('category.delete');

        Route::post('update/{id}', 'Api\Category\UpdateAction')
            ->name('category.update');
    });

    Route::group(['prefix' => 'product'], function ($route) {
        Route::get('/', 'Api\Product\ListAction')
            ->name('product.list');

        Route::post('create', 'Api\Product\CreateAction')
            ->name('product.create');

        Route::group([
            'middleware' => 'has_role_admin',
        ], function () {
            Route::get('delete/{id}', 'Api\Product\DeleteAction')
                ->name('product.delete');

            Route::post('update/{id}', 'Api\Product\UpdateAction')
                ->name('product.update');
        });
    });

    Route::group(['prefix' => 'customer'], function ($route) {
        Route::get('/', 'Api\Customer\ListAction')
            ->name('customer.list');

        Route::get('/detail/{id}', 'Api\Customer\DetailAction')
            ->name('customer.detail');

        Route::get('/delete/{id}', 'Api\Customer\DeleteAction')
            ->name('customer.delete');
    });

    Route::group(['prefix' => 'sales'], function () {
        Route::get('/history', 'Api\Sales\HistoryAction')
            ->name('sales.history');

        Route::group([
            'middleware' => 'has_role_customer',
        ], function () {
            Route::post('/cart', 'Api\Sales\BuyAction')
                ->name('sales.buy');
        });
    });
});
