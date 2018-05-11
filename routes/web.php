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


Auth::routes();

// // Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');
Route::get('/', 'HomeController@index')->name('home');

 
\
Route::group(['middleware'=>'auth'], function(){
    Route::resource('alumni', 'alumni')->middleware('admin');
    Route::resource('mystatus', 'mystatusController');
    Route::resource('ubahpass', 'ubahpassController');
    Route::resource('komen', 'komenController');    
    Route::get('profil/{id}', 'alumni@profil');
    Route::patch('profil/{id}', 'alumni@updateprofil');
    Route::resource('status', 'statusController')->middleware('admin');;
    Route::resource('kategori', 'kategoriController')->middleware('admin');;
    Route::resource('bukutamu1', 'bukutamuController',['except' => ['create']])->middleware('admin');
    Route::resource('berita', 'beritaController', ['except' => ['index','show']]);
    Route::resource('forum', 'forumController', ['except' => ['index','show']]);
    Route::resource('detailforum', 'detailforumController');
});

Route::get('status', 'statusController@index');

Route::get('bukutamu', 'bukutamuController@create');
Route::get('berita', 'beritaController@index');
Route::get('forum', 'forumController@index');
Route::get('forum/{id}', 'forumController@show');
Route::get('berita/{id}', 'beritaController@show');
Route::get('detailforum', 'detailforumController@index');

