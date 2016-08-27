<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//Auth::routes();
Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


Route::group(['middleware' => ['auth']], function() {

    Route::resource('users','UserController');

    //----------------------------------------------

    Route::get('roles',[
        'as'=>'roles.index',
        'uses'=>'RoleController@index',
        'middleware' => ['permission:role-list|role-create|role-edit|role-delete']
    ]);

    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::post('roles',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]); //create

    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']); //Read

    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);  //Update

    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

    //----------------------------------------------

    Route::get('clients',[
        'as'=>'clients.index',
        'uses'=>'ClientController@index',
        'middleware' => ['permission:item-list|item-create|item-edit|item-delete']
    ]);
    Route::get('clients/create',['as'=>'clients.create','uses'=>'ClientController@create','middleware' => ['permission:item-create']]);
    Route::post('clients',['as'=>'clients.store','uses'=>'ClientController@store','middleware' => ['permission:item-create']]);


    Route::get('clients/{id}',['as'=>'clients.show','uses'=>'ClientController@show']);
    Route::get('clients/{id}/edit',['as'=>'clients.edit','uses'=>'ClientController@edit','middleware' => ['permission:item-edit']]);
    Route::patch('clients/{id}',['as'=>'clients.update','uses'=>'ClientController@update','middleware' => ['permission:item-edit']]);
    Route::delete('clients/{id}',['as'=>'clients.destroy','uses'=>'ClientController@destroy','middleware' => ['permission:item-delete']]);
});