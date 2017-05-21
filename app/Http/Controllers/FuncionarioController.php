<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;

class FuncionarioController extends Controller
{
    private $func;
    
    public function __construct(Funcionario $f){
        $this->func=$f;        
    }
    
    public function create(Request $request){
        $dataForm = $request->except('_token');
        $messages = [
            'func_nome.required' => "É obrigatorio preechimento do campo NOME",
            'func_nome.min' => "É obrigatorio preechimento do campo NOME com pelo menos 3 letras",
            'func_CPF.required' => "É obrigatorio preechimento do campo CPF",
            'func_RG.required'  => "É obrigatorio preechimento do campo RG",
            'func_cartTrab.required'=> "É obrigatorio preechimento do campo Carteira de trabalho",            
            'func_dataNasc.required'=> "É obrigatorio preechimento do campo Data de nascimento",
            'func_end_cidade.required'=> "É obrigatorio preechimento do campo Cidade",
            'func_end_estado.required'=> "É obrigatorio preechimento do campo Estado",
            'func_end_bairro.required'=> "É obrigatorio preechimento do campo Bairro",
            'func_end_rua.required'=> "É obrigatorio preechimento do campo Nome do Logradouro",
            'func_end_numero.required'=>"É obrigatorio preechimento do campo Numero",           
            'func_cargaHor.required'=>"É obrigatorio preechimento do carga Horária",
        ];
        
        
       /* if(!$dataForm['func_imagem']){
            $dataForm['func_imagem'] = url('img/avatar.png');
        }*/
        
        $dataForm['func_dataNasc']= implode("/",array_reverse(explode("/",$dataForm['func_dataNasc'])));
        
        $this->validate($request,$this->func->rules,$messages);
        $insert = $this->func->create($dataForm);
        
        if($insert)
           return redirect('/'); 
        else return redirect ()->back();            
    }
}
