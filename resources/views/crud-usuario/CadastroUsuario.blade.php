@extends('../templates/template_base')

@section('tools-icon')
@endsection
@section('menu')
@endsection

@section('Base')

<style>
    .pagina{position: absolute;
            top:100px;
            left:150px;        
            width:1050px;
            background-color: whitesmoke;
            padding: 4%;
            padding-bottom:100px;
    }

    .info_pessoal{position:absolute;
                  top:100px;
                  left:300px;
    }
    
    .img_perfil{
        padding-left: 4%;
        float:left;
    }
    
    .form-group{
        padding-left: 11px;
        padding-top: 10px;
    } 


    .buttons{position: relative;  
             top:30px;
             left:10px;
    }

    .area_cargo{position: absolute;
                top:160px;
                left:350px;
    }

</style>

<div class="pagina">
   @if(isset($errors) && count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif
    
    <form class="form-inline" method='post' action='
            @if(isset($resp))
                {{url('usuario/edit/'.$resp['id'])}}    
            @else
                {{url('usuario/cadastrar')}}
            @endif
            '>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
       
        <fieldset>
            <legend>Dados de Usuário:</legend>            

            <div class="img_perfil">
                @include('../templates/components/thumbnail')
            </div>
            
            <div class="info_pessoal">
                <!-- A parte do view do cadastro de usuario que vai ter o nome de usuario(que deve ser unico, porem ainda nao esta); A senha que devera ter no minimo 7 caracteres -->
                <div class="form-group">
                    <label for="user_login">Nome de Usuário:</label><br/>
                    <input type="username" maxlength="60" size="60" class="form-control" name = "{{$ent or "ent"}}_login" required="required"value="{{$dado["userLogin"] or ""}}">
                </div>
                <br/> 
                <div class="form-group">
                    <label for="user_password">Senha:</label><br/>
                    <input type="password" maxlength="24" size="25" class="form-control" required pattern="[a-z]{7-24}" name = "{{$ent or "ent"}}_password"
                           placeholder="Senha" onchange="form.ConfirmaSenha.pattern = this.value;" required="required" value="{{$dado["userPass"] or ""}}" {{$enabledEdition['userPass'] or ""}}>               
                </div>

                <div class="form-group">
                    <label for="ConfimaSenha">Confime a Senha:</label><br/>
                    <input type="password"  maxlength="24" size="25" class="form-control" required pattern="[a-z]{7-24}" name = "ConfirmaSenha" placeholder="Senha" value="{{$dado["userPass"] or ""}}"
                           {{$enabledEdition['userPass'] or ""}}>               
                </div>
                <br/>
                <div class="form-group"
                     <label for="user_perfil">Perfil de Usuário:</label><br/>
                    <select class="form-control" name="{{$ent or "ent"}}_perfil" required="required" value="{{$dado["userPerfil"] or ""}}">
                        <option value="Administrador">Administrador</option>
                        <option value="Atendente">Atendente</option>
                        <option value="Candidato">Candidato</option>
                    </select> 
                </div>
            </div> 
        </fieldset>
        @include('../templates/form/areaBotao')
        <br/>
    </form>
</div>
@endsection