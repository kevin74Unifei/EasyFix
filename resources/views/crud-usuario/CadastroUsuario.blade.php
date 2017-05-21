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

    $(function () {
        $("#campoTelefoneCel").mask("(99) 9-9999-9999");
        $("#campoTelefone").mask("(99) 9999-9999");
    });
</script>

<div class="pagina">
    <form class="form-inline">
        <fieldset>
            <legend>Dados de Usuário:</legend>            

            @include('../templates/components/thumbnail')

            <div class="info_pessoal">
                <!-- A parte do view do cadastro de usuario que vai ter o nome de usuario(que deve ser unico, porem ainda nao esta); A senha que devera ter no minimo 7 caracteres -->
                <div class="form-group">
                    <label for="func_userName">Nome de Usuário:</label><br/>
                    <input type="username" maxlength="60" size="60" class="form-control" name = "{{$ent or "ent"}}_username">
                </div>
                <br/>
                <div class="form-group">
                    <label for="func_senha">Senha:</label><br/>
                    <input type="password" maxlength="24" size="25" class="form-control" required pattern="[a-z]{7}" name = "Senha"placeholder="Password" onchange="form.ConfirmaSenha.pattern = this.value;">               
                </div>

                <div class="form-group">
                    <label for="func_senha">Confime a Senha:</label><br/>
                    <input type="password"  maxlength="24" size="25" class="form-control" required pattern="[a-z]{7}" name = "ConfirmaSenha"placeholder="Password">               
                </div>
                <div class="buttons">
                    <button action="submit" class="btn btn-primary" >Cadastrar Usuário</button>
                    <button action="cancelar" class="btn btn-warning" >Cancelar</button>
                </div>
            </div> 
        </fieldset>

        <br/>
    </form>
</div>
@endsection