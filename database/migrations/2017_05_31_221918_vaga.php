<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vag_empresa_cod')->unsigned();
            $table->foreign('vag_empresa_cod')
                    ->references('emp_cod')
                    ->on('empresas')
                    ->onDelete('cascade');
            $table->string('vag_nome');
            $table->string('vag_tipoPag');
            $table->float('vag_valorPag');    
            $table->string('vag_escolar');           
            $table->string('vag_estado');
            $table->string('vag_regime');
            $table->string('vag_dias'); 
            $table->string('vag_horario'); 
            $table->string('vag_beneficios');            
            $table->integer('vag_active')->default(1);
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
        //
    }
}
