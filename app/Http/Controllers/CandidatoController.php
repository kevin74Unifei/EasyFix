<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Candidato;
use DB;

class CandidatoController extends Controller
{
    private $cand;
    private $messages = [//mensagens que serão exibidas quando a validação falhar
            'cand_nome.required' => "É obrigatorio preechimento do campo NOME",
            'cand_nome.min' => "É obrigatorio preechimento do campo NOME com pelo menos 3 letras",
            'cand_CPF.required' => "É obrigatorio preechimento do campo CPF",
            'cand_RG.required'  => "É obrigatorio preechimento do campo RG",            
            'cand_dataNasc.required'=> "É obrigatorio preechimento do campo Data de nascimento",
            'cand_end_cidade.required'=> "É obrigatorio preechimento do campo Cidade",
            'cand_end_estado.required'=> "É obrigatorio preechimento do campo Estado",
            'cand_end_bairro.required'=> "É obrigatorio preechimento do campo Bairro",
            'cand_end_rua.required'=> "É obrigatorio preechimento do campo Nome do Logradouro",
            'cand_end_numero.required'=>"É obrigatorio preechimento do campo Numero",
            'cand_email.required'=>"É obrigatorio preechimento do campo E-mail"
    ];
    
    public function __construct(Candidato $f){
        $this->cand=$f;        
    }
    
    public function create($cand_cond = null){
        $ent = "cand";
        $title = "SISSAR Candidatos Painel";
        $fieldDateTitle="Data de Nascimento";
        $fieldDate="_dataNasc";
        
        $states = DB::select('select * from estados');//pesquisando estados do Brasil no banco
        if(!$cand_cond!=null){
            return view("crud-candidato/candidatoForm",compact("ent","title","states","fieldDate","fieldDateTitle"));
        }
    }
    
    public function store(Request $request){
        $dadosForm = $request->except('_token');//recebendo dados dos input do formulario
        
        if($request->hasFile('cand_imagem')){//Se existir imagem faz upload e armazena   
            $imagem = $request->file('cand_imagem');
            $ext=$imagem->getClientOriginalExtension();            
            $filename = md5(time()).".".$ext;//Criando um nome que não será repetido
            $request->cand_imagem->storeAs('public/storage/imgperfil', $filename); 
            $dadosForm['cand_imagem'] = $filename;
        }
        
        //mudando padrão de datas..
        $dadosForm['cand_dataNasc']= implode("/",array_reverse(explode("/",$dadosForm['cand_dataNasc'])));
        //dd($dadosForm);
        $this->validate($request,$this->cand->rules,$this->messages);//Chamando validação dos dados de entrada
        $insert = $this->cand->create($dadosForm);//cadastrado no banco de dados 
        
        if($insert)//se ocorre com sucesso direciona para..
           return redirect('/'); 
        else return redirect ()->back();
    }
}
