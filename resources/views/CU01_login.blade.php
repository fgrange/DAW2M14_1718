<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">


  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <br><br>
            <div class="panel panel-default">
                

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="CU01_login">
                        {{ csrf_field() }}
                        
                        <div class="panel-heading col-md-offset-1"><h1>Iniciar Sesión</h1></div>

                        <div class="form-group{{isset($invalido) ? ' has-error' : '' }}">
                            <div class="col-md-8 col-md-offset-2">
                                <input id="user" type="user" class="form-control" name="user" placeholder="Username"  required autofocus>
                            </div>  
                        </div>

                        <div class="form-group{{isset($invalido) ? ' has-error' : '' }}">
                            <div class="col-md-8 col-md-offset-2">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                   @if (isset($invalido))
                                        <span class="help-block">
                                            <strong>{{$invalido}}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary col-md-offset-6">
                                    Iniciar Sesión
                                </button>
                                <br>

                                <!--<a class="btn btn-link col-md-offset-4" href="">
                                    ¿Olvidaste tu contraseña?
                                </a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
    <script src="{{ url('/js/bootstrap.min.js') }}"></script>
	
  </body>
</html>