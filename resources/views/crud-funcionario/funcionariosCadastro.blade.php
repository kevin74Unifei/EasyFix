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


<script type="text/javascript">    
    
$(function(){
$("#campoTelefoneCel").mask("(99) 9-9999-9999");
$("#campoTelefone").mask("(99) 9999-9999");
});
</script>

<div class="pagina">
    <form class="form-inline">
        <fieldset>
            <legend>Informações pessoais:</legend>            
            
            @include('../templates/components/thumbnail')
            
            <div class="info_pessoal">
                
                @include('../templates/components/fieldName')
                <br/>
                
                @include('../templates/components/fieldCPF')
                
                <div class="form-group">
                    <label for="func_RG">RG:</label><br/>
                    <input type="text" maxlength="14" size="27" class="form-control" name="func_RG"
                           required="required">
                </div>                                
                <div class="form-group">
                    <label for="func_cartTrab">Nº da Carteira de Trabalho:</label><br/>
                        <input type="text" size="27" class="form-control" name="func_cartTrab"
                               required="required">
                </div>
                        
                @include('../templates/components/fieldDate')
                @include('../templates/components/fieldSexo')
                
                <div class="area_cargo">
                    
                    @include('../templates/components/fieldOffice')
                    
                    <div class="form-group">
                        <label for="func_cargaHor">Carga Horaria:</label><br/>
                        <input type="number" class="form-control" required="required"
                               min="0" max="8" name="func_cargaHor:">
                    </div>
                </div>
            </div> 
        </fieldset>

        @include('../templates/form/areaEndereco')
        @include('../templates/form/areaContato')
        
        <br/>
        <div class="buttons">
            <button action="submit" class="btn btn-primary" >Cadastrar</button>
            <button action="cancelar" class="btn btn-warning" >Cancelar</button>
        </div>
    </form>
</div>
@endsection