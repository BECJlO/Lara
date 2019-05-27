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



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'checkAdmin'] ], function ($router) {
   Route::get('/', 'AdminController@index')->name('admin.index');
   $router->resource('task', 'TaskController',['as' => 'admin']);
   $router->resource('service', 'ServiceController', ['as' => 'admin']);
   $router->resource('order', 'OrderController', ['as' => 'admin']);
   $router->resource('exe-service', 'ExeServiceController', ['as' => 'admin']);
   $router->resource('exe-task', 'ExeTaskController', ['as' => 'admin']);
   $router->resource('room', 'RoomController', ['as' => 'admin']);
   $router->resource('user', 'UserController', ['as' => 'admin']);
   $router->resource('image', 'ImageController', ['as' => 'admin']);
   $router->resource('warning', 'WarningController', ['as' => 'admin']);
   $router->resource('worker', 'WorkerController', ['as' => 'admin']);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/worker', 'LodgerController@index')->middleware('auth', 'checkWorker')->name('worker.index');
Route::get('/worker/profile', 'LodgerController@profile')->middleware('auth', 'checkWorker')->name('worker.profile');
Route::get('/worker/tasks', 'LodgerController@tasks')->middleware('auth', 'checkWorker')->name('worker.tasks');
Route::get('/worker/map', 'LodgerController@map')->middleware('auth', 'checkWorker')->name('worker.map');
Route::get('/worker/changestatustaks/{status}', 'LodgerController@changeStatusTaks')->middleware('auth', 'checkWorker')->name('worker.changeStatusTask');


Route::get('/employee', 'EmployeeController@index')->middleware('auth')->name('employee.index');
Route::get('/profile', 'EmployeeController@profile')->middleware('auth')->name('employee.profile');
Route::get('/employee/room', 'EmployeeController@room')->middleware('auth')->name('employee.room');
Route::get('/employee/service/{id?}', 'EmployeeController@service')->middleware('auth')->name('employee.service');
Route::get('/employee/cservice/{id}', 'EmployeeController@cservice')->middleware('auth')->name('employee.createSevr');
Route::get('/employee/map', 'EmployeeController@map')->middleware('auth')->name('employee.map');

//Route::get('/admin', 'AdminController@index')->name('admin')->middleware('checkAdmin');

//Route::get('/task', 'TaskController@create')->name('taskCreate');
//Route::get('/task', 'TaskController@create')->name('taskCreate');
//Route::get('/serv', 'ServiceController@update')->name('ServCreate');
//Route::get('/serv', 'ServiceController@update')->name('ServCreate');






//Route::get('/home', 'HomeController@index')->name('home');
