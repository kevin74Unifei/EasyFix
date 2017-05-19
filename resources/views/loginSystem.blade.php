@extends('templates/template_base')
@section('tools-icon')
@endsection
@section('menu')
@endsection
@section('Base')
<style>  
    .pagina{        
        position:fixed;
        width:1000px;
        height:600px;
        top:159px;
        left:15%;
    }
    .img_show{       
       top:159px;        
    }    
    .form-per1{position:absolute;
        top:3px;
        left: 700px;
        padding: 45px;
        width: 300px;
        height:300px; 
        background-color:whitesmoke;        
    }

</style>
<script>
       $('.datepicker').datepicker();
</script>
<div class="pagina">
    <div class="img_show" >
        <img class="thumbnail" src="{{url('img/curriculum_login_desenho.jpg')}}"/>    
    </div>

    <div class='form-per1' data-provide="datepicker">
        <form method="post" action="{{url('logar')}}">
            <div>
                <label for='login'  >Login:</label><br/>        
                <input  type='text' class="form-control" name='login'placeholder="Login"><br/>         

                <label for='senha'  >Senha:</label><br/>
                <input  type='password' class="form-control" name='senha' placeholder="Password"> 
            </div><br/>

            <button type="submit" class="btn btn-primary">Logar</button>              
        </form>
    </div>
</div>


@endsection