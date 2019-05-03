@extends('layouts.master')
@section('content')

@section('scripts')
  <script src="{{ url('js/CU_25.js')}}"></script>
@endsection

@include('CU_26')

{{-- TODO passar todos los links y scripts al include --}}
{{-- <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" /> --}}
{{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script> --}}

<h2>Crear Workflow</h2>
<div class="panel-body" style="padding:30px">
  <form method="POST" action="{{ url('/newWorkflow') }}">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="document">Document</label>
      <select class="form-control col-sm-10" name="document">
        @foreach($documents as $document)
          <option value="{{ $document->idDocument }}"> {{ $document->nom }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="revisor">Revisor</label><br>
      {{-- @include('CU_39_ModificarMembres') --}}
      @foreach($users as $user)
        <strong style="font-size: 1em;"><input type="checkbox" name="checkbox_revisor[]" value="{{$user->idUsuari}}">{{ $user->nomUsuari }}&nbsp;&nbsp;</strong>
      @endforeach
    </div>

    <div class="form-group">
      <label for="Aprovador">Aprovador</label>
      <select class="form-control col-sm-10" name="aprov">
        @foreach($users as $user)
          <option value="{{ $user->idUsuari }}"> {{ $user->nomUsuari }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group text-left">
      <label> Data límit de revisió:</label>
      <input type="date" name="dataRevi" />
    </div>

    <div class="form-group">
      <label> Data límit d'aprovació:</label>
      <input type="date" name="dataAprov" />
    </div>

    <div class="form-group">
      <label for="año">Escollir plantilla</label>
      <select class="form-control col-sm-10" name="plantilla" id="selectorPlantilla">
        <option selected="selected" value="0">Tria una plantilla</option>
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

  </form>
</div>
</div>



@stop
