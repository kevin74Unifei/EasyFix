<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use DB;

class FuncionarioController extends Controller
{
    private $func;
    private $messages = [//mensagens que serão exibidas quando a validação falhar
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
            $dadosFunc = $this->func->where("func_status",'1')
                                ->where($filter['campo_ent'],'LIKE',$filter['chave_busca'].'%')
                                ->orderBy('func_nome', 'asc')
                                ->get(); 
            
            $valor_filter_text = $filter['chave_busca'];
            $valor_filter_campo = $filter['campo_ent'];
        }else{//Senão existir filtros carrega todas as linhas da tabela, por ordem crescente.
            $dadosFunc = $this->func->where("func_status",'1')->orderBy('func_nome', 'asc')->get();                                
        }       
        
        return view("crud-funcionario/funcionariosList",compact("dadosFunc",
                                                                "title",
                                                                "valor_filter_text",
                                                                "valor_filter_campo"));
    }
    
    public function show($id){
        $dadosFunc = $this->func->where("func_cod",$id)->get()->first();  
        
        $title = "SISSAR ".$dadosFunc['func_nome'];
        return view('crud-funcionario/funcionarioView',compact("title","dadosFunc"));     
    }
    
    public function create($func_cod=null){
        
        $ent ="func";
        $fieldDateTitle="Data de Nascimento";
        $fieldDate="_dataNasc";
        
        $states = DB::select('select * from estados');
                
        if($func_cod!=null){//Se recebe um parametro, faz o que esta aqui dentro
            $title="SISSAR Edição Funcionario";
            $dadosFuncs = $this->func->where("func_cod",$func_cod)->get();   
            foreach($dadosFuncs as $d){
                $resp= [//guarda dados em um vetor com nomes genericos para ser utilizado pelo components-templates
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
            }//Retorna um formulario para alteração de dados.            
                $enabledEdition = [
                    'cod' => "disabled",
                    'nome' => "disabled",
                    'imagem' => "enabled",
                    'CPF' => "disabled", 
                    'RG' => "disabled",  
                    'cartTrab' => "disabled",
                    'cargo' =>  "enabled",
                    'data' => "disabled",
                    'end_cidade' => "enabled",
                    'end_estado' => "enabled",
                    'end_bairro' => "enabled",
                    'end_rua' => "enabled",
                    'end_numero' => "enabled",
                    'end_complemento' => "enabled",
                    'end_logradouro' => "enabled",
                    'email' => "enabled",
                    'telefone' => "enabled",
                    'telefoneCel' => "enabled",
                    'sexo' => "disabled",
                    'cargaHor'=> "enabled",
                    'action' => 'editar'
                ];
            return view('crud-funcionario/funcionariosForm',compact("title","ent","fieldDateTitle","fieldDate","resp","enabledEdition","states"));
        }else{//Se não tiver parametros retorna um formulario basico de cadastro
            $title="SISSAR Cadastro Funcionario";
            return view('crud-funcionario/funcionariosForm',compact("title","ent","fieldDateTitle","fieldDate","states")); 
        }                
    }
    
    public function store(Request $request){
        $dataForm = $request->except('_token');//recebendo dados dos input do formulario
        
        if($request->hasFile('func_imagem')){//Se existir imagem faz upload e armazena   
            $imagem = $request->file('func_imagem');
            $ext=$imagem->getClientOriginalExtension();            
            $filename = md5(time()).".".$ext;//Criando um nome que não será repetido
            $request->func_imagem->storeAs('public/storage/imgperfil', $filename); 
            $dataForm['func_imagem'] = $filename;
        }
        
        //mudando padrão de datas..
        $dataForm['func_dataNasc']= implode("/",array_reverse(explode("/",$dataForm['func_dataNasc'])));
        
        $this->validate($request,$this->func->rules,$this->messages);//Chamando validação dos dados de entrada
        $insert = $this->func->create($dataForm);//cadastrado no banco de dados 
        
        if($insert)//se ocorre com sucesso direciona para..
           return redirect('/'); 
        else return redirect ()->back();
    }
    
    public function edit($id,Request $request){
        $dataForm = $request->except('_token');//recebe dados do formulario
        
        if($request->hasFile('func_imagem')){//Se existir imagem faz upload e armazena   
            $imagem = $request->file('func_imagem');
            $ext=$imagem->getClientOriginalExtension();            
            $filename = md5(time()).".".$ext;//Criando um nome que não se repetirar
            $request->func_imagem->storeAs('public/imgperfil', $filename); 
            $dataForm['func_imagem'] = $filename;
        }
        
        $this->validate($request,$this->func->rulesEdit,$this->messages);//Chamando validação dos dados de entrada
        $update = $this->func->where('func_cod',$id)->update($dataForm);//alterado a linha selecionada no banco de dados     
              
        if($update)
           return redirect('/funcionario/list'); 
        else return redirect ()->back();
    }
    
    public function destroy($id){
        //fazendo a alteração do status da linha do banco de dados 
        $update = $this->func->where('func_cod',$id)->update(["func_status"=>'0']);
        
         if($update)//se feito com sucesso direciona para...
           return redirect('/funcionario/list'); 
        else return redirect ()->back();
    }    
}
