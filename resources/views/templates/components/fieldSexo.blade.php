<div class="form-group sexo_input">
                    <label>Sexo/Genero:</label>
                    <div class="radio" >
                        <label>
                          <input type="radio" name="{{$ent or "ent"}}_sexo" value="M" checked {{$enabledEdition['sexo'] or ""}}>
                          Masculino
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="{{$ent or "ent"}}_sexo" value="F" {{$enabledEdition['sexo'] or ""}} >
                              Feminino
                        </label>
                    </div>
                </div>

