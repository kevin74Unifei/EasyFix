    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
    	<meta charset="utf-8"/>
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    	<title>{{$title or "SisSaR"}}</title>
        
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        
        
       <!-- <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.css')}}"  crossorigin="anonymous">-->
        <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}"  crossorigin="anonymous">
        <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{url('bootstrap/js/bootstrap.js')}}"></script>

        
        <style>
            body{                
                padding: 0px;
                margin:0px; 
                background-color:#bbbbd6; 
            }
            .navbar-per1{
                font-family: Serif;
                font-size: 30px;
                padding-top:10px;
                padding-left:25%;
                color:whitesmoke;
            }            
         </style>
	
    </head>
    <body>   
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    @yield('tools-icon')
                    <!--Exemplo de como embutir botões
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">N</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>-->
                    
                    <b><p class="navbar-per1" >SISSAR</p></b>
                </div>

                @if(isset(Auth::user()->username))
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->username}}  <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="{{url('funcionario/perfil/')}}">Editar Perfil</a></li>
                              <li><a href="{{url('usuario/perfil/')}}">Editar Login</a></li>
                              <li><a href="{{url("/logout")}}">Logout</a></li>
                            </ul>
                       </li>
                       @yield('Menu')
                    </ul>
                </div>  
                @endif
            </div>
        </nav>
    	@yield('Base')    
 
    </body>
    </html>

