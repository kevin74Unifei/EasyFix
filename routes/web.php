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
        
Route::post('funcionario/cadastrar','FuncionarioController@store');

Route::post('funcionario/edit/{id}','FuncionarioController@edit');

Route::get('funcionario/delete/{id}','FuncionarioController@destroy');

Route::get('/usuario/cadastro', function (){
   $title = "Usuarios";
   $ent = "Usua";
   return view('crud-usuario/CadastroUsuario', compact("title","ent"));
});
    

