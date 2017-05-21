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

Route::get('/funcionario/cadastro', function () {
    $title="Funcionarios";
    $ent ="Func";
    return view('crud-funcionario/funcionariosCadastro',compact("title","ent"));
});

Route::post('/logar', function () {
    return view('loginSystem');
});

Route::get('/usuario/cadastro', function (){
   $title = "Usuarios";
   $ent = "Usua";
   return view('crud-usuario/CadastroUsuario', compact("title","ent"));
    
});
