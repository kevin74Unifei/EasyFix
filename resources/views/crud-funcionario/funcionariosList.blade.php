
@extends('../templates/template_base')

@section('tools-icon')
@endsection
@section('menu')
@endsection

@section('Base')
    <style>
    .pagina{position: absolute;
        top:80px;
        left:350px;        
        width:760px;
        background-color: whitesmoke;
        padding: 4%;
        padding-top:20px;
        padding-bottom:100px;
    }
    .menu{
        position:fixed;
        top:80px;
        width:300px;
        height:100%;
        background-color: whitesmoke;
        padding:10px;
    }
    .buttons_tools{
        position: relative;
        top:-30px;
        left:470px;
    }
    </style>
   
    
<div class="menu">
    <!--FILTER-->
    <div class="dropdown">
        <form class="form-inline" id="form_busca" action="{{url('/funcionario/list')}}">
            <label>Filtros:</label><br/>
            <select name="campo_ent" class="form-control" >
                <option value="func_nome"
                    @if(isset($valor_filter_campo) && $valor_filter_campo=='func_name')
                        selected="selected"
                    @endif>Nome</option>
                <option value="func_cpf"
                    @if(isset($valor_filter_campo) && $valor_filter_campo=='func_cpf')
                        selected="selected"
                    @endif>CPF</option>
            </select>
            <input type="text" id="chave_busca" name="chave_busca" class="form-control"  
                value="{{$valor_filter_text or ""}}" >                 
        </form>
    </div>
<script type="text/javascript">
    $("#chave_busca").on('change',function(){
        document.getElementById("form_busca").submit();
    });
</script>
   
</div>
    

<div class="pagina">
    
    
    <!--LISTA DE FUNCIONARIOS-->
    <table class="table">
        <thead class="thead-inverse">
            <tr><th><h1>Funcionários</h1></th>
                <th>
                <a style="float:right;" href="{{url("funcionario/form/")}}" class="btn btn-primary" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true" style="margin-right:5px;"></span>Cadastrar
                </a>      
            </th></tr>
        </thead>
        <tbody>         
        @foreach($dadosFunc as $f)
        <tr>
            <th colspan="2">
                <a href="{{url("funcionario/show/".$f['func_cod'])}}" class="list-group-item" style="height:100px;width:620px;">  
                    <img src="http://localhost/sissarproject/storage/app/imgperfil/{{$f['func_imagem'] or 'avatar.png'}}" style="width:51px;height:72px;" alt="perfil_foto">
                    <div style="position:relative;top:-92px;left:70px;width:500px;">                        
                        <h3>{{$f['func_nome']}}</h3>                         
                        <label>CPF: {{$f['func_CPF']}}</label><br/>
                        <label>Cargo: {{$f['func_cargo']}}</label>                   
                    </div>  
                    
                    <a href="{{url("funcionario/form/".$f['func_cod'])}}" class="buttons_tools">
                        <span class="glyphicon glyphicon-pencil" style="padding:4px;" aria-hidden="true"></span>Editar</a> 
                    <a href="{{url("funcionario/delete/".$f['func_cod'])}}" class="buttons_tools">
                        <span class="glyphicon glyphicon-trash" style="padding: 4px;" aria-hidden="true"></span>Excluir</a>
                    
                </a>                
            </th>            
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endSection

