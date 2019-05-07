<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#edit<?php echo $id; ?>" data-id="{{ $id }}"><i class="fas fa-pen"></i><?php $id_elemento =  $id; ?>
</button>

<div class="modal fade" id="edit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Editar plantilla workflow</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="{{url('/CU_27_EditarPlantilla/'.$id  )}}">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="title" class="control-label">Nom</label>
						<input type="text" class="form-control" name="nomPlantilla" id="nomPlantilla" value="{{ $nomPlantilla }}">
					</div>

					<div class="form-group">
						<label for="re" class="control-label">Aprovador</label>
						<select class="form-control" name="aprov">
							@foreach($userAprov as $user)
								{{ $user->idUsuari }}
								<option value="{{ $user->idUsuari }}" <?php if($UsuariAprovador==$user->nomUsuari ) echo "selected" ?>> {{ $user->nomUsuari }}</option>
							@endforeach
						</select>
					</div>

					<?php $revidoresActuales[] = array()?>
					@foreach($usersRev as $revi)
						@foreach($userAprov as $user)
							@if ($plantillas->idPlantilla == $revi->idPlantilla)
								@if($revi->idUsuariRevisor == $user->idUsuari)
									<?php  array_push($revidoresActuales, $user->nomUsuari )?>
								@endif
							@endif
						@endforeach
					@endforeach

					<div class="form-group">
						<label for="re" class="control-label">Revisor/s</label>
						<select class="form-control" multiple size="5" name="revi[]" id="re">
							@foreach($userAprov as $user)
								<option value="{{ $user->idUsuari }}" <?php if( in_array($user->nomUsuari, $revidoresActuales ) ) echo "selected" ?>>{{ $user->nomUsuari}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="modal-footer">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
							Guardar Plantilla
						</button>
					</div>
				</div>
			</form>

		</div>


	</div>
</div>
