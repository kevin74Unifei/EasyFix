<div class="form-group">
                <label for="func_Tipopag">Tipo de Pagamento:</label><br/>
                <select class="form-control" name="{{$ent or "ent"}}_end_Tipo de Pagamento" {{$enabledEdition['end_logradouro'] or ""}}>
                    <option value="A Vista"@if(isset($resp)&& $resp['end_Tipo de Pagamento']=="A Vista"){{"selected"}}@endif>A Vista</option>
                    <option value="3x" @if(isset($resp)&& $resp['end_Tipo de Pagamento']=="3x"){{"selected"}}@endif>3x</option>
                    <option value="6x" @if(isset($resp)&& $resp['end_Tipo de Pagamento']=="6x"){{"selected"}}@endif>6x</option>
                    <option value="9x" @if(isset($resp)&& $resp['end_Tipo de Pagamento']=="9x"){{"selected"}}@endif>9x</option> 
                    <option value="12x" @if(isset($resp)&& $resp['end_Tipo de Pagamento']=="12x"){{"selected"}}@endif>12x</option>                 
                    <option value="18x" @if(isset($resp)&& $resp['end_Tipo de Pagamento']=="18x"){{"selected"}}@endif>18x</option>                
                    <option value="24x" @if(isset($resp)&& $resp['end_Tipo de Pagamento']=="24x"){{"selected"}}@endif>24x</option>
                    
                </select>            
</div>
