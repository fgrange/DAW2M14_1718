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
					{{-- {{dd($workflows)}} --}}
					@foreach($workflows as $workf)
							<tr>
								<td>{{ $workf->idWorkflow }}</td>
								<td>{{ $workf->dataCreacio }}</td>
								<td>{{ $workf->dataLimitRevisio }}</td>
								<td>{{ $workf->dataLimitAprovacio }}</td>
								<td>{{ $workf->nom }}</td>
								<td>{{ $workf->estat }}</td>
								<td>
									@if ($usuari->tipus != 'Administrador')
										@foreach($idRevisor as $revisor)
											@if (($revisor->idUsuariRevisor==$_SESSION['idUsuari']) && ($revisor->idWorkflow == $workf->idWorkflow))
												@if($revisor->estat =='Nou' || $revisor->estat =='Examinant')
													@include('CU_35_ModalRevisar', ['idW' => $workf->idWorkflow, 'idR' => $revisor->idUsuariRevisor])
												@endif
											@endif
										@endforeach

										@if ($workf->idUsuariAprovador==$_SESSION['idUsuari'])
											@if($workf->estat =='Revisat')
												@include('CU_35_ModalAprovar', ['idW' => $workf->idWorkflow])
											@elseif($workf->estat =='Nou' || $workf->estat =='Examinant')
												<button type="button" class="btn btn-secondary" disabled>Pendent de revisió</button>
											@else
											@endif
										@endif

										@if($workf->idUsuariCreacio==$usuari->idUsuari)
											@if ($workf->estat !='Finalitzat' && $workf->estat !='Rebutjat')
												<a class="btn btn-default" href="{{url('/CU_35_CompletarWorkflow/'.$workf->idWorkflow)}}">Completar</a>
											@endif
										@endif

										@if($workf->idUsuariCreacio==$usuari->idUsuari)
											<a class="btn btn-danger" href="{{url('/deleteWorkflow/'.$workf->idWorkflow)}}">Eliminar</a>
										@endif

										@if($workf->estat !='Finalitzat')
											<a class="btn btn-warning" href="{{url('/descarregaWorkflow/'.$workf->idDocument)}}">Descarregar</a>
										@endif

									{{-- if admin --}}
									@else
										@foreach($idRevisor as $revisor)
											@if (($revisor->idUsuariRevisor==$_SESSION['idUsuari']) && ($revisor->idWorkflow == $workf->idWorkflow))
												@if($revisor->estat =='Nou' || $revisor->estat =='Examinant')
													@include('CU_35_ModalRevisar', ['idW' => $workf->idWorkflow, 'idR' => $revisor->idUsuariRevisor])
												@endif
											@endif
										@endforeach

										@if ($workf->idUsuariAprovador==$_SESSION['idUsuari'])
											@if($workf->estat =='Revisat')
												@include('CU_35_ModalAprovar', ['idW' => $workf->idWorkflow])
											@elseif($workf->estat =='Nou' || $workf->estat =='Examinant')
												<button type="button" class="btn btn-secondary" disabled>Pendent de revisió</button>
											@else
											@endif
										@endif
										@if ($workf->estat !='Finalitzat' && $workf->estat !='Rebutjat')
											<a class="btn btn-default" href="{{url('/CU_35_CompletarWorkflow/'.$workf->idWorkflow)}}">Completar</a>
										@endif
										<a class="btn btn-danger" href="{{url('/deleteWorkflow/'.$workf->idWorkflow)}}">Eliminar</a>
										<a class="btn btn-warning" href="{{url('/descarregaWorkflow/'.$workf->idDocument)}}">Descarregar</a>
									@endif
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

{{-- modal aprovar --}}
<div class="modal fade" id="modalAprovar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Aprovar workflow</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="{{ url('/CU_35_AprovarWorkflow'.$id) }}">
					{{ csrf_field() }}

					<div class="form-group">
						<h4>Estàs segur d'aprovar el document?</h4>
						<h6>{{$id}}</h6>
					</div>
			</div>

			<div class="modal-footer">
				<div class="form-group">
					<button type="submit" class="btn btn-success">
						Aprovar document
					</button>
          <form method="POST" action="{{ url('/CU_35_RebutjarAprovarWorkflow'.$id) }}">
  					{{ csrf_field() }}
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
<script type="text/javascript">
// $(document).ready(function(){
// 			if (true) {
//
// 			}
// 	});
</script>
@stop
