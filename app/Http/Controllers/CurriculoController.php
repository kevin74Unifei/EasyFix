<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Candidato;
use App\Vaga;
use App\Profissao;
use App\Curriculo;
use App\Util;

class CurriculoController extends Controller
{   
    private $curr;
    
    public function __construct(Curriculo $c){
        $this->curr=$c;        
    }
    
   public function create($id){
       //Pesquisando bancos simples
        $states = DB::select('select * from estados');//Pesquisando estados para o preechimeto de enderenço
        $profs = DB::select('select * from TB_profissoes');//Pesquisando Profissoes para o preechimeto de objetivo
        $idiomas = DB::select('select * from TB_Idiomas');//Pesquisando Profissoes para o preechimeto de objetivo
        
        $cand = new Candidato;//Pesquisando dados do candidato
        $dadosCand = $cand::where('cand_cod',$id)->get()->first();        
        $resp= [//Guarda dados em um vetor com nomes genericos para ser utilizado pelo components-templates
                    'cod' => $dadosCand['cand_cod'],
                    'nome' => $dadosCand['cand_nome'],
                    'imagem' => $dadosCand['cand_imagem'],
                    'CPF' => $dadosCand['cand_CPF'], 
                    'RG' => $dadosCand['cand_RG'],  
                    'idade' => Util::calc_idade(implode("/",array_reverse(explode("-",$dadosCand['cand_dataNasc'])))),
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
        $enabledEdition = [//Desabilitando dados do candidato para edição
                    'cod' => "disabled",
                    'nome' => "disabled",
                    'imagem' => "enabled",
                    'CPF' => "disabled", 
                    'RG' => "disabled",  
                    'idade' => "disabled",
                    'end_cidade' => "disabled",
                    'end_estado' => "disabled",
                    'end_bairro' => "disabled",
                    'end_rua' => "disabled",
                    'end_numero' => "disabled",
                    'end_complemento' => "disabled",
                    'end_logradouro' => "disabled",
                    'email' => "disabled",
                    'telefone' => "disabled",
                    'telefoneCel' => "disabled",
                    'sexo' => "disabled",
                ];
        
        $vaga = new Vaga;//Pesquisando vagas disponiveis*/
        $vagasDados = $vaga->all();
        $ent = 'curr';
        return View("crud-curriculo/curriculoForm",compact("states",'resp','enabledEdition','profs','vagasDados','idiomas','i','ent'));
   }
   
   public function store(Request $request){
        $dadosCurr = $request->except('_token');   
        
        $idiomas = ""; //Recebendo idioma guardado       
        foreach($dadosCurr['curr_idiomas'] as $idioma){
           $idiomas = $idiomas.$idioma.","; 
        }
        
        if($dadosCurr['curr_obj']==1){     
            $dadosCad = [
                'curr_idiomas' => $idiomas,
                'currExtra' => $dadosCurr['curr_extra'],
                'curr_dataEmit' => date('y-m-d'),                
                'cand_cod' => $dadosCurr['cand_cod'],
                'curr_obj_id'=> $dadosCurr['curr_profissao'],
                'curr_obj_type' => 'App/Profissao'
            ];
        }else if($dadosCurr['curr_obj']==2){
            $dadosCad = [
                'curr_idiomas' => $idiomas,
                'currExtra' => $dadosCurr['curr_extra'],
                'curr_dataEmit' => date('y-m-d'),                
                'cand_cod' => $dadosCurr['cand_cod'],
                'curr_obj_id'=> $dadosCurr['curr_vagaEsp'],
                'curr_obj_type' => 'App/Vaga'
            ];              
        }
        $insert = $this->curr->create($dadosCad); 
        
         ///$insert = $this->curr->create($dadosCurr);//cadastrado no banco de dados     
            
        if($insert)//se ocorre com sucesso direciona para..
           return redirect('/'); 
        else return redirect ()->back();
   }
   
    
        

}
