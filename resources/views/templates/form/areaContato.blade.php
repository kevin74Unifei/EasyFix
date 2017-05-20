<style>
fieldset{
        margin-top: 20px;
    }
</style>
<fieldset>
            <legend>Contato:</legend>
                <div class="form-group">
                    <label for="func_email">E-mail:</label><br/>
                    <input type="email" size="78" class="form-control" name="{{$ent or "ent"}}_email">
                </div>

                <div class="form-group">
                    <label for="func_telefone">Telefone:</label><br/>
                    <input type="text" size="25"class="form-control"  id="campoTelefone"
                           autocomplete="off" name="{{$ent or "ent"}}_telefone" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$">                  
                </div>

                <div class="form-group">
                    <label for="func_telefoneCel">Telefone Celular:</label><br/>
                    <input type="text" class="form-control" id="campoTelefoneCel" 
                           autocomplete="off" name="{{$ent or "ent"}}_telefoneCel" pattern="\([0-9]{2}\)  [0-9]{1}-[0-9]{4,6}-[0-9]{3,4}$" >
                </div>
</fieldset>

