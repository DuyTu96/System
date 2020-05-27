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

// ***** Router For Dashboard Admin *****
Route::group([
    'prefix' => 'admin',
    // 'middleware' => 'auth',
    'as' => 'admin.',
    'namespace' => 'Admin',
], function () {
    Route::get('', [
        'as' => 'admin.dashboard.index',
        'uses' => 'DashboardController@index'
    ]);
    Route::resource('categories', 'CategoryController', [
        'parameters' => ['categories' => 'id']
    ]);
    Route::resource('courses', 'CourseController', [
        'parameters' => ['courses' => 'id']
    ]);
    Route::resource('subjects', 'SubjectController', [
        'parameters' => ['subjects' => 'id']
    ]);
    Route::resource('tasks', 'TaskController', [
        'parameters' => ['tasks' => 'id']
    ]);
    Route::resource('users', 'UserController', [
        'parameters' => ['users' => 'id']
    ]);

    Route::post('/ajax/get_category', 'CategoryController@getCategory');
    Route::post('/ajax/edit_category', 'CategoryController@editCategory');
    Route::post('/ajax/delete_category', 'CategoryController@deleteCategory');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
