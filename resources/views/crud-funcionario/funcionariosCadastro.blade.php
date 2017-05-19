@extends('../templates/template_base')

@section('tools-icon')
@endsection
@section('menu')
@endsection

@section('Base')

<style>
    .pagina{position: Absolute;
        top:100px;
        left:10%;
        right:10%;        
        background-color: whitesmoke;
        padding: 4%;
    }
    
</style>

<<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>

<div class="pagina">
    <form class="form-inline">
        <fieldset>
            <legend>Informações pessoais:</legend>
            <div class="form-group">
                <label for="func_nome">Nome:</label><br/>
                <input type="text" size="110" maxlength="110" class="form-control" name="func_nome"
                       onkeyup="this.value = this.value.toUpperCase();">
            </div><br/>
            <div class="form-group">
                <label for="func_CPF">CPF:</label><br/>
                <input type="text" maxlength="14" class="form-control" name="func_CPF"
                       OnKeyPress="formatar('###.###.###-##',this)">
            </div>
            <div class="form-group">
                <label for="func_cartTrab">Nº da Carteira de Trabalho:</label><br/>
                    <input type="text" class="form-control" name="func_cartTrab">
            </div>
            
            <div>
                <label for="func_dataNasc">Data de nascimento:</label><br/>
                <div class="row">
                    <div class='col-sm-6'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker1'name="func_dataNasc">
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker();
                        });
                    </script>
                </div>
            </div>
            </script>

            <label>Sexo/Genero:</label>
            <div class="radio">
                <label>
                  <input type="radio" name="func_sexo" value="M" checked>
                  Masculino
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="func_sexo" value="F">
                      Feminino
                </label>
            </div>
        </fieldset>
        <fieldset>
            <legend>Informações cargo:</legend>
            <label for="func_cargo">Cargo:</label>  
            <select class="form-control" name="func_cargo">
                <option value="Gerente">Gerente</option>
                <option value="RH">RH</option>
                <option value="Secretaria">Secretaria</option>
                <option value="Atendente">Atendente</option>
                <option value="outro">Outro</option>
            </select>

            <div class="form-group">
                <label for="func_cargaHor">Carga Horaria:</label>
                <input type="number" class="form-control" name="func_cargaHor:">
            </div>
        </fieldset>
        <fieldset>
            <legend>Enderenço:</legend>
            <div class="form-group">
                <label for="func_end_rua">Rua:</label>
                <input type="text" class="form-control" name="func_end_rua:" placeholder="Rua">
                <input type="text" class="form-control" name="func_end_rua:" placeholder="Numero">
            </div>

            <div class="form-group">
                <label for="func_end_complemento">Complemento:</label>
                <input type="text" class="form-control" name="func_dataNasc:">
            </div>

            <div class="form-group">
                <label for="func_end_logradoro">Logradoro:</label>
                <input type="text" class="form-control" name="func_end_logradoro:">
            </div>

            <label for="func_end_cidade">Cidade:</label>
            <select class="form-control" name="func_end_cidade">
                <option >DB Cidades do Brasil</option>
            </select>

            <div class="form-group">
                <label for="func_end_bairro">Bairro:</label>
                <input type="text" class="form-control" name="func_end_bairro">
            </div>
        </fieldset>
        <fieldset>
            <legend>Contato:</legend>
                <div class="form-group">
                    <label for="func_email">E-mail:</label>
                    <input type="email" class="form-control" name="func_email">
                </div>

                <div class="form-group">
                    <label for="func_telefone">Telefone:</label>
                    <input type="text" class="form-control" name="func_telefone">
                </div>

                <div class="form-group">
                    <label for="func_telefoneCel">Telefone Celular:</label>
                    <input type="text" class="form-control" name="func_telefoneCel">
                </div>
        </fieldset>
        <button action="submit">Cadastrar</button>
        <button action="cancelar">Cancelar</button>
        
    </form>
</div>
@endsection