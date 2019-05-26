<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">
	Crear plantilla workflow
</button>

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Crear plantilla</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="{{ url('/newPlantilla') }}">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="nom" class="control-label">Nom</label>
						<input class="form-control" type="text" name="nomPlantilla" id="nom">
					</div>

					<div class="form-group">
						<label for="revisor" class="control-label">Revisor/s</label>
						<select class="form-control" multiple size="5" id="revisor" name="revi[]">
							@foreach($users as $user)
							<option value="{{ $user->idUsuari }}">{{ $user->nomUsuari }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="aprovador" class="control-label">Aprovador</label>
						<select class="form-control" id="aprovador" name="aprov">
							@foreach($users as $user)
								<option value="{{ $user->idUsuari }}"> {{ $user->nomUsuari }}</option>
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
