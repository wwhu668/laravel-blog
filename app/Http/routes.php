<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');
Route::resource('home', 'HomeController');
Route::get('home/{home}/category', ['as' => 'home.category', 'uses' => 'HomeController@category']);
Route::get('home/{home}/author', ['as' => 'home.author', 'uses' => 'HomeController@author']);
Route::get('home/{home}/tag', ['as' => 'home.tag', 'uses' => 'HomeController@tag']);

Route::get('search', ['as' => 'search', 'uses' => 'HomeController@search']);
Route::post('home/comment/store', ['as' => 'comment.store', 'uses' => 'CommentController@store']);


Route::get('admin', 'AdminController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]); 

Route::get('sidebar', function(){
    return view('sidebar.sidebar');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
{
    Route::get('/', 'DashboardController@index');
    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController');
    Route::resource('tag', 'TagController');
    Route::post('upload/img', 'UploadFileController@postImg');
    Route::get('setup', 'SetupController@index');
    Route::post('setup/store', 'SetupController@store');
    Route::get('comment', 'CommentController@index');
});


Route::get('sitemap', 'Admin\ArticleController@sitemap');

Route::get('feed', 'Admin\ArticleController@feed');

