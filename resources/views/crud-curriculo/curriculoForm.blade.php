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
    
</style>

<div class="pagina">
    <form class="form-inline" >
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
                        <label for="func_RG">RG:</label><br/>
                        <input type="text" maxlength="20" size="27" class="form-control" name="cand_RG"
                             value="{{$resp["RG"] or ""}}"  required="required" {{$enabledEdition['RG'] or ""}}>
                    </div>   
                    
                    <div class="form-group">
                        <label for="func_RG">Idade:</label><br/>
                        <input type="text" maxlength="20" size="27" class="form-control" name="cand_RG"
                             value="{{$resp["RG"] or ""}}"  required="required" {{$enabledEdition['RG'] or ""}}>
                    </div> 
            </div> 
        </div>
    </fieldset>    
        
    @include('../templates/form/areaEndereco')
    @include('../templates/form/areaContato')
    @include('../templates/form/areaBotao')
    </form>
    
    
</div>

@endsection