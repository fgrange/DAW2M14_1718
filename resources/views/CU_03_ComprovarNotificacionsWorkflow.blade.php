@extends('layouts.master')

@section('content')
<link href="{{ url('css/CU_04.css')}}" rel="stylesheet" type="text/css"/>
<div class="row" style="margin-top:20px">
    
	<div class="col-md-11">
           <h1 class="h2">Filtro de Logs</h1>   
           <form method="GET" action="/filtraLogs/">
               <select name="filtro">
                    <option value="dataLog" >Fecha</option>
                    <option value="nomUsuari">Usuario</option>
                    <option value="descripcio">Tipo de Acción</option>
                </select>
                <input name="cadena" id="cadena" type="text" placeholder="Filtro...">
                <button>Filtrar</button>
           </form>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Usuario</th>
                      <th>Acción</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($logs as $log)
                      <tr>
                        <td>{{ $log->nomUsuari }}</td>
                        <td>{{ $log->descripcio }}</td>
                        <td>{{ $log->dataLog }}</td>
                        <td>{{ $log->hora }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
          </div>
	</div>
</div>
@stop