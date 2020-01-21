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

Route::view('/branch/list/test', 'templates.list');

Route::get  ('/',                                   ['as' => 'redirect.login',      'uses' => 'Login\LoginController@index']);

Route::get  ('/login',                              ['as' => 'login',               'uses' => 'Login\LoginController@index']);
Route::post ('/login/auth',                         ['as' => 'login.auth',          'uses' => 'Login\LoginController@auth']);

Route::get  ('/home',                               ['as' => 'dashboard',           'uses' => 'Dashboard\DashboardController@dashboard']);

Route::get  ('/home/car/register',                  ['as' => 'car.register',        'uses' => 'Car\CarController@register']);
Route::post ('/home/car/create',                    ['as' => 'car.create',          'uses' => 'Car\CarController@create']);
Route::get  ('/home/car/edit/{id}',                 ['as' => 'car.edit',            'uses' => 'Car\CarController@edit']);
Route::put  ('/home/car/edit/{id}/update',          ['as' => 'car.update',          'uses' => 'Car\CarController@update']);
Route::get  ('/home/car/list',                      ['as' => 'car.list',            'uses' => 'Car\CarController@list']);

Route::get  ('/home/branch/register',               ['as' => 'branch.register',     'uses' => 'Branch\BranchController@register']);
Route::post ('/home/branch/create',                 ['as' => 'branch.create',       'uses' => 'Branch\BranchController@create']);
Route::get  ('/home/branch/edit/{id}',              ['as' => 'branch.edit',         'uses' => 'Branch\BranchController@edit']);
Route::put  ('/home/branch/edit/{id}/update',       ['as' => 'branch.update',       'uses' => 'Branch\BranchController@update']);
Route::get  ('/home/branch/edit/{id}/active',       ['as' => 'branch.active',       'uses' => 'Branch\BranchController@active']);
Route::get  ('/home/branch/edit/{id}/inactive',     ['as' => 'branch.inactive',     'uses' => 'Branch\BranchController@inactive']);
Route::get  ('/home/branch/list',                   ['as' => 'branch.list',         'uses' => 'Branch\BranchController@list']);
Route::get  ('/home/branch/list/test',              ['as' => 'branch.list.test',    'uses' => 'Branch\BranchController@listTest']);

Route::get  ('/home/employee/register',             ['as' => 'employee.register',   'uses' => 'Employee\EmployeeController@register']);
Route::post ('/home/employee/create',               ['as' => 'employee.create',     'uses' => 'Employee\EmployeeController@create']);
Route::get  ('/home/employee/edit/{id}',            ['as' => 'employee.edit',       'uses' => 'Employee\EmployeeController@edit']);
Route::put  ('/home/employee/edit/{id}/update',     ['as' => 'employee.update',     'uses' => 'Employee\EmployeeController@update']);
Route::get  ('/home/employee/edit/{id}/active',     ['as' => 'employee.active',     'uses' => 'Employee\EmployeeController@active']);
Route::get  ('/home/employee/edit/{id}/inactive',   ['as' => 'employee.inactive',   'uses' => 'Employee\EmployeeController@inactive']);
Route::get  ('/home/employee/list',                 ['as' => 'employee.list',       'uses' => 'Employee\EmployeeController@list']);