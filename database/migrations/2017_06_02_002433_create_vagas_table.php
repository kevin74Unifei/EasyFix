<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration
{
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->increments('vag_id');
            $table->string('vag_nome');
            $table->string('vag_tipoPag');
            $table->string('vag_valorPag');      
            $table->string('vag_escolar');           
            $table->string('vag_idioma');
            $table->string('vag_estado');
            $table->string('vag_regime'); 
            $table->string('vag_dias'); 
            $table->string('vag_horario');
            $table->string('vag_beneficios');
            $table->integer('vag_active')->default(1);
            $table->timestamps();
         });
    }

    public function down()
    {
        Schema::dropIfExists('vagas');
        
    }
}
