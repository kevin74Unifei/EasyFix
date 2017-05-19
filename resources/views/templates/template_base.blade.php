    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
    	<meta charset="utf-8"/>
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    	<title>{{$title or "SisSaR"}}</title>
        
        <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.css')}}"  crossorigin="anonymous">
        <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}"  crossorigin="anonymous">
        <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
        
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
			<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
        
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
                @yield('Menu')
                <!--Exemplo de codigo para implemntar um menu.
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Opções</a></li>
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Ajuda</a></li>
                    </ul>
                </div>-->
            </div>
        </nav>
    	@yield('Base')    
 
    </body>
    </html>

