@extends('layouts.master')
@section('content')
<div class="container">
  <h2>Editar Plantilla Workflow</h2>
  <div class="panel-body" style="padding:30px">
      {{-- TODO: Abrir el formulario e indicar el método POST --}}

          <form action="{{url('/CU_27_EditarPlantilla/{id}'  )}}"method="POST">
              {{method_field('POST')}}


              {{-- TODO: Protección contra CSRF --}}
              {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Nombre</label>
                        <input type="text" name="nomPlantilla" id="nomPlantilla" value="{{$plantillas->nomPlantilla}}">
                    </div>

                    <div class="form-group">
                        {{-- TODO: Completa el input para el año --}}
                        <label for="Aprovador">Aprovador/es</label>
                        <input type="text" name="aprov" id="aprov">
                      
                        <select class="form-control col-sm-10" name="aprov">
                            @foreach($userAprov as $user)
                               
                            <option value="{{ $user->idUsuari }}"> {{ $user->nomUsuari }}</option>
                            @endforeach
                        </select>
                    </div>
              
                    <div class="form-group">                      
                        {{-- TODO: Completa el input para el año --}}
                        <label for="año">Revisor</label>   
                        <input type="text" name="nomRevi" id="nomRevi">
                        
                        
                        <select class="form-control col-sm-10" multiple size="3" name="revi[]">
                            @foreach($userAprov as $user)
                               
                                <option value="{{ $user->idUsuari }}">{{ $user->nomUsuari}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Guardar Plantilla
                        </button>
                    </div>
                    
                    {{-- TODO: Cerrar formulario --}}
                </form>

            </div>
</div>

@stop
