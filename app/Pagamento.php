<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
        protected $fillable = [
            
            'func_Empresa', 'func_Serviços_Prestados','func_DataAtual','func_Valor_Unitario','func_Descriçao',
            'func_Tipopag',
        ];
        
        public $rules = [
            
            'func_Empresa'=>"required",
            'func_Serviços_Prestados'=>"required",
            'func_DataAtual'=>"required",
            'func_Valor_Unitario'=>"required",
            'func_Descriçao'=>"required",
            'func_Tipopag'=>"required",
            
            
            
        ];
        
        public $rulesEdit = [
            
            'func_Empresa'=>"required",
            'func_Serviços_Prestados'=>"required",
            'func_DataAtual'=>"required",
            'func_Valor_Unitario'=>"required",
            'func_Descriçao'=>"required",
            'func_Tipopag'=>"required",
        ];
        
 
        
}