<fieldset style="position:relative;top:-60px;">        
        <legend>Experiencia</legend>  
        <div id="fieldXP">
        <div class="form-group">
                <label for="curr_nomeInst">Empresa:</label><br/>
                <input type="text" size="103" maxlength="110" class="form-control" name="{{$ent or "ent"}}_nomeEmpresa"
                       value=""  onkeyup="this.value = this.value.toUpperCase();" required="required"/>
        </div>
        
        <div class="form-group">
                <label for="curr_nomeInst">Cargo:</label><br/>
                <input type="text" size="25" maxlength="110" class="form-control" name="{{$ent or "ent"}}_cargo"
                       value=""  onkeyup="this.value = this.value.toUpperCase();" required="required"/>
        </div>
        
        <div class="datas_saida">
        @include ('../templates/components/fieldDate')
        @include ('../templates/components/fieldDate')        
        </div>
        
        <div class="form-group" style="position:relative;left:30%;top:-140px;">
                <label for="curr_nomeInst">Descrição:</label><br/>
                <textarea name="curr_desc" rows="4" cols="92"></textarea>
        </div><br/>
        
        <a href="#" id="btn_duplicaExp" style='position:relative;top:-140px;'>
                <span class="glyphicon glyphicon-plus" style="padding:4px;" aria-hidden="true"></span>Adicionar Outra Experiencia
        </a>   
        </div>
        <script>
            $( "#btn_duplicaExp").click(function() {
                var original = $(this).closest("#fieldXP");
                var copia = original.clone(true, true);
                original.after(copia);
            });
        </script>
        
    </fieldset>  