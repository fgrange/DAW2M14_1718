@extends('layouts.master')

@section('content')
<link href="{{ url('css/CU_04.css')}}" rel="stylesheet" type="text/css" />
<div class="row" style="margin-top:20px">

	<div class="col-md-11">
		<h1 class="h2">Workflows</h1>
		<a class="btn btn-success" href="{{url('/CU_25_CrearWorkFlow')}}">Crear Workflow</a>
		<a class="btn btn-info" href="{{url('/historialWorkflow')}}">Ver historial</a>
		<a class="btn btn-warning" href="{{url('/CU_50')}}">Ver plantillas</a>

		<div class="table-responsive">

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
				<?php
	            if(count($workflows) > 0){
	              ?>
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
							@if($workf->idUsuariAprovador==$idUsuari)

								@if($workf->estat =='Revisat')
									{{-- <a class="btn btn-success" href="{{url('/aprovarWorkflow')}}" >Aprovar</a> --}}
									@include('CU_35_AprovarWorkflowModal', ['id' => $workfl->idWorkflow, 'idUsuariAprovador' => $workfl->idUsuariAprovador])
								@else
									<button type="button" class="btn btn-secondary" disabled>Pendent de revisió</button>
								@endif
							@endif

							@foreach($idRevisor as $revi)
								@if($revi->idWorkflow==$workf->idWorkflow)
									@if($revi->estat =='Nou' || $revi->estat =='Examinant')
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalRevisar" data-id="{{ $revi->idUsuariRevisor }}">Revisar</button>
									@endif
								@endif
							@endforeach

							@if($workf->idUsuariCreacio==$idUsuari)
								<a class="btn btn-default" href="{{url('/forcarWorkflow')}}">Completar</a>
							@endif

							@if(($workf->estat !='Revisat' || $workf->estat !='Aprovat') && ($workf->idUsuariCreacio==$idUsuari))
								<a class="btn btn-danger" href="{{url('/deleteWorkflow/'.$workf->idWorkflow)}}">Eliminar</a>
							@endif

							<a class="btn btn-warning" href="{{url('/descarregaWorkflow/'.$workf->idDocument)}}">Descarregar</a>
						</td>
					</tr>
					@endforeach
					<?php }else{ ?>
					<tr>
						<td>No s'han trobat coincidències</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

{{-- modal revisar --}}
<div class="modal fade" id="modalRevisar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Revisar workflow</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="{{ url('/CU_35_RevisarWorkflow/'.$revi->idUsuariRevisor) }}">
					{{ csrf_field() }}
					<input type="hidden" name="idWorkflow" id="id" value="{{$workf->idWorkflow}}">
					<div class="form-group">
						<h4>Estàs segur d'acceptar el document?</h4>
					</div>
			</div>

			<div class="modal-footer">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Acceptar document
					</button>
          <form method="POST" action="{{ url('/CU_35_RebutjarRevisarWorkflow/'.$revi->idUsuariRevisor) }}">
  					{{ csrf_field() }}
						<input type="hidden" name="idWorkflow" id="id" value="{{$workf->idWorkflow}}">
            <button type="submit" class="btn btn-danger">
  						Rebutjar document
  					</button>
          </form>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
@stop
