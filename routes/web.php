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
    return view('loginSystem');
});

Route::post('/logar', function () {
    return view('loginSystem');
});

Route::get('/funcionario/list','FuncionarioController@index');

Route::get('/funcionario/form/{id?}','FuncionarioController@create');

Route::get('funcionario/show/{id}','FuncionarioController@show');
        
Route::post('funcionario/cadastrar','FuncionarioController@store');

Route::post('funcionario/edit/{id}','FuncionarioController@edit');

Route::get('funcionario/delete/{id}','FuncionarioController@destroy');


    
Route::get('cidades/{idEstado}', "siteController@getCidades");



Route::get('/usuario/list','UserController@index');

Route::get('/usuario/cadastro/{id?}', 'UserController@create');

Route::post('/usuario/cadastrar/', 'UserController@store');

Route::get('usuario/show/{id}','UserController@show');

Route::post('usuario/edit/{id}','UserController@edit');

Route::get('usuario/delete/{id}','UserController@destroy');
    