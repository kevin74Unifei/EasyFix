<style>
fieldset{
        margin-top: 20px;
    }
</style>    

        <fieldset>
            <legend>Endereço:</legend>            
            
            @include('../templates/components/fieldLogradouro')
            
            <div class="form-group">
                <label for="func_end_rua">Nome do Logradouro:</label><br/>
                <input type="text" size="104" class="form-control" name="{{$ent or "ent"}}_end_rua" 
                        value="{{$resp["end_rua"] or ""}}" placeholder="Rua" required="required">                
            </div>
            <div class="form-group">
                <label for="func_end_rua">Nº:</label><br/>
                <input type="text" size="6" class="form-control" 
                       value="{{$resp["end_numero"] or ""}}" required="required" 
                       name="{{$ent or "ent"}}_end_numero" placeholder="Numero">
            </div><br/>

            <div class="form-group">
                <label for="func_end_complemento">Complemento:</label><br/>
                <input type="text" class="form-control" size="35" 
                       value="{{$resp["end_complemento"] or ""}}" name="{{$ent or "ent"}}_end_complemento">
            </div> 
        
            @include('../templates/components/fieldCity')

            <div class="form-group">
                <label for="func_end_bairro">Bairro:</label><br/>
                <input type="text" class="form-control" size="33" required="required" 
                       name="func_end_bairro" value="{{$resp["end_bairro"] or ""}}">
            </div>
            
            @include('../templates/components/fieldState')

        </fieldset>
