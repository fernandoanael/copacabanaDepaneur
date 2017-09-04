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

Route::get('/', 'HomeController@index')->name('home');
//Auth::routes();

/*
 *  Products Routes (Could've been Resource)
 */
Route::get('/products', 'ProductsController@index')->name('products.index');

Route::get('/products/{id}', 'ProductsController@show')->name('products.single');

Route::put('/products/{id}', 'ProductsController@update' )->name('products.update');

Route::get('/products/create/new', 'ProductsController@create')->name('products.new');

Route::post('/products/create/new', 'ProductsController@store')->name('products.storeNew');

Route::get('products/delete/{id}', 'ProductsController@destroy')->name('products.delete');

/*
 *  Employees Routes (Resource Too)
 */

 Route::get('/employees', 'EmployeesController@index')->name('employees.index');

 Route::get('/employees/{id}', 'EmployeesController@show')->name('employees.single');

 Route::put('/employees/{id}', 'EmployeesController@update')->name('employees.update');

 Route::get('/employees/create/new', 'EmployeesController@create')->name('employees.new');

 Route::post('/employees/create/new', 'employeesController@store')->name('employees.storeNew');

 Route::get('employees/delete/{id}', 'employeesController@destroy')->name('employees.delete');

 /*
  * Order Routes 
  */
  Route::get('/orders/create/new', 'OrdersController@create')->name('orders.new');
  Route::get('/orders', 'OrdersController@show')->name('orders.index');