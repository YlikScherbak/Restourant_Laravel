<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('info');

Route::get('/', function () {
    return redirect(route('login'));
});

Route::group(['prefix' => 'waiter', 'middleware' => [ 'auth', 'waiter', 'work_shift']], function () {
    Route::get('/table', ['uses' => 'Waiter\TableController@show', 'as' => 'waiter_tables']);
    Route::get('/table/{id}/create', ['uses' => 'Waiter\TableController@create', 'as' => 'create_order']);

    Route::group(['prefix' => '/order'], function () {

        Route::get('/all/', ['uses' => 'Waiter\OrderController@allOrders', 'as' => 'all_orders']);

        Route::group(['middleware' => ['waiter_orders']], function () {

            Route::get('/{id}', ['uses' => 'Waiter\OrderController@showOrder', 'as' => 'waiter_order']);
            Route::post('/{id}/add', ['uses' => 'Waiter\OrderController@addProduct', 'as' => 'add_product']);
            Route::get('/{id}/menu', ['uses' => 'Waiter\MenuController@showMenu', 'as' => 'menu']);
            Route::get('/{id}/setdiscount/{discount}', ['uses' => 'Waiter\OrderController@setDiscount', 'as' => 'set_disc']);
            Route::get('/{id}/discount/disable', ['uses' => 'Waiter\OrderController@disableDiscount', 'as' => 'disable_disc']);
            Route::get('/{id}/close', ['uses' => 'Waiter\OrderController@closeOrder', 'as' => 'close_order']);
            Route::post('/{id}/error', ['uses' => 'Waiter\OrderController@sendError', 'as' => 'send_error']);

        });

    });
});

