<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;

class FuncionarioController extends Controller
{
    private $func;
    private $messages = [
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
    
    public function __construct(Funcionario $f){
        $this->func=$f;        
    }
    
    public function index(Request $request){        
        $title="SISSAR Painel Funcionario";        
       
        $filter = $request->all();//Carregando filtros        
        if($filter){//Se filtros existirem, carrega dados atraves da operação LIKE do sql, em ordem crescente
            $dadosFunc = $this->func->where($filter['campo_ent'],'LIKE',$filter['chave_busca'].'%')
                                ->orderBy('func_nome', 'asc')
                                ->get(); 
            
            $valor_filter_text = $filter['chave_busca'];
            $valor_filter_campo = $filter['campo_ent'];
        }else{//Senão existir filtros carrega todas as linhas da tabela, por ordem crescente.
            $dadosFunc = $this->func->orderBy('func_nome', 'asc')->get();
                                
        }       
        
        return view("crud-funcionario/funcionariosList",compact("dadosFunc",
                                                                "title",
                                                                "valor_filter_text",
                                                                "valor_filter_campo"));
    }
    
    public function create($func_cod=null){
        $title="SISSAR Cadastro Funcionario";
        $ent ="func";
        $fieldDateTitle="Data de Nascimento";
        $fieldDate="_dataNasc";
        
        if($func_cod!=null){
            $dadosFuncs = $this->func->where("func_cod",$func_cod)->get();   
            foreach($dadosFuncs as $d){
                $resp= [
                    'cod' => $d['func_cod'],
                    'nome' => $d['func_nome'],
                    'imagem' => $d['func_imagem'],
                    'CPF' => $d['func_CPF'], 
                    'RG' => $d['func_RG'],  
                    'cartTrab' => $d['func_cartTrab'],
                    'cargo' => $d['func_cargo'],
                    'data' => implode("/",array_reverse(explode("-",$d['func_dataNasc']))),
                    'end_cidade' => $d['func_end_cidade'],
                    'end_estado' => $d['func_end_estado'],
                    'end_bairro' => $d['func_end_bairro'],
                    'end_rua' => $d['func_end_rua'],
                    'end_numero' => $d['func_end_numero'],
                    'end_complemento' => $d['func_end_complemento'],
                    'end_logradouro' => $d['func_end_logradouro'],
                    'email' => $d['func_email'],
                    'telefone' => $d['func_telefone'],
                    'telefoneCel' => $d['func_telefoneCel'],
                    'sexo' => $d['func_sexo'],
                    'cargaHor'=>$d['func_cargaHor'],
                ];   
                break;
            }          
            return view('crud-funcionario/funcionariosForm',compact("title","ent","fieldDateTitle","fieldDate","resp"));
        }else{
            return view('crud-funcionario/funcionariosForm',compact("title","ent","fieldDateTitle","fieldDate")); 
        }                
    }
    
    public function store(Request $request){
        $dataForm = $request->except('_token');
        
       /* if(!$dataForm['func_imagem']){
            $dataForm['func_imagem'] = url('img/avatar.png');
        }*/
        
        $dataForm['func_dataNasc']= implode("/",array_reverse(explode("/",$dataForm['func_dataNasc'])));
        
        $this->validate($request,$this->func->rules,$this->messages);
        $insert = $this->func->create($dataForm);
        
        if($insert)
           return redirect('/'); 
        else return redirect ()->back();
    }
    
    public function edit($id,Request $request){
        $dataForm = $request->except('_token');
        
       /* if(!$dataForm['func_imagem']){
            $dataForm['func_imagem'] = url('img/avatar.png');
        }*/
        
        $dataForm['func_dataNasc']= implode("/",array_reverse(explode("/",$dataForm['func_dataNasc'])));
        
        $this->validate($request,$this->func->rules,$this->messages);
        $update = $this->func->where('func_cod',$id)->update($dataForm);
        
        if($update)
           return redirect('/funcionario/list'); 
        else return redirect ()->back();
    }
    
}
