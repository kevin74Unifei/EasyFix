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
Route::get('/home', function () {
    return view('painel/userView');    
});

Route::get('/', function () {
    return view('loginSystem');
})->middleware("CheckUser");

Route::post('/logar', 'UserController@login');
Route::get('/logout','UserController@logout');
Route::post('/testPass','UserController@testPass');

Route::get('/funcionario/list','FuncionarioController@index')->middleware("CheckUserAdmin");

Route::get('/funcionario/form/{id?}','FuncionarioController@create')->middleware("CheckUserAdmin");

Route::get('funcionario/show/{id}','FuncionarioController@show')->middleware("CheckUserAdmin");
        
Route::post('funcionario/cadastrar','FuncionarioController@store')->middleware("CheckUserAdmin");

Route::post('funcionario/edit/{id}','FuncionarioController@edit')->middleware("CheckUserAdmin");

Route::get('funcionario/delete/{id}','FuncionarioController@destroy')->middleware("CheckUserAdmin");

    
Route::get('cidades/{idEstado}', "siteController@getCidades");


Route::get('/usuario/list','UserController@index');

Route::get('/usuario/cadastro/{ent}/{id}', 'UserController@create');

Route::post('/usuario/cadastrar/', 'UserController@store');

Route::get('/usuario/formeditor/{id}','UserController@editor');

Route::post('usuario/edit/{id}','UserController@edit');

Route::get('usuario/delete/{ent}/{id}','UserController@destroy');


 
Route::get('/candidato/form/{id?}','CandidatoController@create');

Route::post('/candidato/cadastrar','CandidatoController@store');

Route::get('/candidato/list','CandidatoController@index');

Route::get('candidato/delete/{id}','CandidatoController@destroy');

Route::get('candidato/show/{id}','CandidatoController@show');

Route::post('candidato/edit/{id}','CandidatoController@edit');


Route::get('/empresa/form/{id?}', 'EmpresaController@create')->middleware("CheckUserAdmin");

Route::post('/empresa/cadastrar','EmpresaController@store')->middleware("CheckUserAdmin");

Route::get('/empresa/list', 'EmpresaController@index')->middleware("CheckUserAdmin");

Route::get('/empresa/show/{id}','EmpresaController@show')->middleware("CheckUserAdmin");

Route::post('/empresa/edit/{id}','EmpresaController@edit')->middleware("CheckUserAdmin");

Route::get('/empresa/delete/{id}','EmpresaController@destroy')->middleware("CheckUserAdmin");


Route::get('/curriculo/form', 'CurriculoController@create');