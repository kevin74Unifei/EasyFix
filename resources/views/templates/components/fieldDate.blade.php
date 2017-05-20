<div>                    
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <label for="func_dataNasc">Data de nascimento:</label><br/>
                <div class='input-group date' id='datetimepicker1' name="{{$fieldDate or "date"}}">                                    
                    <input type='text' class="form-control" required="required" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
            <script type="text/javascript">
               $(function () {
                    $('#datetimepicker1').datetimepicker({
                        format:'DD/MM/YYYY', 
                        });
                     });
            </script>
    </div>
</div>

