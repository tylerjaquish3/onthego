<?php

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

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::resource('/', 'HomeController');

/*
|--------------------------------------------------------------------------
| Public Posts
|--------------------------------------------------------------------------
*/
// Route::resource('/posts', 'PostController');


// Authentication
Route::get('/login', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('/login', 'Auth\AuthController@login')->name('auth.post');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

// Admin Routes
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', function () {
        return Redirect::route('dashboard.index');
    })->name('dashboard');

    Route::get('/403', function () {
        return view('errors.403');
    });
    Route::get('/404', function () {
        return view('errors.404');
    });

    Route::get('info', function(){phpinfo();});

    // Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Photos
    |--------------------------------------------------------------------------
    */
    Route::resource('/photos', 'PhotoController');

    /*
    |--------------------------------------------------------------------------
    | Post
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function() {
        Route::get('posts', 'PostController@getPostData')->name('posts');
    });
    Route::resource('/posts', 'PostController');

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
        Route::get('posts', 'DashboardController@getPostData')->name('posts');
    });
    Route::resource('/dashboard', 'DashboardController');

    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */
    Route::resource('/users', 'UserController');

});

