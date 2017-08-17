<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('info');

Route::get('/', function () {
    return redirect(route('login'));
});

Route::group(['prefix' => 'waiter', 'middleware' => ['auth', 'waiter', 'work_shift']], function () {

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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/main', ['uses' => 'Admin\AdminController@showMain', 'as' => 'admin_main']);

    Route::get('/messages', ['uses' => 'Admin\AdminController@showMessages', 'as' => 'admin_messages']);
    Route::get('/messages/delete/{id}', ['uses' => 'Admin\AdminController@deleteMessage', 'as' => 'delete_message']);

    Route::get('/workshift/open', ['uses' => 'Admin\AdminController@openShift', 'as' => 'open_shift']);
    Route::get('/workshift/close', ['uses' => 'Admin\AdminController@closeShift', 'as' => 'close_shift']);


    Route::group(['prefix' => '/waiter'], function () {

        Route::get('/all', ['uses' => 'Admin\AdminWaiterController@allWaiters', 'as' => 'admin_all_waiter']);
        Route::post('/enabled', ['uses' => 'Admin\AdminWaiterController@enabledWaiter', 'as' => 'waiter_enabled']);
        Route::match(['get', 'post'], '/edit/{id}', ['uses' => 'Admin\AdminWaiterController@editWaiter', 'as' => 'waiter_edit']);
        Route::match(['get', 'post'], '/register', ['uses' => 'Admin\AdminWaiterController@registerWaiter', 'as' => 'waiter_registry']);

        Route::group(['prefix' => '/menu'], function () {

            Route::match(['get', 'post'], '/add/main', ['uses' => 'Admin\AdminMenuController@addMain', 'as' => 'waiter_add_main']);
            Route::match(['get', 'post'], '/add/sub', ['uses' => 'Admin\AdminMenuController@addSub', 'as' => 'waiter_add_sub']);
            Route::match(['get', 'post'], '/add/prod', ['uses' => 'Admin\AdminMenuController@addProduct', 'as' => 'waiter_add_prod']);

            Route::get('/all_main', ['uses' => 'Admin\AdminMenuController@allMain', 'as' => 'menu_all_main']);
            Route::match(['get', 'post'],'/edit_main/{id}', ['uses' => 'Admin\AdminMenuController@editMain', 'as' => 'menu_edit_main']);
            Route::post('/delete_main', ['uses' => 'Admin\AdminMenuController@deleteMain', 'as' => 'menu_delete_main']);

            Route::get('/all_sub', ['uses' => 'Admin\AdminMenuController@allSub', 'as' => 'menu_all_sub']);
            Route::match(['get', 'post'],'/edit_sub/{id}', ['uses' => 'Admin\AdminMenuController@editSub', 'as' => 'menu_edit_sub']);
            Route::post('/delete_sub', ['uses' => 'Admin\AdminMenuController@deleteSub', 'as' => 'menu_delete_sub']);

            Route::get('/all_product', ['uses' => 'Admin\AdminMenuController@allProduct', 'as' => 'menu_all_prod']);
            Route::match(['get', 'post'],'/edit_product/{id}', ['uses' => 'Admin\AdminMenuController@editProduct', 'as' => 'menu_edit_prod']);
            Route::post('/delete_product', ['uses' => 'Admin\AdminMenuController@deleteProduct', 'as' => 'menu_delete_prod']);

        });

        Route::group(['prefix' => '/order'], function() {

            Route::get('/all/{active?}', ['uses' => 'Admin\AdminOrderController@allOrders', 'as' => 'all_waiters_orders']);
            Route::get('/edit/{id}', ['uses' => 'Admin\AdminOrderController@editOrder', 'as' => 'edit_order']);
            Route::post('/delete', ['uses' => 'Admin\AdminOrderController@deleteProduct', 'as' => 'delete_product']);
            Route::post('/search', ['uses' => 'Admin\AdminOrderController@searchOrder', 'as' => 'search_order']);

        });
    });
});

