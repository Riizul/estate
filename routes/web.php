<?php

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    // Route::get('/', 'PropertyController@index')->name('property.index');
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/contact', 'HomeController@contact')->name('home.contact');
    Route::get('/property', 'HomeController@property')->name('home.property');

    Route::get('/house-and-lot', 'HomeController@category')->name('home.house-and-lot');
    Route::get('/house-and-lot/{id}', 'HomeController@property'); 
    Route::get('/condominium', 'HomeController@category')->name('home.condominium');
    Route::get('/condominium/{id}', 'HomeController@property'); 
    Route::get('/for-rent', 'HomeController@category')->name('home.for-rent'); 
    Route::get('/for-rent/{id}', 'HomeController@property'); 

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
       

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        /**
         * Todo Routes
         */
        Route::group(['prefix' => 'todo'], function() {
            Route::get('/', 'TodoListController@index')->name('todo.index');
            Route::get('/create', 'TodoListController@create')->name('todo.create');
            Route::post('/create', 'TodoListController@store')->name('todo.store');
            Route::get('/{todo}/show', 'TodoListController@show')->name('todo.show');
            Route::get('/{id}/edit', 'TodoListController@edit')->name('todo.edit');
            Route::patch('/{todo}/update', 'TodoListController@update')->name('todo.update');
            Route::delete('/{todo}/delete', 'TodoListController@destroy')->name('todo.destroy');
        });

        /**
         * Properties Routes
         */
        Route::group(['prefix' => 'content'], function() {
            Route::get('/', 'PropertyController@index')->name('content.index');
            Route::get('/create', 'PropertyController@create')->name('content.create');
            Route::post('/create', 'PropertyController@store')->name('content.store');
            Route::get('/{todo}/show', 'PropertyController@show')->name('content.show');
            Route::get('/{id}/edit', 'PropertyController@edit')->name('content.edit');
            Route::patch('/{todo}/update', 'PropertyController@update')->name('content.update');
            Route::get('/{todo}/delete', 'PropertyController@destroy')->name('content.destroy');
            Route::get('/{id}/publish', 'PropertyController@publish')->name('content.publish');
        });

        /**
         * Location Routes
         */
        Route::group(['prefix' => 'location'], function() {
            Route::get('/', 'LocationController@index')->name('location.index');
            Route::post('/create', 'LocationController@store')->name('location.store');
            Route::get('/{todo}/delete', 'LocationController@destroy')->name('location.destroy');
        });

        /**
         * Type Routes
         */
        Route::group(['prefix' => 'type'], function() {
            Route::get('/', 'PropertyTypeController@index')->name('type.index');
            Route::post('/create', 'PropertyTypeController@store')->name('type.store');
            Route::get('/{todo}/delete', 'PropertyTypeController@destroy')->name('type.destroy');
        });

        /**
         * Setting Routes
         */
        Route::group(['prefix' => 'setting'], function() {
            Route::get('/', 'SettingController@index')->name('setting.index');
        });

       
        Route::post('/upload', 'UploadController@store');
        Route::get('/hello', 'UploadController@index');
      
    });
});
