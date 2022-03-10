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

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth','is_admin']
], function(){
    Route::get('/','IndexController@index')->name('index');
    Route::get('/parser', 'ParserController@index')->name('parser');
    /*
    |--------------------------------------------------------------------------
    | CRUD Пользователей
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/users','UsersController@index')->name('users');
    Route::get('/users/destroy/{user}','UsersController@destroyUser')->name('destroyUser');
    Route::get('/users/toggle_admin/{user}','UsersController@toggleAdmin')->name('toggleAdmin');
    /*
    |--------------------------------------------------------------------------
    | CRUD Новостей
    |--------------------------------------------------------------------------
    |
    */
    Route::match(['get', 'post'], '/create','NewsController@create')->name('create');
    Route::get('/edit/{news}','NewsController@edit')->name('edit');
    Route::get('/delete/{news}','NewsController@delete')->name('delete');
    Route::post('/update/{news}','NewsController@update')->name('update');
});



Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);


Route::group([
        'prefix' => 'news'
    ], function () {
    Route::get('/', 'NewsController@index')->name('news');
    Route::get('/categories', 'CategoryController@category_list')->name('category_list');
    Route::get('/categories/{category}', 'CategoryController@category')->name('category');
    Route::get('/chosed/{news}','NewsController@show')->name('news_one');
});
Auth::routes();

Route::get('/login/vk', 'LoginController@loginVK')->name('loginvk');
Route::get('/login/vk/response', 'LoginController@responseVK')->name('responsevk');
Route::get('/login/github', 'LoginController@loginGitHub')->name('logingit');
Route::get('/login/github/response', 'LoginController@responseGitHub')->name('responsegit');

Route::match(['get', 'post'], '/profile', 'ProfileController@update')->name('updateProfile');
