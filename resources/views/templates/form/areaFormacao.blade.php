    <fieldset >
        <legend>Formação</legend>   
        <div id="fieldFormation">
            <div class="form-extra">
                <label for="curr_curso">Curso:</label><br/>
                <select class="form-control" style="width:95%">              
                    <option value="">Tecnico em informatica</option>
                </select>
            </div>

            <div class="form-group">
                <label for="curr_nomeInst">Instituição:</label><br/>
                <input type="text" size="65" maxlength="110" class="form-control" name="{{$ent or "ent"}}_nomeInst"
                       value=""  onkeyup="this.value = this.value.toUpperCase();" required="required"/>
            </div>

            <div class="form-group">
                <label for="curr_tipoConclusao">Conclusão:</label><br/>
                <select class="form-control">              
                    <option value="1">Concluido em:</option>
                    <option value="2">Previsão de Conclusão:</option>
                </select>
            </div>

            <div class='data'>
                @include ('../templates/components/fieldDate')
            </div>        

            <a href="#" id="btn_duplicaFor" style='position:relative;top:-60px;'>
                <span class="glyphicon glyphicon-plus" style="padding:4px;" aria-hidden="true"></span>Adicionar outro curso
            </a>       
        </div>
        <script>
            $( "#btn_duplicaFor").click(function() {
                var original = $(this).closest("#fieldFormation");
                var copia = original.clone(true, true);
                original.after(copia);
            });
        </script>
 
    </fieldset>

