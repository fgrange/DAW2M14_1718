@extends('layouts.master')

@section('assets')
  <link href="{{ url('css/CU_04.css')}}" rel="stylesheet" type="text/css"/>
  {{-- <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/> --}}
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
  <script src="{{ url('js/CU_04.js')}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
@endsection

@section('content')

<script type="text/javascript">

</script>
<div class="row" style="margin-top:20px">

	<div class="col-md-11">
           <h1 class="h2">Registre de Logs</h1>
           {{-- <form method="GET" action="">
             <div class="form-inline">
               <select name="filtro" class="form-control">
                    <option value="dataLog" >Data</option>
                    <option value="nomUsuari">Usuari</option>
                    <option value="descripcio">Tipus d'acció</option>
                </select>
                <input name="cadena" id="cadena" type="text" placeholder="Filtro" class="form-control">
                <button class="btn btn-default">Filtrar</button>
             </div>
           </form> --}}
            <div class="table-responsive">
                <table class="table table-striped table-sm" id='table-logs'>
                  <thead>
                    <tr>
                      <th>Usuari</th>
                      <th>Acció</th>
                      <th>Data</th>
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
