<div class="form-group">
    <label for="func_descriçao">Nome:</label><br/>
    <input type="text" size="103" maxlength="110" class="form-control" name="{{$ent or "ent"}}_nome"
           value="{{$resp['descriçao'] or ""}}"  onkeyup="this.value = this.value.toUpperCase();" required="required" {{$enabledEdition['descricao'] or ""}}>
    
</div>

