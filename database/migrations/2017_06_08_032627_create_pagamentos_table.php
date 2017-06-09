<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration
{
    public function up()
    {
        Schema::create('pagamento', function (Blueprint $table) {
            $table->increments('pag_cod');
            $table->string('pag_descriçao');
            $table->string('pag_servi_prest');  
            $table->string('pag_empresa');
               
            $table->date('pag_data_atual');         
            $table->string('pag_Valor Unit');
            
            $table->timestamps();          
         });
    }

    public function down()
    {
        Schema::dropIfExists('pagamento');
        
    }
}
