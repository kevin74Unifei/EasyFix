        <div class="buttons">
            @if(isset($enabledEdition) && !$enabledEdition['action']=="visualizar")
            <button action="submit" class="btn btn-primary" >
                @if(isset($resp))
                    Alterar
                @else
                    Cadastrar
                @endif
            </button>   
            @endif
        </div>
</form>   

