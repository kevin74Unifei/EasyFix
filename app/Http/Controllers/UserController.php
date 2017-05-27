<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Funcionario;

class UserController extends Controller {
    
    private $user;
    private $messages = [
            'username.required' => "É obrigatório o preechimento do campo Nome de Usuário",
            'user_login.min' => "É obrigatório o preechimento do campo Nome de Usuário com pelo menos 3 letras",
            'password.required' => "É obrigatório op preenchimento do campo Senha",
            'password.min' => "É obrigatório o preechimento do campo Senha com pelo menos 7 letras",
            'user_perfil.required' =>"É obrigatório a escolha de um perfil",
        ];
    
    public function __construct(User $u) {
        $this->user = $u;
    }
    
   public function create($func_id=null) {
        $ent ="user";
        $title="SISSAR Cadastro Usuário";
        
        if($func_id!=null){
            $func = new Funcionario();            
            $dadosFunc = $func->where("func_cod",$func_id)->get()->first();
            
            return view('crud-usuario/CadastroUsuario', compact("title", "ent","dadosFunc"));
        }else{
            return view('crud-usuario/CadastroUsuario', compact("title", "ent"));
        }
    }

    
    public function editor($user_id) {
        $ent ="user";
        $title="SISSAR Edição Usuário";       
        
        $dadosUsers = $this->user->where("id",$user_id)->get()->first();
           
        $func = new Funcionario();            
        $dadosFunc = $func->where("func_cod",$dadosUsers["user_vinculo"])->get()->first();  
            
        $dado = [
                    'userId' => $dadosUsers['id'],
                    'imagem' => $dadosUsers['user_imagem'],
                    'userLogin'=> $dadosUsers['username'] ,
                    'userPass'=> $dadosUsers['password'],
                    'userPerfil'=> $dadosUsers['user_perfil']
                ];                            
            
        $enabledEdition = [
                    'userLogin'=> 'disabled',
                    'userPass'=> 'enabled',
                    'userPerfil'=>'disabled',
                ];
        return view('crud-usuario/CadastroUsuario', compact("title", "ent", "dado", "enabledEdition","dadosFunc"));
        
    }

    public function index(Request $request) {
        $title="SISSAR Painel Usuario";        
       
        $filter = $request->all();//Carregando filtros        
        if($filter){//Se filtros existirem, carrega dados atraves da operação LIKE do sql, em ordem crescente
            $dadosUser = $this->user->where("user_status",'1')
                                ->where($filter['campo_ent'],'LIKE',$filter['chave_busca'].'%')
                                ->orderBy('username', 'asc')
                                ->get(); 
            
            $valor_filter_text = $filter['chave_busca'];
            $valor_filter_campo = $filter['campo_ent'];
        }else{//Senão existir filtros carrega todas as linhas da tabela, por ordem crescente.
            $dadosUser = $this->user->where("user_status",'1')->orderBy('username', 'asc')->get();
                                
        }       
        
        return view("crud-usuario/listaUsuario",compact("dadosUser",
                                                                "title",
                                                                "valor_filter_text",
                                                                "valor_filter_campo"));
    }

    public function store(Request $request) {
        $dataForm = $request->except('_token');
        
        $dataForm['password']= Hash::make($dataForm['password']);
        
        $this->validate($request,$this->user->rules,$this->messages);
        $insert = $this->user->create($dataForm);
        
        if($insert)
           return redirect('/'); 
        else return redirect ()->back();
               
    }
 
    public function edit($id, Request $request) {
         $dataUser = $request->except('_token');//recebe dados do formulario
        
        $this->validate($request,$this->user->rulesEdit,$this->messages);//Chamando validação dos dados de entrada
        $update = $this->user->where('user_id',$id)->update($dataUser);//alterado a linha selecionada no banco de dados 
        
        if($update)
           return redirect('/usuario/list'); 
        else return redirect ()->back();
    }

    public function destroy($id) {
         //fazendo a alteração do status da linha do banco de dados 
        $update = $this->user->where('user_id',$id)->update(["user_status"=>'0']);
        
         if($update)//se feito com sucesso direciona para...
           return redirect('/usuario/list'); 
        else return redirect ()->back();
    }
    
    public function login(Request $request){
        $dadosForm = $request->except('_token');
           
        if(Auth::attempt($dadosForm, true)){
            return redirect('funcionario/list');
        }else{            
            return redirect('/');
        }
    }
    
    public function logout(){
        if(Auth::check()){
            Auth::logout(Auth::user());            
        }
        
         return redirect('/');
    }
    
   /* public function getUser($id){
        $dadosUsers = $this->user->where("",$user_id)->get();
        return $dadosUsers;
    }*/
}
