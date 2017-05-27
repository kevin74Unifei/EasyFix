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
})->middleware("CheckUser");

Route::post('/logar', 'UserController@login');
Route::get('/logout','UserController@logout');

Route::get('/funcionario/list','FuncionarioController@index')->middleware("CheckUserAdmin");

Route::get('/funcionario/form/{id?}','FuncionarioController@create');

Route::get('funcionario/show/{id}','FuncionarioController@show');
        
Route::post('funcionario/cadastrar','FuncionarioController@store');

Route::post('funcionario/edit/{id}','FuncionarioController@edit');

Route::get('funcionario/delete/{id}','FuncionarioController@destroy')->middleware("CheckUserAdmin");


    
Route::get('cidades/{idEstado}', "siteController@getCidades");



Route::get('/usuario/list','UserController@index');

Route::get('/usuario/cadastro/{id?}', 'UserController@create');

Route::post('/usuario/cadastrar/', 'UserController@store');

Route::get('/usuario/formeditor/{id}','UserController@editor')->middleware("CheckUserAdmin");

Route::post('usuario/edit/{id}','UserController@edit');

Route::get('usuario/delete/{id}','UserController@destroy');



 
Route::get('/candidato/form/{id?}','CandidatoController@create');

Route::post('/candidato/cadastrar','CandidatoController@store');

Route::get('/candidato/list','CandidatoController@index');

Route::get('candidato/delete/{id}','CandidatoController@destroy');

Route::get('candidato/show/{id}','CandidatoController@show');

Route::post('candidato/edit/{id}','CandidatoController@edit');

