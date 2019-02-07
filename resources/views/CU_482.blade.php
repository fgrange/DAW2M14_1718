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
        <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('/css/CU_48.css') }}" rel="stylesheet">
       
        

    </head>
    <body>
        <div id="containerr">
            
                <div class="text-center darkColor" style="padding: 7px">Gestionar Usuarios</div>
                <br>  
                
         </div>      
        <div class="text-center" id="containerr2">
            <div style="float: left;" class="   ">
                    
                    <div class="text-center darkColor" style="padding: 7px">Mostrar Usuaris</div>
                   
                    
                    @foreach( $arrayUsuaris as $usuaris )
                    
                    <div>
                        <label class="llista text-center">{{$usuaris->nomUsuari}}</label>
                        <label class="llista2 text-center">{{$usuaris->nom}}</label>
<!--                          <label class="butons text-center">
                            <button type="button" class="btn btn-default btn-sm">
                             <span class="glyphicon glyphicon-asterisk"></span>
                            </button>
                        </label>
                        <label class="butons text-center">
                            <button type="button" class="btn btn-default btn-sm">
                              <span class="glyphicon glyphicon-minus"></span> 
                            </button>
                        </label>
                        <label class="butons text-center">
                            <button type="button" class="btn btn-default btn-sm">
                             <span class="glyphicon glyphicon-remove"></span> 
                            </button>
                        </label>-->
                    </div>
                    
                    @endforeach
                    <div class="text-center darkColor" style="padding: 7px">
                        <button type="button" class="btn btn-default btn-sm">
                            Crear
                        </button>
                    </div>
                    
            </div>
        </div>
            
    
               
        
       

        <script src="{{ url('/js/jquery.min.js') }}"></script>
         <!--Include all compiled plugins (below), or include individual files as needed--> 
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>
    </body>
</html>
