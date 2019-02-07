@extends('layouts.master')

@section('content')
<link href="{{ url('css/CU_04.css')}}" rel="stylesheet" type="text/css"/>
<div class="row" style="margin-top:20px">
    
	<div class="col-md-11">
           <h1 class="h2">Veure versions</h1>   
           
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Versio</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach( $versions as $key => $document)
                      <tr>
                        <td>{{$document->nom}}</td>
                        <td>{{$document->versioInterna}}</td>            
                          <td>@include('CU_17_EliminarVersio')</td>
                          <td>@include('CU_15_PromocionarVersio')</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
          </div>
           
	</div>
</div>


  

@stop