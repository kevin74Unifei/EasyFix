
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

    .info_pessoal{position:relative;
        float:right;
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
</style>

<div class="pagina">
    @if(isset($errors) && count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif
    <form class="form-inline" method='post' enctype="multipart/form-data" action='
            @if(isset($resp))
                {{url('pagamento/edit/'.$resp['cod'])}}    
            @else
                {{url('pagamento/cadastrar')}}
            @endif
            '>
            
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        <fieldset>
            <legend>Informações Sobre Pagamento:</legend> 
            
            <!-- @include('../templates/components/fieldDescricao')-->
            
            
            <div class="form-group" style="width:100%;">
                    <label for="func_Empresa">Empresa:</label><br/>
                    <select  class="form-control" name="func_Empresa"
                         style="width:100%;"  required="required" {{$enabledEdition['Empresa'] or ''}}>
                         <option value="">empresa</option>
                        </select>
            </div><br/>
                       
                       
            
            
            
                       
            @include('../templates/components/fildTipodepagamento')
            
            <div class="form-group">
                <label for="func_Valor_Unitario">Valor:</label><br/>
                <input type="number" size="6" class="form-control" 
                       value="{{$resp["end_numero"] or ""}}" required="required" name="{{$ent or "ent"}}_end_valor" 
                       placeholder="Valor Unitario" {{$enabledEdition['end_valor'] or ""}}>
            </div>
            
            <div class="form-group">
                <label for="func_desconto">Desconto:</label><br/>
                <input type="number"  class="form-control" min='0' max='30'
                       value="{{$resp["end_numero"] or ""}}" required="required" name="{{$ent or "ent"}}_end_valor" 
                       placeholder="Porcentagem" {{$enabledEdition['end_valor'] or ""}}> %
            </div><br/>
            
            <div class="form-group" style="float:right">
                <label for="func_Valor_Total">Valor Total:</label><br/>
                <input type="number" size="6" class="form-control" 
                       value="{{$resp["end_numero"] or ""}}" required="required" name="{{$ent or "ent"}}_end_valor" 
                       placeholder="Valor Total" {{$enabledEdition['end_valor'] or ""}}>
            </div>
            
            @include('../templates/form/areaBotao')
            
            
            </fieldset>
        </div>
        @endsection

                
                       
            
            
            
            
            
                
            