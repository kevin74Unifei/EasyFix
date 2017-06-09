<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pagamento;
use App\User;
use DB;


class PagamentoController extends Controller
{
    private $pag;
    private $messages = [//mensagens que serão exibidas quando a validação falhar
            'pag_Empresa.required' => "É obrigatorio preechimento do campo EMPRESA",
            'pag_Serviços_Prestados' => "É obrigatorio preechimento do campo Serviços Prestados",
            'pag_DataAtual'=>'É obrigatorio preechimento do campo Data Atual',
            'pag_Valor_Unitario'=>'É obrigatorio preechimento do campo Valor unitario',
            'pag_Descriçao'=>'É obrigatorio preechimento do campo descriçao',
            'pag_Tipopag'=>'É obrigatório preenchimento do Campo tipo de pagamento',
            
        
        
           
        
    ];
    
    public function __construct(Pagamento $f){
        $this->pag=$f;        
    }
    
    public function index(Request $request){        
        $title="SISSAR Painel Empresa";        
       
        $filter = $request->all();//Carregando filtros        
        if($filter){//Se filtros existirem, carrega dados atraves da operação LIKE do sql, em ordem crescente
            $dadospag = $this->pag->where("pag_status",'1')
                                ->where($filter['campo_ent'],'LIKE',$filter['chave_busca'].'%')
                                ->orderBy('pag_nome', 'asc')
                                ->get(); 
            
            $valor_filter_text = $filter['chave_busca'];
            $valor_filter_campo = $filter['campo_ent'];
        }else{//Senão existir filtros carrega todas as linhas da tabela, por ordem crescente.
            $dadosPag = $this->pag->where("pag_status",'1')->orderBy('pag_nome', 'asc')->get();                                
        }       
        
        return view("crud-pagamento/PagamentoForm",compact("dadospag",
                                                                "title",
                                                                "valor_filter_text",
                                                                "valor_filter_campo"));
    }
    
    public function show($pag_cod){
        $title="SISSAR Visualização Empresa";            
        
        $states = DB::select('select * from estados');//pesquisando estados do Brasil no banco
        
        $dadosPags = $this->pag->where("pag_cod",$pag_cod)->get();   
        foreach($dadosPags as $d){
            $resp= [//guarda dados em um vetor com nomes genericos para ser utilizado pelo components-templates
                    'Emppag' => $d['pag_empresa'],
                    'pag_Serviços_Prestados' => $d['pag_Serviços_Prestados'],
                    'pag_DataAtual' => $d['dataAtual'],
                    'pag_Valor_Unitario' => $d['pag_Valor_Unitario'], 
                    'pag_Descriçao' => $d['pag_Descriçao'],  
                    'pag_Tipopag' => $d['pag_Tipopag'],
                   // 'end_estado' => $d['emp_end_estado'],
                   // 'end_bairro' => $d['emp_end_bairro'],
                   // 'end_rua' => $d['emp_end_rua'],
                   // 'end_numero' => $d['emp_end_numero'],
                   // 'end_complemento' => $d['emp_end_complemento'],
                   // 'end_logradouro' => $d['emp_end_logradouro'],
                   // 'email' => $d['emp_email'],
                   // 'telefone' => $d['emp_telefone'],
                   // 'telefoneCel' => $d['emp_telefoneCel']
            ];  
                
            break;
        }//Retorna um formulario para alteração de dados.            
                $enabledEdition = [
                    'Emppag' => "disabled",
                    'pag_Serviços_Prestados' => "disabled",
                    'pag_DataAtual' => "disabled",
                    'pag_Valor_Unitario' => "disabled", 
                    'pag_Descriçao' => "disabled",  
                    'pag_Tipopag' => "enabled",
                    'action' => 'editar'
                ];
            return view('crud-pagamento/PagamentoForm',compact("title","fieldDateTitle","fieldDate","resp","enabledEdition","states"));    
    }
    
    public function create($pag_cod=null){
        
        $ent ="pag";
        
        //$states = DB::select('select * from estados'); Apenas para prencher estados
                
        if($pag_cod!=null){//Se recebe um parametro, faz o que esta aqui dentro
            $title="SISSAR Edição Pagamento";
            $dadosPags = $this->pag->where("pag_cod",$pag_cod)->get();   
            foreach($dadosPags as $d){
                $resp= [//guarda dados em um vetor com nomes genericos para ser utilizado pelo components-templates
                    'Emppag' => $d['pag_empresa'],
                    'pag_Serviços_Prestados' => $d['pag_Serviços_Prestados'],
                    'pag_DataAtual' => $d['pag_dataAtual'],
                    'pag_Valor_Unitario' => $d['emp_CNPJ'], 
                    'pag_Descriçao' => $d['pag_Valor_Unitario'],  
                    'pag_Tipopag' => $d['pag_Tipopag'],
                    
                    ];  
                
                break;
            }//Retorna um formulario para alteração de dados.            
                $enabledEdition = [
                    'Emppag' => "disabled",
                    'pag_Serviços_Prestados' => "disabled",
                    'pag_DataAtual' => "disabled",
                    'pag_Valor_Unitario' => "disabled", 
                    'pag_Descriçao' => "disabled",  
                    'pag_Tipopag' => "enabled",
                    'action' => 'editar'
                ];
            return view('crud-pagamento/PagamentoForm',compact("title","ent","fieldDateTitle","fieldDate","resp","enabledEdition","states"));
        }else{//Se não tiver parametros retorna um formulario basico de cadastro
            $title="SISSAR Cadastro Pagamento";
            $ent="pag";
            return view('crud-pagamento/PagamentoForm',compact("title","ent")); 
        }                
    }
    
    public function store(Request $request){
        $dataForm = $request->except('_token');//recebendo dados dos input do formulario
      
        $this->validate($request,$this->pag->rules,$this->messages);//Chamando validação dos dados de entrada
        $insert = $this->pag->create($dataForm);//cadastrado no banco de dados 
        
        if($insert)//se ocorre com sucesso direciona para..
           return redirect('/pagamento/list'); 
        else return redirect ()->back();
    }
    
    public function edit($id,Request $request){
        $dataForm = $request->except('_token');//recebe dados do formulario
        
        $this->validate($request,$this->pag->rulesEdit,$this->messages);//Chamando validação dos dados de entrada
        $update = $this->pag->where('pag_cod',$id)->update($dataForm);//alterado a linha selecionada no banco de dados     
              
        if($update)
           return redirect('/pagamento/list'); 
        else return redirect ()->back();
    }
    
    public function destroy($id){
        //fazendo a alteração do status da linha do banco de dados 
        $update = $this->pag->where('pag_cod',$id)->update(["pag_status"=>'0']);
        
         if($update)//se feito com sucesso direciona para...
           return redirect('/pagamento/list'); 
        else return redirect ()->back();
    }
}
