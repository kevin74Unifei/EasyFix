<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $fillable = [
        'vag_cod','vag_nome','vag_tipoPag','vag_valorPag','vag_escolar',
        'vag_idioma','vag_estado','vag_regime','vag_dias',
        'vag_horario','vag_beneficios',   
    ];
    
       public $rules = [
            'vag_nome' => "required|min:3|max:100",
            'vag_tipoPag'=>'required',
            'vag_valorPag'=>'required',
            'vag_escolar'=>'required',
            'vag_idioma'=>'required',
            'vag_estado'=>'required',
            'vag_regime'=> "required",
            'vag_dias'=> "required",
            'vag_horario'=> "required",
            'vag_beneficios'=> "required"
        ];
        
        public $rulesEdit = [           
            'vag_nome' => "required",
            'vag_tipoPag'=>'required',
            'vag_valorPag'=>'required',
            'vag_escolar'=>'required',
            'vag_idioma'=>'required',
            'vag_estado'=>'required',
            'vag_regime'=> "required",
            'vag_dias'=> "required",
            'vag_horario'=> "required",
            'vag_beneficios'=> "required"
        ];
}
