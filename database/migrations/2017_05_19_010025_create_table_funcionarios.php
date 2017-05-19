<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('func_cod');
            $table->string('func_CPF',12);
            $table->string('func_nome');
            $table->string('func_cartTrab');
            $table->string('func_cargo');  
            $table->date('func_dataNasc');
            $table->string('func_end_cidade');
            $table->string('func_end_bairro'); 
            $table->string('func_end_rua'); 
            $table->string('func_end_numero'); 
            $table->string('func_end_complemento'); 
            $table->string('func_end_logradoro'); 
            $table->string('func_email');
            $table->string('func_telefone');
            $table->string('func_telefoneCel');
            $table->char('func_sexo',1);
            $table->integer('func_cargaHor');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
