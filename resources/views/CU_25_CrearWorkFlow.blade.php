@extends('layouts.master')
@section('content')

@include('CU_26')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>


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
                                <label for="Aprovador">Aprovador</label>
                                <select class="form-control col-sm-10" name="aprov">
                                    @foreach($users as $user)

                                    <option value="{{ $user->idUsuari }}"> {{ $user->nomUsuari }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <br><br>
                            
                            <div class="form-group">
                                <label for="revisor">Revisor</label><br>
                                @foreach($users as $user)
                                    <strong style="font-size: 1em;"><input type="checkbox" name="checkbox_revisor[]" value="{{$user->idUsuari}}" >{{ $user->nomUsuari }}&nbsp;&nbsp;</strong>
                                @endforeach
                            </div>    
                            
                            <div class="form-group text-left">
                            <label> Data Limit Revisió:</label>
                            
                            <input type="date" name="dataRevi"/>

                            </div>
                            </br>
                            </br>
                            <div class="form-group">
                            <label> Data Limit Aprovació:</label>

                            <input type="date" name="dataAprov"/>

                            </div>
                            </br>
                            </br>

                            <div class="form-group">
                                {{-- TODO: Completa el input para el año --}}
                                <label for="año">Eligir Plantilla</label>

                                <select class="form-control col-sm-10"  name="plantilla">
                                    <option selected="selected" value="">Tria una plantilla</option>
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

