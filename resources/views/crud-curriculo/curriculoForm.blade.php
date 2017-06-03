@extends('../templates/template_base')

@section('tools-icon')
@endsection
@section('menu')
@endsection

@section('Base')

<style>
    .pagina{position: absolute;
            top:100px;
            left:15%;        
            width:1050en;
            background-color: whitesmoke;
            padding: 4%;
            padding-bottom:100px;
    }
    
    .info_pessoal{
        float:right;
    }
    
    .img_perfil{
        padding-left: 4%;
        float:left;
    }
    
    .buttons{position: relative;  
             top:30px;
             left:10px;
    } 
    
    .form-group{
        padding-left: 11px;
        padding-top: 10px;
    } 
    
    .form-extra{
        padding-left: 11px;
        padding-top: 10px;
    } 
    
    .data{position: relative;   
        top:-68px;
        left:72%;        
    }
    
</style>

<div class="pagina">
    <form class="form-inline" method='post' enctype="multipart/form-data" action='{{url('curriculo/gerar')}}' >
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <fieldset>
        <div>
            <div class="img_perfil">
                <a href="#" class="thumbnail">
                    <img style="width:129px; height:180px" src="{{url('storage/app/public/imgperfil/')."/"}}{{$resp['imagem'] or 'avatar.png'}}" alt='img_perfil'/>
                </a>
            </div>
            <div class="info_pessoal">

                    @include('../templates/components/fieldName')
                    <br/>

                    @include('../templates/components/fieldCPF')

                    <div class="form-group">
                        <label for="curr_RG">RG:</label><br/>
                        <input type="text" maxlength="20" size="27" class="form-control" name="cand_RG"
                             value="{{$resp["RG"] or ""}}"  required="required" {{$enabledEdition['RG'] or ""}}>
                    </div>   
                    
                    <div class="form-group">
                        <label for="curr_idade">Idade:</label><br/>
                        <input type="text" maxlength="20" size="27" class="form-control" name="cand_RG"
                             value="{{$resp["idade"] or ""}}"  required="required" {{$enabledEdition['idade'] or ""}}>
                    </div> 
            </div> 
        </div>
    </fieldset>    
        
    @include('../templates/form/areaEndereco')
    @include('../templates/form/areaContato')
   
    
    <fieldset>
        <legend>Objetivo</legend>  
        <div class="form-extra">
        <select id="curr_obj" style="width:40%" name="curr_obj" class="form-control">
            <option value="1" selected="selected">Por Tipo de Vaga (Profissão)</option>
            <option value ="2">Por Vaga em Especifico</option>
        </select> 
        
        <script type="text/javascript">
            $(function(){//Ao carregar a pagina                           
                alterObj();
            });
                       
            $('#curr_obj').on('change',function(){//Ao selecionar um objetivo                       
                alterObj();
            });
           
            function alterObj(){//Alterna pelo tipo de objetivo
                var valueSelected = $('#curr_obj').val();
                if(valueSelected==1){
                   $("#curr_vagaEsp").css("display","none");  
                   $("#curr_profissao").css("display","inline");
                }else if(valueSelected==2){
                   $("#curr_profissao").css("display","none");  
                   $("#curr_vagaEsp").css("display","inline"); 
                }
            }
        </script>
      
        <select name="curr_profissao" style="width:50%" id="curr_profissao" class="form-control">
            <option value="1" selected="selected">Tecnico em informatica</option>
        </select>

        <select name="curr_vagaEsp" style="width:50%" id="curr_vagaEsp" class="form-control" style="display: none;">
            <option value="1" selected="selected">Tecnico em HelpDesk</option>
        </select>
        </div>
    </fieldset>    
    
    @include('../templates/form/areaFormacao')<!--Incluido fieldset de formação-->
    
    @include('../templates/form/areaExperiencia')<!--Incluido fieldset de Experiencia-->
        
    
    <fieldset style="position:relative;top:-160px;">
        <legend>Extras</legend>
                
        <div class="form-group" style="width:96%;">
            <label for="curr_idiomas">Idiomas:</label><br/>
            <div style="overflow: scroll;width:100%;height:100px;">
                
            </div>
        </div>
        
        <div class="form-group" style="width: 96%;" >
                <label for="curr_extra">Formações Extra:</label><br/>
                <textarea name="curr_extra" style="width: 100%;" rows="4" cols="80"></textarea>
        </div><br/>
    </fieldset>    
    
    <button action="submit" class="btn btn-primary" style='margin-left:10px;position:relative;width:95%;top:-130px;' >
        Gerar e Cadastrar
    </button>  
    </form>

    
</div>

@endsection