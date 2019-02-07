<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestionar Usuaris</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Bootstrap and my style-->
        <link href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('/css/m14.css') }}" rel="stylesheet">

    </head>
    <body>

        <div id="container">
            <div id="header">
                <label>Gestor Documental</label>
                <div>
                    <label>Notificaciones</label>
                    <input type="text" name="search" id="search" />
                </div>
            </div>
            <div id="navLeft">
                <div>
                    <img src="{{ url('/images/user-default.png') }}" id="photoUser" />
                    <label>Nombre Apellido</label>
                    <button id="close">Cerrar Sesión</button>
                    <label id="line"></label>
                </div>
                <div>
                    <i></i>
                    <label>Mi Carpeta</label>
                    <i></i>
                </div>
                <div>
                    
                </div>
            </div>
            <div id="center">
                <div class="darkColor" id="header2">Gestionar Usuarios</div>
                <div id="cuerpo">
                    <div class="darkColor">Crear nuevo usuario</div>
                    <div>
                        <input type="text" name="" id="" placeholder="Nombre">
                        <input type="text" name="" id="" placeholder="Apellidos">
                        <input type="text" name="" id="" placeholder="Contraseña">
                        <input type="text" name="" id="" placeholder="Email">
                    </div>
                    <div class="darkColor">
                        <button>Crear</button>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('/assets/js/m14.js') }}"></script>
    </body>
</html>
