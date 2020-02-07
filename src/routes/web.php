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

Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => 'auth:employee'], function () {
        Route::get  ('/home',                               ['as' => 'dashboard',           'uses' => 'Dashboard\DashboardController@dashboard']);

        Route::get  ('/home/car/register',                  ['as' => 'car.register',        'uses' => 'Car\CarController@register']);
        Route::post ('/home/car/create',                    ['as' => 'car.create',          'uses' => 'Car\CarController@create']);
        Route::get  ('/home/car/edit/{id}',                 ['as' => 'car.edit',            'uses' => 'Car\CarController@edit']);
        Route::put  ('/home/car/edit/{id}/update',          ['as' => 'car.update',          'uses' => 'Car\CarController@update']);
        Route::get  ('/home/car/edit/{id}/remove',          ['as' => 'car.remove',          'uses' => 'Car\CarController@remove']);
        Route::get  ('/home/car/list',                      ['as' => 'car.list',            'uses' => 'Car\CarController@list']);
        Route::post ('/home/car/list/pdf/',                 ['as' => 'car.list.pdf',        'uses' => 'Car\CarController@listPdf']);
        Route::get  ('/home/car/list/xls/',                 ['as' => 'car.list.xls',        'uses' => 'Car\CarController@exportXls']);
        Route::get  ('/home/car/view/{id}',                 ['as' => 'car.view',            'uses' => 'Car\CarController@view']);

        Route::get  ('/home/branch/register',               ['as' => 'branch.register',     'uses' => 'Branch\BranchController@register']);
        Route::post ('/home/branch/create',                 ['as' => 'branch.create',       'uses' => 'Branch\BranchController@create']);
        Route::get  ('/home/branch/edit/{id}',              ['as' => 'branch.edit',         'uses' => 'Branch\BranchController@edit']);
        Route::put  ('/home/branch/edit/{id}/update',       ['as' => 'branch.update',       'uses' => 'Branch\BranchController@update']);
        Route::get  ('/home/branch/edit/{id}/active',       ['as' => 'branch.active',       'uses' => 'Branch\BranchController@active']);
        Route::get  ('/home/branch/edit/{id}/inactive',     ['as' => 'branch.inactive',     'uses' => 'Branch\BranchController@inactive']);
        Route::get  ('/home/branch/edit/{id}/remove',       ['as' => 'branch.remove',       'uses' => 'Branch\BranchController@remove']);
        Route::get  ('/home/branch/list',                   ['as' => 'branch.list',         'uses' => 'Branch\BranchController@list']);
        Route::post ('/home/branch/list/pdf/',              ['as' => 'branch.list.pdf',     'uses' => 'Branch\BranchController@listPdf']);
        Route::get  ('/home/branch/list/xls/',              ['as' => 'branch.list.xls',     'uses' => 'Branch\BranchController@exportXls']);
        Route::get  ('/home/branch/view/{id}',              ['as' => 'branch.view',         'uses' => 'Branch\BranchController@view']);
        Route::get  ('/home/branch/ie-mask/{uf}',           ['as' => 'branch.ie-mask',      'uses' => 'Branch\BranchController@ieMask']);

        Route::get  ('/home/employee/register',             ['as' => 'employee.register',   'uses' => 'Employee\EmployeeController@register']);
        Route::post ('/home/employee/create',               ['as' => 'employee.create',     'uses' => 'Employee\EmployeeController@create']);
        Route::get  ('/home/employee/edit/{id}',            ['as' => 'employee.edit',       'uses' => 'Employee\EmployeeController@edit']);
        Route::put  ('/home/employee/edit/{id}/update',     ['as' => 'employee.update',     'uses' => 'Employee\EmployeeController@update']);
        Route::get  ('/home/employee/edit/{id}/active',     ['as' => 'employee.active',     'uses' => 'Employee\EmployeeController@active']);
        Route::get  ('/home/employee/edit/{id}/inactive',   ['as' => 'employee.inactive',   'uses' => 'Employee\EmployeeController@inactive']);
        Route::get  ('/home/employee/edit/{id}/remove',     ['as' => 'employee.remove',     'uses' => 'Employee\EmployeeController@remove']);
        Route::get  ('/home/employee/list',                 ['as' => 'employee.list',       'uses' => 'Employee\EmployeeController@list']);
        Route::post ('/home/employee/list/pdf/',            ['as' => 'employee.list.pdf',   'uses' => 'Employee\EmployeeController@listPdf']);
        Route::get  ('/home/employee/list/xls/',            ['as' => 'employee.list.xls',   'uses' => 'Employee\EmployeeController@exportXls']);
        Route::get  ('/home/employee/view/{id}',            ['as' => 'employee.view',       'uses' => 'Employee\EmployeeController@view']);
    });

    Route::get  ('/', function () {
        return view('login.index');
    });

    Route::get  ('/login',                          ['as' => 'login',               'uses' => 'Employee\EmployeeController@login']);
    Route::get  ('/logout',                         ['as' => 'logout',              'uses' => 'Employee\EmployeeController@logout']);
    Route::post ('/login/auth',                     ['as' => 'login.auth',          'uses' => 'Employee\EmployeeController@auth']);
});

//=======================================================================================================================================================
//     Beta (Tests)
//=======================================================================================================================================================

Route::get  ('/home/car/register/beta',             ['as' => 'car.register.beta',           'uses' => 'Car\CarController@registerBeta']);
Route::get  ('/home/car/list/beta',                 ['as' => 'car.list.beta',               'uses' => 'Car\CarController@listBeta']);
Route::get  ('/home/branch/register/beta',          ['as' => 'branch.register.beta',        'uses' => 'Branch\BranchController@registerBeta']);
Route::get  ('/home/branch/list/beta',              ['as' => 'branch.list.beta',            'uses' => 'Branch\BranchController@listBeta']);
Route::get  ('/home/employee/register/beta',        ['as' => 'employee.register.beta',      'uses' => 'Employee\EmployeeController@registerBeta']);
Route::get  ('/home/employee/list/beta',            ['as' => 'employee.list.beta',          'uses' => 'Employee\EmployeeController@listBeta']);
Route::get  ('/home/employee/edit/beta/{id}',       ['as' => 'employee.edit.beta',          'uses' => 'Employee\EmployeeController@editBeta']);
Route::get  ('/home/branch/edit/beta/{id}',         ['as' => 'branch.edit.beta',            'uses' => 'Branch\BranchController@editBeta']);
Route::get  ('/home/employee/edit/beta/{id}',       ['as' => 'employee.edit.beta',          'uses' => 'Employee\EmployeeController@editBeta']);
Route::get  ('/home/car/edit/beta/{id}',            ['as' => 'car.edit.beta',               'uses' => 'Car\CarController@editBeta']);