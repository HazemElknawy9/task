<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::resource('profiles', 'ProfileController')->except(['show']);
            Route::get('/admin/check-pwd','ProfileController@chkPassword');
            Route::match(['get','post'], 'admin/update-pwd','ProfileController@updatePassword');
            // Settings 
            Route::get('settings', 'SettingsController@setting');
            Route::post('settings', 'SettingsController@setting_save')->name('settings');
            //roles site
            Route::resource('roles/site', 'RollSiteController')->except(['show']);
            Route::get('roles/site/destroy/all', 'RollSiteController@destroyAll')->name('role.site.destroy.all');
            Route::get('roles/site/destroy/{id}', 'RollSiteController@destroy');
            // roles 
            Route::resource('roles', 'RoleController')->except(['show']);
            Route::get('roles/destroy/all', 'RoleController@destroyAll')->name('role.destroy.all');
            Route::get('roles/destroy/{id}', 'RoleController@destroy');
            //user routes
            Route::resource('users', 'UserController')->except(['show']);
            Route::get('ajaxdata/massremove', 'UserController@massremove')->name('ajaxdata.massremove');
            Route::post('users/update', 'UserController@update')->name('users.update');
            Route::get('users/destroy/{id}', 'UserController@destroy');
            Route::get('users/active/{status}/{id}', 'UserController@userActive');     
            Route::get('/', 'WelcomeController@index')->name('welcome');
            //category routes
            Route::resource('categories', 'CategoryController')->except(['show']);
            Route::post('categories/update', 'CategoryController@update')->name('categories.update');
            Route::get('categories/destroy/all', 'CategoryController@destroyAll')->name('categories.destroy.all');
            Route::get('categories/destroy/{id}', 'CategoryController@destroy');
            Route::get('categories/active/{status}/{id}', 'CategoryController@categoryActive');
            //product routes
            Route::resource('products', 'ProductController')->except(['show']);
            Route::get('products/destroyall', 'ProductController@productsDestroyall')->name('products.destroyall');
            Route::get('products/destroy/{id}', 'ProductController@destroy');
            Route::get('products/active/{status}/{id}', 'ProductController@ProductActive'); 
            Route::get('view/vendors', 'ProductController@viewVendors'); 
            //client routes
            Route::resource('clients', 'ClientController')->except(['show']); 
            Route::resource('clients.orders', 'Client\OrderController')->except(['show']);
            Route::post('clients/update', 'ClientController@update')->name('clients.update');
            Route::get('clients/destroy/all', 'ClientController@destroyAll')->name('clients.destroy.all');
            Route::get('clients/destroy/{id}', 'ClientController@destroy');
            Route::get('clients/active/{status}/{id}', 'ClientController@clientActive'); 
            //vendors
            Route::resource('vendors', 'VendorController')->except(['show']); 
            Route::post('vendors/update', 'VendorController@update')->name('vendors.update');
            Route::get('vendors/destroy/all', 'VendorController@destroyAll')->name('vendors.destroy.all');
            Route::get('vendors/destroy/{id}', 'VendorController@destroy');
            Route::get('vendors/active/{status}/{id}', 'VendorController@vendorActive'); 
            //orders routes
            Route::resource('orders','OrdersController');  
            Route::get('/orders/{order}/products','Client\OrderController@products')->name('orders.products');
            // Paypal Thanks Page
            Route::get('/paypal/thanks','Client\OrderController@thanksPaypal');
            // Paypal Page
            Route::get('/paypal','Client\OrderController@paypal');
            Route::get('/paypal/cancel','Client\OrderController@cancelPaypal');

        });//end of dashboard routes
    });