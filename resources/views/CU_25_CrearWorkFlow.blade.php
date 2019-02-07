@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

<script type="text/javascript">

jQuery(function($){

$.datepicker.regional['es'] = {

closeText: 'Cerrar',

prevText: '&#x3c;Ant',

nextText: 'Sig&#x3e;',

currentText: 'Hoy',

monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',

'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',

'Jul','Ago','Sep','Oct','Nov','Dic'],

dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],

dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],

dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],

weekHeader: 'Sm',

dateFormat: 'yy-mm-dd',

firstDay: 1,

isRTL: false,

showMonthAfterYear: false,

yearSuffix: ''};

$.datepicker.setDefaults($.datepicker.regional['es']);

});    

 

$(document).ready(function() {

   $("#datepicker").datepicker();
   $("#datepicker1").datepicker();

});

</script>

				<div class="container">
  
                                    <h2>Crear Workflow</h2>
                    <div class="panel-body" style="padding:30px">
                                    {{-- TODO: Abrir el formulario e indicar el método POST --}}
                                    <form method="POST" action="{{ url('/newWorkflow') }}">


                                        {{-- TODO: Protección contra CSRF --}}

                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="Document">Document</label>
                                            <select class="form-control col-sm-10" name="document">
                                                @foreach($documents as $document)

                                                <option value="{{ $document->idDocument }}"> {{ $document->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                            
                                        <div class="form-group">
                                            {{-- TODO: Completa el input para el año --}}
                                            <label for="Aprovador">Aprovador/es</label>
                                            <select class="form-control col-sm-10" name="aprov">
                                                @foreach($users as $user)

                                                <option value="{{ $user->idUsuari }}"> {{ $user->nomUsuari }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            {{-- TODO: Completa el input para el año --}}
                                            <label for="año">Revisor</label>

                                            <select class="form-control col-sm-10" multiple size="3" name="revi[]">
                                                @foreach($users as $user)

                                                    <option value="{{ $user->idUsuari }}">{{ $user->nomUsuari }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group text-left">
                                        <label> Data Limit Revisió:</label>

                                        <input type="text" name="dataRevi" id="datepicker" readonly="readonly" size="12" />

                                        </div>
                                        </br>
                                        </br>
                                         </br>
                                        </br>
                                        <div class="form-group">
                                        <label> Data Limit Aprovació:</label>

                                        <input type="text" name="dataAprov" id="datepicker1" readonly="readonly" size="12" />

                                        </div>
                                        </br>
                                        </br>
                                        
                                        <div class="form-group">
                                            {{-- TODO: Completa el input para el año --}}
                                            <label for="año">Eligir Plantilla</label>

                                            <select class="form-control col-sm-10"  name="plantilla">
                                                @foreach($plantilla as $plantillas)

                                                    <option value="{{ $plantillas->idPlantilla }}">{{ $plantillas->nomPlantilla }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary " style="padding:8px 100px;margin-top:25px;">
                                                Guardar WorkFlow
                                            </button>
                                        </div>
                                        {{-- TODO: Cerrar formulario --}}
                                        
                                        
                                    </form>

                        </div>
</div>


			
@stop

