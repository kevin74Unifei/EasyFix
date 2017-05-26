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
    
    public function index(Request $request){
        $title="SISSAR Painel Candidatos";        
       
        $filter = $request->all();//Carregando filtros        
        if($filter){//Se filtros existirem, carrega dados atraves da operação LIKE do sql, em ordem crescente
            $dadosCandadosCand = $this->cand->where("cand_status",'1')
                                ->where($filter['campo_ent'],'LIKE',$filter['chave_busca'].'%')
                                ->orderBy('cand_nome', 'asc')
                                ->get(); 
            
            $valor_filter_text = $filter['chave_busca'];
            $valor_filter_campo = $filter['campo_ent'];
        }else{//Senão existir filtros carrega todas as linhas da tabela, por ordem crescente.
            $dadosCandadosCand = $this->cand->where("cand_status",'1')->orderBy('cand_nome', 'asc')->get();                                
        }       
        
        return view("crud-candidato/candidatosList",compact("dadosCand",
                                                                "title",
                                                                "valor_filter_text",
                                                                "valor_filter_campo"));
    }
    
    public function create($cand_cod = null){
        $ent = "cand";
        $title = "SISSAR Candidatos Painel";
        $fieldDateTitle="Data de Nascimento";
        $fieldDate="_dataNasc";
        
        $states = DB::select('select * from estados');//pesquisando estados do Brasil no banco    
        
        if($cand_cod!=null){//Se recebe um parametro, faz o que esta aqui dentro
            $title="SISSAR Edição Funcionario";
            $dadosCand = $this->cand->where("cand_cod",$cand_cod)->get()->first();   
           
                $resp= [//guarda dados em um vetor com nomes genericos para ser utilizado pelo components-templates
                    'cod' => $dadosCand['cand_cod'],
                    'nome' => $dadosCand['cand_nome'],
                    'imagem' => $dadosCand['cand_imagem'],
                    'CPF' => $dadosCand['cand_CPF'], 
                    'RG' => $dadosCand['cand_RG'],  
                    'data' => implode("/",array_reverse(explode("-",$dadosCand['cand_dataNasc']))),
                    'end_cidade' => $dadosCand['cand_end_cidade'],
                    'end_estado' => $dadosCand['cand_end_estado'],
                    'end_bairro' => $dadosCand['cand_end_bairro'],
                    'end_rua' => $dadosCand['cand_end_rua'],
                    'end_numero' => $dadosCand['cand_end_numero'],
                    'end_complemento' => $dadosCand['cand_end_complemento'],
                    'end_logradouro' => $dadosCand['cand_end_logradouro'],
                    'email' => $dadosCand['cand_email'],
                    'telefone' => $dadosCand['cand_telefone'],
                    'telefoneCel' => $dadosCand['cand_telefoneCel'],
                    'sexo' => $dadosCand['cand_sexo'],                    
                ];  
            
            //Retorna um formulario para alteração de dados.            
                $enabledEdition = [
                    'cod' => "disabled",
                    'nome' => "disabled",
                    'imagem' => "enabled",
                    'CPF' => "disabled", 
                    'RG' => "disabled",  
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
                    'action' => 'editar'
                ];
            return view('crud-candidato/candidatoForm',compact("title","ent","fieldDateTitle","fieldDate","resp","enabledEdition","states"));
        }else{//Se não tiver parametros retorna um formulario basico de cadastro
            $title="SISSAR Cadastro Funcionario";
            return view('crud-candidato/candidatoForm',compact("title","ent","fieldDateTitle","fieldDate","states")); 
        }
 
    }
    
    public function store(Request $request){
        $dadosCandadosForm = $request->except('_token');//recebendo dados dos input do formulario
        
        if($request->hasFile('cand_imagem')){//Se existir imagem faz upload e armazena   
            $imagem = $request->file('cand_imagem');
            $ext=$imagem->getClientOriginalExtension();            
            $filename = md5(time()).".".$ext;//Criando um nome que não será repetido
            $request->cand_imagem->storeAs('public/storage/imgperfil', $filename); 
            $dadosCandadosForm['cand_imagem'] = $filename;
        }
        
        //mudando padrão de datas..
        $dadosCandadosForm['cand_dataNasc']= implode("/",array_reverse(explode("/",$dadosCandadosForm['cand_dataNasc'])));
        //dd($dadosCandadosForm);
        $this->validate($request,$this->cand->rules,$this->messages);//Chamando validação dos dados de entrada
        $insert = $this->cand->create($dadosCandadosForm);//cadastrado no banco de dados 
        
        if($insert)//se ocorre com sucesso direciona para..
           return redirect('/'); 
        else return redirect ()->back();
    }
}
