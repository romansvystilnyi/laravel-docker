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

Route::get('welcome', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Library'], function () {
    Route::resource('/', 'BookController')
        ->only('index')
        ->names('library.book');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');

// Admin
$groupData = [
    'namespace' => 'Library\Admin',
    'prefix'    => 'admin/library',
];

Route::group($groupData, function () {
    $methods = ['index', 'edit', 'update', 'create', 'store',];
    Route::resource('books', 'BookController')
        ->only($methods)
        ->names('library.admin.books');
});

$groupDataUsers = [
    'namespace' => 'Users\Admin',
    'prefix'    => 'admin',
];

Route::group($groupDataUsers, function () {
    $methods = ['index', 'edit', 'update', 'create', 'store', 'destroy',];
    Route::resource('users', 'UserController')
        ->only($methods)
        ->names('admin.users');
});
