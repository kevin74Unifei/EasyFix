
<select style="width:100%;margin-bottom: 4%;" class="form-control" @if(isset($dadosFunc))
                                disabled="disabled"
                             @endif  >
    @if(isset($dadosFunc))
    <option value="{{$dadosFunc['func_cod'] or ""}}" selected="selected" >{{$dadosFunc['func_CPF']." - ".$dadosFunc['func_nome']}}</option>
    @endif
    
    
    
</select>
