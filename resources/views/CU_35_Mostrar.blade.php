@extends('layouts.master')

@section('content')
<link href="{{ url('css/CU_04.css')}}" rel="stylesheet" type="text/css"/>
<div class="row" style="margin-top:20px">
    
	<div class="col-md-11">
           <h1 class="h2">Workflows</h1>   
           <a class="btn btn-success" href="{{url('/crearWorkflow')}}">Crear Workflow</a>
           <a class="btn btn-info" href="{{url('/historialWorkflow')}}">Ver historial</a>
            <div class="table-responsive">
                <?php 
            if(  count($workflows) > 0){
              ?>
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>id Workflow</th>
                      <th>Data creació</th>
                      <th>Data limit revisió</th>
                      <th>Data limit aprovació</th>
                      <th>Nom del document</th>
                      <th>Estat</th>
                      <th>Accions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($workflows as $workf)
                      <tr>
                        <td>{{ $workf->idWorkflow }}</td>
                        <td>{{ $workf->dataCreacio }}</td>
                        <td>{{ $workf->dataLimitRevisio }}</td>
                        <td>{{ $workf->dataLimitAprovacio }}</td>
                        <td>{{ $workf->nom }}</td>
                        <td>{{ $workf->estat }}</td>
                        <td>
                            <a class="btn btn-success" href="{{url('/aprovarWorkflow')}}">Aprovar</a>
                            <a class="btn btn-info" href="{{url('/revisarWorkflow')}}">Revisar</a>
                            <a class="btn btn-default" href="{{url('/forcarWorkflow')}}">Completar</a>
                            <a class="btn btn-danger" href="{{url('/eliminarWorkflow')}}">Eliminar</a>
                            
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                
      <?php }else{
                  echo "No se han encontrado coincidencias"; 
            } ?>
          </div>
	</div>
</div>
@stop