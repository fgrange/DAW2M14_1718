@extends('layouts.master')

@section('content')
<link href="{{ url('css/CU_04.css')}}" rel="stylesheet" type="text/css"/>
<div class="row" style="margin-top:20px">
    
	<div class="col-md-11">
           <h1 class="h2">Buscar Documents</h1>   
           <form method="GET" action="{{url('/resultadoBusqueda')}}">
                <input name="cadena" id="cadena" type="text" placeholder="Nombre del documento o carpeta...">
                <button>Buscar</button>
           </form>
           <?php 
            if( ( count($resultado['carpetas']) + count($resultado['documentos']) ) > 0){
              ?>
                <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Descripcion</th>
                              <th>Fecha</th>
                              <th>Accion</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($resultado['carpetas'] as $res)
                              <tr>
                                <td>{{ $res->nom }}</td>
                                <td>{{ $res->descripcio }}</td>
                                <td>{{ $res->dataCreacio }}</td>
                                 <td><a href="{{url('/abrirCarpeta')}}/{{ $res->idCarpeta }}">Ver Carpeta</a></td>
                                
                              </tr>
                            @endforeach
                            @foreach($resultado['documentos'] as $res)
                              <tr>
                                <td>{{ $res->nom }}</td>
                                <td>{{ $res->descripcio }}</td>
                                <td>{{ $res->dataCreacio }}</td>
                                <td><a href="{{url('/abrirCarpeta')}}/{{ $res->idCarpeta }}/?idDocument={{ $res->idDocument }}">Ver Documento</a></td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                  </div>
             <?php }else{
                 
                 echo "No se han encontrado documentos con el termino <strong> ".$_GET['cadena']." </strong>";
             } ?>
            
	</div>
</div>
@stop